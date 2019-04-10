<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Departamento;
use App\Modelos\EquipoTrabajo;
use App\Modelos\Persona;
use App\Modelos\Problema;
use App\Modelos\Seguimiento;
//Aqui tambien "Tipopersona" por TipoPersona
use App\Modelos\TipoPersona;
use App\Modelos\Usuario;
use Carbon\Carbon;
use Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;

class RootController extends Controller
{
    public function __construct()
    {
        $this->middleware('root');
    }

    function View_addEmpleado()
    {
        //Cambie el "Tipopersona" por el "TipoPersona"
        $deps = Departamento::all();
        $tpers = TipoPersona::all();
        return view('root.addEmpleado', compact('deps', 'tpers'));
    }

    function View_addEquipo()
    {
        $per = Persona::where('CodTipoPersona', '3')->get();

        return view('root.addEquipo', compact('per'));
    }

    function View_historial()
    {
        $problemas = Problema::whereHas('persona')
            ->with('persona')
            ->whereHas('equipotrabajo')
            ->with('equipotrabajo')
            ->whereHas('tipo_problema')
            ->with('tipo_problema')
            ->whereHas('tecnico')
            ->with('tecnico')
            ->get();

        $tecs = Persona::all()->where('CodTipoPersona', '=', '2');

        return view('root.historial', compact('problemas', 'tecs'));
    }

    function View_regUsuario()
    {
        $empleados = Persona::doesnthave('usuario')->orderBy('NomEmp')->get();
        return view('root.addUsuario', compact('empleados'));
    }

    //ACCIONES

    function addPersona(Request $person)
    {
        Persona::create([
            'NomEmp' => $person->get('nom'),
            'ApPat' => $person->get('apeP'),
            'ApMat' => $person->get('apeM'),
            'TelRed' => $person->get('telR'),
            'CelEmp' => $person->get('telP'),
            'EmailEmp' => $person->get('mail'),
            'CodTipoPersona' => $person->get('tper'),
            'CodDepa' => $person->get('dep')
        ]);

        return redirect('/root');
    }

    function addEquipo(Request $request)
    {
        $equi = new EquipoTrabajo();
        $equi->Descripcion = $request->desc;
        $equi->NoSerie = $request->seri;
        $equi->TipoEquipo = $request->tpe;
        $equi->CodEmp = $request->per;
        $equi->save();
        return back();
    }

    function addUsuario(Request $newUser)
    {
        $usuarios = Usuario::all();
        $user_nom = ucwords($newUser->get('nom'));

        foreach ($usuarios as $user) {
            if ($user_nom == $user->NomUsuario)
                return collect(['reg' => false, 'msj' => 'El nombre de usuario "' . $user_nom . '" ya existe']);
        }

        Usuario::create([
            'NomUsuario' => $user_nom,
            'PassUsuario' => Hash::make($newUser->get('pass')),
            'CodEmp' => $newUser->get('person_id'),
            'api_token' => Str::random(60)
        ]);
        return collect(['reg' => true, 'msj' => 'El usuario "' . $user_nom . '" fue creado con éxito']);
    }

    function GraficosData(Request $r)
    {
        $anio = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $fecha = Carbon::now();
        $inicio = $fecha->format('Y-01-01');
        $final = $fecha->format('Y-12-31');

        $segs = Seguimiento::whereBetween('fecha_prob', [$inicio, $final])->get();

        $m = 1;
        for ($i = 0, $iMax = count($anio); $i < $iMax; $i++) {
            $mes = sprintf('%02d', $m);
            $ini = $fecha->format('Y-' . $mes . '-01');
            $fin = $fecha->format('Y-' . $mes . '-31');
            foreach ($segs as $seg)
                if (Carbon::parse($seg->fecha_prob)->gte($ini) && Carbon::parse($seg->fecha_prob)->lt($fin))
                    $anio[$i]++;
            $m++;
        }

        return $anio;
    }

    function relTecnico(Request $request)
    {
        if ($request->get('emp') != 'nachos') {
            $tec = Persona::find($request->input('emp'));
            $prob = Problema::find($request->input('idp'));
            $prob->tecnico()->sync($tec);
        }

        return redirect('/root_historial');
    }

    //VISTAS ------------------------------------

    function ViewHome()
    {
        return view('root.home');
    }

    function ViewGraficos()
    {
        return view('root.graficos');
    }
}

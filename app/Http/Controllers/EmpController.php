<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Persona;
use App\Modelos\Problema;
use App\Modelos\EquipoTrabajo;
use App\Modelos\TipoProblema;
use DB;
use Session;

class EmpController extends Controller
{
    public function __construct()
    {
        $this->middleware('emp');
    }
    
    function AgregarProblema()
    {
        $Prob = Problema::all();
        $TipoProb = TipoProblema::all();
        $Equipos = EquipoTrabajo::whereHas('persona')->with('persona')
        ->where('CodEmp', '=', Session::get('persona')->id)->get();



        return view('emp.regProblema', compact('Prob','Equipos','TipoProb'));
        //return view('emp.regProblema', compact('Equipos','TipoProb'));
    }

    function Historial(){
        $historial= DB::table('problema')
            ->join('seguimiento', 'problema.id', '=', 'seguimiento.problema')
            ->join('tipoproblema', 'problema.CodTipoProblema', '=', 'tipoproblema.id')
            ->join('equipotrabajo', 'problema.CodEqTrab', '=', 'equipotrabajo.id')
            ->join('personas', 'equipotrabajo.CodEmp', '=', 'personas.id')
//            ->where('problema.CodEqTrab', "=", )
           ->select('seguimiento.fecha_prob', 'seguimiento.hora_prob', 'problema.id',
                    'equipotrabajo.Descripcion', 'tipoproblema.NombreProblema',
                    'problema.prioridad', 'problema.estatus')
                ->orderBy('seguimiento.fecha_prob', 'desc')
            ->get();

        return view('emp.historial', compact('historial'));
    }

    function RegistrarProblema(Request $r)
    {
        $Prob = new Problema;
        $Prob->CodEqTrab  = $r->equipo;
        $Prob->CodTipoProblema = $r->tipoprob;
        $Prob->NotaProblema = $r->descripcion;
        $Prob->prioridad = $r->prioridad;
        $Prob->save();
        return redirect('/emp_reg')->with("Mensaje","Se ha registrado correctamente el problema");
    }

    function Actualizar(Request $request)
    {
        $emp=Persona::findOrfail(Session::get('persona')->id);

        $emp->NomEmp=$request->input('NomEmp');
        $emp->ApPat=$request->input('ApPat');
        $emp->ApMat=$request->input('ApMat');
        $emp->TelRed=$request->input('TelRed');
        $emp->CelEmp=$request->input('CelEmp');
        $emp->EmailEmp=$request->input('EmailEmp');
        $emp->save();

        Session::put('persona', $emp);

        return redirect('/emp_datos');
    }

    //VISTAS ------------------------------------

    function ViewHome(){ return view('emp.home'); }

    function ViewVerDatos(){ return view('emp.verDatos'); }

    function ViewEditDatos(){ return view('emp.editDatos'); }
}

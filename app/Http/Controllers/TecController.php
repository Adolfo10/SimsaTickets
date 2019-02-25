<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Persona;
use App\Modelos\Problema;
use DB;

use Illuminate\Support\Facades\Redirect;
// use PDF;
use App\Modelos\Seguimiento;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Session;

class TecController extends Controller
{
    function __construct()
    {
        $this->middleware('tec');
    }
    
    function View_admin(){
        /*CORREGIR*/
        $tecnicos = Persona::find(Session::get('persona')->id);
        return view('tec.admin',compact('tecnicos'));
    }

    //Acciones * * * * * * * * * *

    function Estatus(Request $request){
        $estado=$request->est;
        $problema=$request->p;
        $tec=Persona::find($request->idt);

        $prom=Problema::find($problema);
        $prom->estatus=$estado;

        $prom->save();
        return back();
    }

    function View_datos()
    {
        $tecnico=DB::table('personas')
                ->where('personas.id','=',Session::get('persona')->id)
                ->select('personas.id','personas.NomEmp','personas.ApPat','personas.ApMat','personas.CelEmp','personas.TelRed','personas.EmailEmp')
                ->get();

        return view('tec.verDatos',compact('tecnico'));
    }

    function actualizar(Request $request)
    {
        $tecnico=Persona::findOrfail(Session::get('persona')->id);

        $tecnico->NomEmp=$request->input('NomEmp');
        $tecnico->ApPat=$request->input('ApPat');
        $tecnico->ApMat=$request->input('ApMat');
        $tecnico->TelRed=$request->input('TelRed');
        $tecnico->CelEmp=$request->input('CelEmp');
        $tecnico->EmailEmp=$request->input('EmailEmp');
        $tecnico->save();

        Session::put('persona', $tecnico);

        return redirect('/tec_datos');
    }

    // <-- Vista PDF --> //

    public function pdf()
    {
        $seguimiento=Seguimiento::all();
          
        return view('PDF',compact('seguimiento'));
    }

    public function pdfdownload()
    {

        // $seguimiento=Seguimiento::all();
        // $pdf=PDF::loadview("PDF",compact("seguimiento"));
        // return $pdf->download("seguimiento.pdf");
        $seguimiento=Seguimiento::all();

        $html= view("PDF",compact('seguimiento'));

        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->render();
        return $pdf->stream();
    }

    //VISTAS ---------------------------------

    function ViewHome(){ return view('tec.home'); }

    function ViewTecEditar(){ return view('tec.editDatos'); }
}

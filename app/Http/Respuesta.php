<?php


namespace App\Http;


use Carbon\Carbon;
use function collect;
use function json_encode;
use Illuminate\Http\Response;

class Respuesta
{
    public $datos=[];
    public $status=0;
    public $time="";
    public $empty=true;
    public $mensaje="sin datos";
    public $tipoRespuesta="application/json";
    public $error="";

    public function __construct($datos,int $status)
    {
        $datos=collect($datos);
        $this->datos=$datos;
        $this->status=$status;
        if ($datos->count()>=1){$this->empty=false;}
        if ($this->status==200){$this->mensaje="con datos";}
        else{$this->mensaje="3312 tenemos un 3312!!";}
        $this->time=Carbon::now();
    }

    public function enJson(){
        return Response::json(json_encode($this));
    }
}
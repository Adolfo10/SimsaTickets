<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\EquipoTrabajo;
use App\Modelos\Persona;
use App\Modelos\TipoProblema;

class Problema extends Model
{
    protected $table = 'problema';
    public $timestamps = false;

    public function equipotrabajo() {
        return $this->belongsTo(EquipoTrabajo::class ,'CodEqTrab');
    }

    public function persona() {
        return $this->belongsToMany(Persona::class,'problema_persona', 'CodProblema','CodEmp' );
    }

    public function tecnico() {
        return $this->belongsToMany(Persona::class,'tecnico_problema', 'CodProblema','CodEmp' );
    }

    public function tipo_problema() {
        return $this->belongsTo(TipoProblema::class, 'CodTipoProblema');
    }
}

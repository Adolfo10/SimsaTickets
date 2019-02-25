<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Persona;
use App\Modelos\Problema;

class EquipoTrabajo extends Model
{
    protected $table = 'equipotrabajo';
    public $timestamps = false;

    public function persona() {
        return $this->belongsTo(Persona::class, 'CodEmp');
    }

    public function problema() {
        return $this->hasMany(Problema::class ,'CodEqTrab');
    }
}

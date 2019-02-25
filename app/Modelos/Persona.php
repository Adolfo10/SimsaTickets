<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

use App\Modelos\Departamento;
use App\Modelos\EquipoTrabajo;
use App\Modelos\Problema;
use App\Modelos\TipoPersona;
use App\Modelos\Usuario;

class Persona extends Model
{
    protected $table = 'personas';
    public $timestamps = false;
    protected $fillable = ['NomEmp', 'ApPat', 'ApMat', 'TelRed', 'CelEmp', 'EmailEmp', 'CodTipoPersona', 'CodDepa'];
    
    public function departamento() {
        return $this->belongsTo(Departamento::class, /*This FOREIGN*/'CodDepa');
    }

    public function equipotrabajo() {
        return $this->hasMany(EquipoTrabajo::class, 'CodEmp');
    }
    
    public function problema() {
        return $this->belongsToMany(Problema::class,'problema_persona', 'CodEmp', 'CodProblema');
    }

    public function problematec() {
        return $this->belongsToMany(Problema::class,'tecnico_problema', 'CodEmp', 'CodProblema');
    }

    public function tipo_persona() {
        return $this->belongsTo(TipoPersona::class, 'CodTipoPersona');
    }

    public function usuario() {
        return $this->hasOne(Usuario::class, 'CodEmp');
    }
}

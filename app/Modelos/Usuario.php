<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Persona;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $fillable = ['NomUsuario', 'PassUsuario', 'CodEmp'];

    public function persona() {
        return $this->belongsTo(Persona::class, 'CodEmp');
    }
}

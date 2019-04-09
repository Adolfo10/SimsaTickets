<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Persona;

class Usuario extends Model
{
    public $timestamps=false;

    protected $table = 'usuario';
    protected $fillable = ['NomUsuario', 'PassUsuario', 'CodEmp', 'api_token'];

    public function persona() {
        return $this->belongsTo(Persona::class, 'CodEmp');
    }
}

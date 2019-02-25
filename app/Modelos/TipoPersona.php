<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Persona;

class TipoPersona extends Model
{
    protected $table = 'tipopersona';
    public $timestamps = false;

    public function persona() {
        return $this->hasOne(Persona::class, 'CodTipoPersona');
    }
}

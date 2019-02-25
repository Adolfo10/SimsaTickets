<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Persona;

class Departamento extends Model
{
    protected $table = 'departamento';
    public $timestamps = false;

    public function personas() {
        return $this->hasMany(Persona::class, /*That FOREIGN*/'CodDepa');
    }
}

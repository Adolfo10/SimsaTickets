<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Problema;

class Seguimiento extends Model
{
    protected $table = 'seguimiento';
    public $timestamps = false;

    public function problema()
    {
        return $this->belongsTo(Persona::class, 'problema');
    }
}

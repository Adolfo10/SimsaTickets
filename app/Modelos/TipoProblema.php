<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Problema;

class TipoProblema extends Model
{
    protected $table = 'tipoproblema';
    public $timestamps = false;

    public function problemas() {
        return $this->hasMany(Problema::class, 'CodTipoProblema');
    }
}

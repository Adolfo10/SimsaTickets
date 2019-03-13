<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
	protected $primaryKey="id";
	protected $table="alumnos";
	public $timestamps=false;
	public $fillable=["nombre"];
}

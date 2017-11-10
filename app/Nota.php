<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    protected $table = 'nota';
    protected $primaryKey='id';
    protected $fillable = ['nota','alumno_NIE','PeriodoTrimestral_idPeriodoTrimestral','Actividades_idActividades'];
    public $timestamps = false;

}

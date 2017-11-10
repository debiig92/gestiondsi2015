<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaH extends Model
{
    //
    protected $connection ='historico';
    protected $table = 'nota';
    protected $primaryKey='id';
    protected $fillable = ['nota','alumno_NIE','PeriodoTrimestral_idPeriodoTrimestral','Actividades_idActividades','tipoNota_idtipoNota'];
    public $timestamps = false;
}

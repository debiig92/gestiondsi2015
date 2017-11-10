<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadH extends Model
{
    //
    protected $connection='historico';
    protected $table = 'actividades';
    protected $primaryKey='id';
    protected $fillable = ['id','nombre','grado_id','ponderacion','ASIGNATURA_idASIGNATURA','tipoactividad_id'];
    public $timestamps = false;
  }

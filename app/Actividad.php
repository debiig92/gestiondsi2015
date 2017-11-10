<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = 'actividades';

    protected $primaryKey='id';

    protected $fillable = ['id','nombre','grado_id','ponderacion','ASIGNATURA_idASIGNATURA','Actividades_idActividades','TipoActividad_id'];

    public $timestamps = false;

    
  }

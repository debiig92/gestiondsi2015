<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gradoAlumno extends Model
{
  protected $connection ='historico';
  protected $table = 'grado_alumno';
  protected $primaryKey= 'id';
  protected $fillable = ['id','nie','grado_id','id_ano'];
  public $timestamps = false;
}

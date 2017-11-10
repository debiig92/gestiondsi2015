<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadistica extends Model
{
    //
    protected $connection='historico';
    protected $table = 'estadisticas';
    protected $primaryKey='id';
    protected $fillable = ['id','ano','aprobados','grado_id','reprobados'];
    public $timestamps = false;
  }

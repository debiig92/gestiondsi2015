<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoH extends Model
{
    //
    protected $connection='historico';
    protected $table = 'alumno';
    protected $primaryKey='NIE';
    protected $fillable = ['NIE','nombre','apellidos'];
    public $timestamps = false;
  }

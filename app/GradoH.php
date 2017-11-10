<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model {

    protected $connection ='historico';
    protected $table = 'grado';
    protected $primaryKey= 'id';
    protected $fillable = ['id','turno_id','grado'];
  }

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {

    protected $table = 'asignatura';
    protected $primaryKey='id';
    protected $fillable = ['materia'];
   public $timestamps = false;

}

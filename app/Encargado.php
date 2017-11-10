<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model {

    protected $table = 'encargado';

    protected $fillable = ['DUI','nombre','direccion','telefono'];

}

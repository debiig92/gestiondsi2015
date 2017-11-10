<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUser extends Model {

protected $table = 'tipousuario';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['id','tipoU'];


     
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaF extends Model
{
    //
    protected $connection ='historico';
    protected $table = 'notasfinales';
    protected $primaryKey='id';
    protected $fillable = ['id','NIE','nota','asignatura','grado_id','trimestre'];
    public $timestamps = false;
}

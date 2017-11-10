<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{
    //
    protected $table = 'tipoactivada';

    protected $primaryKey='id';

    protected $fillable = ['id','nombre','prioridad'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaIndicador extends Model
{
    protected $table = 'respuestaindicador';

    protected $primaryKey='id';

    protected $fillable = ['id','NIE','INDICADOR','area_ind','avance'];
}

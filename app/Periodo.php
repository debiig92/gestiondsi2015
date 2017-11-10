<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //
    protected $table = 'periodotrimestral';
    protected $primaryKey='id';
    protected $fillable = ['id','numperiodo','estado','AnoEscolar_idAnoEscolar'];
    public  $timestamps = false;
}

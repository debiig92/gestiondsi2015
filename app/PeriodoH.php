<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PeriodoH extends Model
{
    //
    protected $connection ='historico';
    protected $table = 'periodotrimestral';
    protected $primaryKey='id';
    protected $fillable = ['id','numperiodo','AnoEscolar_idAnoEscolar'];
    public  $timestamps = false;
}

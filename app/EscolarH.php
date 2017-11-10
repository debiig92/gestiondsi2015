<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class EscolarH extends Model
{
    //
    protected $connection='historico';
    protected $table = 'anoescolar';
    protected $primaryKey='id';
    protected $fillable = ['id','anoEscolar'];
    public  $timestamps = false;
}

<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Escolar extends Model
{
    //
    protected $table = 'anoescolar';
    protected $primaryKey='id';
    protected $fillable = ['id','anoEscolar','estado'];
    public  $timestamps = false;
}

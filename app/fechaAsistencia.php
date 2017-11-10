<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class fechaAsistencia extends Model
{
    protected $table= 'asistencia';

  protected $fillable = ['id','fecha'];

  public $timestamps = false;
   public static function saveFecha($date){
   	DB::table('asistencia')->insert(['fecha'=>$date]);
   
   }

   public static function findFecha($date){
    return DB::table('asistencia')->where(['fecha'=>$date])->first();
   }
}

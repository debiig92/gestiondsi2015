<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{

  protected $table= 'docentegrado';

  protected $fillable = ['id','NIP','grado_id'];

public $timestamps = false;
  public static function getGrado($nip){
   //$result= DB::select('select * from docentegrado where NIP=:nip',['nip'=>$nip]);
   return  Asistencia::join('grado','docentegrado.grado_id','=','grado.id')
   				->where('docentegrado.nip',$nip)->select('grado.id','grado.grado')->get();
  }



}

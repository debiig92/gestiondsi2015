<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model {

    protected $table = 'indicador';
    protected $fillable = ['IDAREAIN','NUMEROINDICADOR','INDICADOR','grado_id'];
    public $timestamps = false;
    //===========================================
    public function scopeArea($query,$area){
        //  dd("scope: ".$grado);
        $query->where('IDAREAIN',$area);
    }
    public function scopeParvularia($query,$grado){
        //  dd("scope: ".$grado);
       $query->where('grado_id',$grado);
    }

    public function scopeIndicador($query,$indicador){
        //dd("scope: ".$name);

         $query->where(\DB::raw("INDICADOR"),"LIKE","%$indicador%");

    }
    public static function filtrosAreaIndicador($indicador,$grado,$area)
    {
        return Indicadores::Indicador($indicador)->area($area)->parvularia($grado)->get();
    }

    public static function filtrosAreaGrado($grado,$area)
    {
        return Indicadores::area($area)->parvularia($grado)->get();
    }


}

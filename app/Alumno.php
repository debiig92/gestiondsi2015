<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model {

    protected $table = 'alumno';

    protected $primaryKey='NIE';

    protected $fillable = ['NIE','grado_id','user_id','encargado_id','nombre','apellidos','direccion','sexo','fecha_nac','lugar_nac','numero','folio','tomo','libro','nombrePadre','nombreMadre','DUIP','DUIM','DUIE','nombreE','direccionE','telefonoE'];

    public function scopeGrado($query,$grado){
      //  dd("scope: ".$grado);
        $query->where('grado_id',$grado);
    }
    public function scopeEstado2($query){
        //  dd("scope: ".$grado);
        $query->where('estado',0);
    }

    public function scopeEstado($query){
        //  dd("scope: ".$grado);
        $query->where('estado',1);
    }
    public function scopeName($query,$name){
    //dd("scope: ".$name);
    if(trim($name)!=''){
            return  $query->where(\DB::raw("CONCAT(nombre,' ',apellidos)"),"LIKE","%$name%");
          }
    }
    public static function filtrosPromocion($name,$grado)
    {
      return Alumno::name($name)->grado($grado)->estado()->orderBy('apellidos','ASC')->paginate(16);
    }


    public static function filtrosPromocion2($name,$grado)
    {
        return Alumno::name($name)->grado($grado)->estado2()->orderBy('apellidos','ASC')->paginate(16);
    }




    public function Encargado(){
        // un alumno tiene  a un encardgado
        return $this->hasOne('App\Encargado','encargado_id');
    }

    public static function getAlumnosGrado($id){

    //    return Alumno::where('grado_id',$id)->select('alumno.NIE','alumno.nombre','alumno.apellidos', 'alumno.grado_id') ->paginate(16);

        return Alumno::where('grado_id',$id)->where('estado',1)->select('alumno.NIE','alumno.nombre','alumno.apellidos', 'alumno.grado_id') ->paginate(10);

    }
}

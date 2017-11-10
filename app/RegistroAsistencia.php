<?php

namespace App;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RegistroAsistencia extends Model
{
   protected $table= 'alumno_has_asistencia';

  protected $fillable = ['alumno_NIE','asistencia_IDASISTENCIA','asistio'];
   public $timestamps = false;



  public static function saveAsistencia($id, $date){
      $value=DB::table('alumno_has_asistencia')->where(['alumno_NIE'=>$id, 'asistencia_IDASISTENCIA'=>$date])->first();
      if(empty($value)){
    	return DB::table('alumno_has_asistencia')->insert(['alumno_NIE'=>$id, 'asistencia_IDASISTENCIA'=>$date, 'asistio'=>1]);
   	  } else
      return false;
   }

     public static function saveInasistencia($id, $date){
    $value=DB::table('alumno_has_asistencia')->where(['alumno_NIE'=>$id, 'asistencia_IDASISTENCIA'=>$date])->first();
      if(empty($value)){
    	return DB::table('alumno_has_asistencia')->insert(['alumno_NIE'=>$id, 'asistencia_IDASISTENCIA'=>$date, 'asistio'=>0]);
   	} else return false;
   }

    public static function asistenciaPorMes($nie,$año){
          
          $inicio=Carbon::create($año,1,1);
          $fin=Carbon::create($año,1,31);
          $enero=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,2,1);
          $fin=Carbon::create($año,2,29);
          $febrero=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,3,1);
          $fin=Carbon::create($año,3,31);
          $marzo=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,4,1);
          $fin=Carbon::create($año,4,30);
          $abril=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,5,1);
          $fin=Carbon::create($año,5,31);
          $mayo=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,6,1);
          $fin=Carbon::create($año,6,30);
          $junio=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,7,1);
          $fin=Carbon::create($año,7,31);
          $julio=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,8,1);
          $fin=Carbon::create($año,8,30);
          $agosto=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,9,1);
          $fin=Carbon::create($año,9,31);
          $septiembre=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,10,1);
          $fin=Carbon::create($año,10,31);
          $octubre=RegistroAsistencia::asistenciaPorAlumno($nie,$inicio,$fin);

          $data=[
                 'enero'=>$enero,
                 'febrero'=>$febrero,
                 'marzo'=>$marzo,
                 'abril'=>$abril,
                 'mayo'=>$mayo,
                 'junio'=>$junio,
                 'julio'=>$julio,
                 'agosto'=>$agosto,
                 'septiembre'=>$septiembre,
                 'octubre'=>$octubre
                 ];
        return $data;
    }


    public static function asistenciasTotales($fechaIni, $fechaFin){

     return DB::table('alumno_has_asistencia')
         ->orderBy('asistencia_IDASISTENCIA','ASC')
         ->where('asistio','=', 1)
         ->join('asistencia', 'alumno_has_asistencia.asistencia_IDASISTENCIA', '=', 'asistencia.id')
         ->whereBetween('asistencia.fecha',array($fechaIni, $fechaFin))
         ->join('alumno','alumno_has_asistencia.alumno_NIE','=','alumno.NIE')
         ->count();

   }


    public static function inasistenciasTotales($fechaIni, $fechaFin){

     return DB::table('alumno_has_asistencia')
         ->orderBy('asistencia_IDASISTENCIA','ASC')
         ->where('asistio','=', 0)
         ->join('asistencia', 'alumno_has_asistencia.asistencia_IDASISTENCIA', '=', 'asistencia.id')
         ->whereBetween('asistencia.fecha',array($fechaIni, $fechaFin))
         ->join('alumno','alumno_has_asistencia.alumno_NIE','=','alumno.NIE')
         ->count();

   }


    public static function asistenciaPorAlumno($nie, $fechaIni, $fechaFin){

     return DB::table('alumno_has_asistencia')
         ->orderBy('asistencia_IDASISTENCIA','ASC')
         ->where('asistio','=', 1)
         ->join('asistencia', 'alumno_has_asistencia.asistencia_IDASISTENCIA', '=', 'asistencia.id')
         ->where('alumno_has_asistencia.alumno_NIE',$nie)
         ->whereBetween('asistencia.fecha',array($fechaIni, $fechaFin))
         ->select('alumno_has_asistencia.alumno_NIE','alumno_has_asistencia.asistencia_IDASISTENCIA')
         ->count();

   }

    public static function inasistenciaPorMes($nie,$año){
          $año=2015;
          $inicio=Carbon::create($año,1,1);
          $fin=Carbon::create($año,1,31);
          $enero=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,2,1);
          $fin=Carbon::create($año,2,29);
          $febrero=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,3,1);
          $fin=Carbon::create($año,3,31);
          $marzo=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,4,1);
          $fin=Carbon::create($año,4,30);
          $abril=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,5,1);
          $fin=Carbon::create($año,5,31);
          $mayo=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,6,1);
          $fin=Carbon::create($año,6,30);
          $junio=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,7,1);
          $fin=Carbon::create($año,7,31);
          $julio=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,8,1);
          $fin=Carbon::create($año,8,30);
          $agosto=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,9,1);
          $fin=Carbon::create($año,9,31);
          $septiembre=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);
          $inicio=Carbon::create($año,10,1);
          $fin=Carbon::create($año,10,31);
          $octubre=RegistroAsistencia::inasistenciaPorAlumno($nie,$inicio,$fin);

          $data=[
                 'enero'=>$enero,
                 'febrero'=>$febrero,
                 'marzo'=>$marzo,
                 'abril'=>$abril,
                 'mayo'=>$mayo,
                 'junio'=>$junio,
                 'julio'=>$julio,
                 'agosto'=>$agosto,
                 'septiembre'=>$septiembre,
                 'octubre'=>$octubre,
                 ];
        return $data;
    }
    public static function inasistenciaPorAlumno($nie, $fechaIni, $fechaFin){

     return DB::table('alumno_has_asistencia')
         ->orderBy('asistencia_IDASISTENCIA','ASC')
         ->where('asistio','=', 0)
         ->where('alumno_NIE',$nie)
         ->join('asistencia', 'alumno_has_asistencia.asistencia_IDASISTENCIA', '=', 'asistencia.id')
         ->whereBetween('asistencia.fecha',array($fechaIni, $fechaFin))
         ->count();
   }

   public static function asistenciaTotales(){
    return DB::table('alumno_has_asistencia')
            ->join('asistencia', 'alumno_has_asistencia.asistencia_IDASISTENCIA', '=', 'asistencia.id')
            ->whereBetween('asistencia.fecha',array($inicio[0]->fecha, $fin[0]->fin))
            ->get();
   }





}

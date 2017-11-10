<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09-15-15
 * Time: 04:10 PM
 */
namespace App;
use App\Alumno;
use App\Grado;
use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Auth;

class configuracion {

// para retornar nombre de usuario

    public static function nombreUsuario($id){
        $docente=User::find($id)->docente;
       return  $nombre=$docente->nombre;

    }
    // para retornar grados xD
    public  static function grados(){
       return $grado=Grado::lists('grado','id');
    }

    // para retornar grados xD
    public  static function docentes(){
       return $grado=Docente::lists('nombre','NIP');
    }


    public  static function gradosPorDocente($id){
        $tipoU=User::find($id)->idtu;
        if($tipoU==2 || $tipoU==3 ){
        $docente=User::find($id)->docente;
        $gra = \DB::table('docentegrado')
            ->select('grado_id')
            ->where('NIP', $docente->NIP)
            ->get();

        $grado=array();
        foreach ($gra as $g) {
            $grado[]= \DB::table('grado')
                ->select('id','grado')
                ->where('id', $g->grado_id)
                ->get();

        }
      $str = array_flatten($grado);
      return $str;
        }
        else{

            $grado=Grado::all();
            return $grado;
        }

    }


    public  static function gradosPorDocenteSinP($id){
        $tipoU=User::find($id)->idtu;
        if($tipoU==2 || $tipoU==3 ){
        $docente=User::find($id)->docente;
        $gra = \DB::table('docentegrado')
            ->select('grado_id')
            ->where('NIP', $docente->NIP)
            ->get();

        $grado=array();
        foreach ($gra as $g) {
            $grado[]= \DB::table('grado')
                ->select('id','grado')
                ->where('id', $g->grado_id)
                ->get();

        }
      $str = array_flatten($grado);
      return $str;
        }
        else{

            $grado=Grado::whereIn('tipo_id',[1,2,3])->get();
            return $grado;
        }

    }


    public static function alumnosActivos(){
       return $alumno = \DB::table('alumno')
            ->where('estado', 1)
            ->orderBy('apellidos','ASC')
             ->paginate(16);
    }

    public static function alumnosActivos2(){
       return $alumno = \DB::table('alumno')
            ->where('estado', 3)
            ->orderBy('apellidos','ASC')
             ->paginate(16);
    }


    public static function alumnosNoActivos(){
        return $alumno = \DB::table('alumno')
            ->where('estado', 0)
            ->orderBy('apellidos','ASC')
            ->paginate(16);
    }






    public static function alumnos(){
        return    $alumno=Alumno::orderBy('apellidos','ASC')->get();
    }
    public static function tipo(){
        $tipo= Auth::user()->idtu;
        return $tipo;
    }
    public static function primerCiclo(){
        $grados = \DB::table('grado')
            ->select('id','grado')
            ->where('tipo_id',1)
            ->get();

        return $grados;
    }
    public static function segundoCiclo(){
        $grados = \DB::table('grado')
            ->select('id','grado')
            ->where('tipo_id',2)
            ->get();

        return $grados;
    }
    public static function tercerCiclo(){
        $grados = \DB::table('grado')
            ->select('id','grado')
            ->where('tipo_id',3)
            ->get();

        return $grados;
    }

    public static function parvularia(){
        $grados = \DB::table('grado')
            ->select('id','grado')
            ->where('tipo_id',4)
            ->get();

        return $grados;
    }
}

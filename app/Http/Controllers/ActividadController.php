<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\configuracion;
use App\User;
use Auth;
use App\Actividad;
use App\Asistencia;


class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id=Auth::user()->id;
  		$docente=User::find($id)->docente;
  		$nombre=$docente->nombre;
      $nip=$docente->NIP;
      $tipo=configuracion::tipo();
//================================================================================================
//Devuelve los valores para crear actividades de primer ciclo------------------------------------
      $asignaturas= \DB::table('asignatura')
                      //  ->whereNotIn('asignatura.id',['CC','INN'])
                        ->get();
      $tipoactividades= \DB::table('tipoactividad')
                      ->whereNotIn('id',[2])
                      ->get();
      $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->whereNotIn('grado.tipo_id',[2,3,4])
            ->select('grado.id', 'grado.grado')
            ->get();
//===================================================================================================
//Devuelve los valores para crear actividades para materias asignadas.------------------------------
$GradosAsignados=\DB::table('asignatura_has_docente')
          ->join('grado','asignatura_has_docente.grado_id','=','grado.id')
          ->join('asignatura','asignatura_has_docente.ASIGNATURA_idASIGNATURA','=','asignatura.id')
          ->where('asignatura_has_docente.docente_NIP',"=",$nip)
          ->whereNotIn('grado.tipo_id',[1,4])
         ->get();
//===================================================================================================
  		return view('Actividades/crear_actividades', compact('nombre','tipo','asignaturas','tipoactividades','grados',"NIP",'GradosAsignados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//---------------------------------------------------------------------------------------------------
//manteniendo la session
     $id=Auth::user()->id;
     $docente=User::find($id)->docente;
     $nombre=$docente->nombre;
     $tipo=configuracion::tipo();
     $action=$request->accion;//recupera el action
     $tipoactividades= \DB::table('tipoactividad')
                     ->whereNotIn('id',[2])
                     ->get();
//===================================================================================================
//Guarda las actividades por grados------------------------------------------------------------------
       if($action==1)
       {
        $actividad= new Actividad();
        $actividad->grado_id=$request->grado_act;
        $actividad->nombre=$request->nombre;
        $actividad->ponderacion=$request->ponderacion;
        $actividad->ASIGNATURA_idASIGNATURA=$request->act_asignatura;
        $actividad->TipoActividad_id=$request->tipo_act;
        $actividades=\DB::table("actividades")
                     ->where('grado_id', "=",  $actividad->grado_id)
                     ->where('ASIGNATURA_idASIGNATURA',"=",$actividad->ASIGNATURA_idASIGNATURA)
                     ->whereNotIn('tipoactividad_id',[2])
                     ->get();
                     $sum=0;
                     foreach ($actividades as $act)
                     {
                       $sum=$sum+($act->ponderacion);
                     }
                     $sum=$sum+$actividad->ponderacion;

                     if($sum > 100)
                     {
                      $mensaje="Las actividades totales son mayores al 100%. Consulte las actividades registradas";
                      return view('Actividades/error', compact('nombre','tipo','mensaje'));

                     }
                     else
                     {
                       if($actividad->TipoActividad_id==3)
                       {
                         //Aqui creara la actividad
                         $actividad->save();
                         //Primero recuperamos los alumnos;

                       }
                       else
                       {
                         $actividad->save();
                       //hay que invocar un metodo que cree las notas.....
                      // $mensaje="Su actividad ha sido guardada";
                    //   return view('Actividades/exito', compact('nombre','tipo','mensaje'));
                       return redirect('/actividad')->with('message', 'Actividad ha sido creada');;
                     }
                  }

//====================================================================================================
      return redirect('/actividad')->with('message', 'Actividad ha sido creada');;
    }
    else
    {
      if($action==2)
      {
        //Recupera el numero de fila asi se hace el request para lo demas

        $i=$request->fila;
        if($i=="")
        {
           return redirect('/actividad')->with('message-error', 'No tiene asignaturas asignadas');;
        }
        else{
        $grad="grado".$i;
        $as="asignatura".$i;
        $grado=$request->$grad;
        $asignatura=$request->$as;
        $selecAs=\DB::table('asignatura')
                    ->where('id',"=", $asignatura)->get();
        $selectGrad=\DB::table('grado')
                      ->where('id','=', $grado)->get();
        //---------------------------------------------------------------
        return view('Actividades/Activida_As/Crear_Act_As', compact('nombre','tipo','selecAs','selectGrad','tipoactividades'));
      }}else
      {
//======================================================================================================================
//Guarda las actividades por asignatura................................................................................
        if($action==3)
        {
          $grad=$request->grado;
          $as=$request->asignatura;
          $selecAs=\DB::table('asignatura')
                      ->where('materia',"=", $as)->get();
          $selectGrad=\DB::table('grado')
                        ->where('grado','=', $grad)->get();
          $actividad= new Actividad();
          foreach ($selectGrad as $sg) {
            $actividad->grado_id=$sg->id;
          }
          $actividad->nombre=$request->nombre;
          $actividad->ponderacion=$request->ponderacion;
          foreach ($selecAs as $sa) {
              $actividad->ASIGNATURA_idASIGNATURA=$sa->id;
          }
          $actividad->TipoActividad_id=$request->tipo_act;
          $sum=0;
          $actividades=\DB::table("actividades")
                       ->where('grado_id', "=",  $actividad->grado_id)
                       ->where('ASIGNATURA_idASIGNATURA',"=",$actividad->ASIGNATURA_idASIGNATURA)
                       ->whereNotIn('tipoactividad_id',[2])
                       ->get();
         foreach ($actividades as $act)
         {
           $sum=$sum+($act->ponderacion);
         }
         $sum=$sum+$actividad->ponderacion;
         if($sum > 100)
         {
          $mensaje="Las actividades totales son mayores al 100%. Consulte las actividades registradas";
          return view('Actividades/error', compact('nombre','tipo','mensaje'));

         }
         else
         {
           $actividad->save();
           $mensaje="Su actividad ha sido guardada";
           return view('Actividades/exito', compact('nombre','tipo','mensaje'));
         }

        }
      }
      }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \s\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function consultar($id)
    {

    }
}

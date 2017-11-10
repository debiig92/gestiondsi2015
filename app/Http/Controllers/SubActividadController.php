<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\configuracion;
use App\User;
use Auth;
use App\Actividad;
use App\Asistencia;

class SubActividadController extends Controller
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
      $tipo=configuracion::tipo();
      $nip=$docente->NIP;
      //Si es docente de primer ciclo
      $asignaturas= \DB::table('asignatura')
                  //  ->whereNotIn('id',['CC','INN'])
                    ->get();
      $grados=\DB::table('docentegrado')
             ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
             ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
             ->where('docente.user_id',"=",$id)
             ->select('grado.id', 'grado.grado')
             ->whereNotIn('grado.tipo_id',[2,3,4])
             ->get();
      $asig=\DB::table('asignatura_has_docente')
         	      ->join('grado','asignatura_has_docente.grado_id','=','grado.id')
         				->join('asignatura','asignatura_has_docente.ASIGNATURA_idASIGNATURA','=','asignatura.id')
         				->where('asignatura_has_docente.docente_NIP',"=",$nip)
         				->whereNotIn('grado.tipo_id',[1,4])
         			  ->get();

    	return view('Actividades/Crear_Sub_Actividad', compact('nombre','tipo','asignaturas','grados','asig'));
      //Si es docente de segundo ciclo y tercer ciclo...


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
      $id=Auth::user()->id;
      $docente=User::find($id)->docente;
      $nombre=$docente->nombre;
      $tipo=configuracion::tipo();
      $grado=$request->grado_act;
      $asignatura=$request->act_asignatura;
      $action=$request->accion;
      $n="NULL";
      if($action==1)
      {
//=======================================================================================
        $actividades=\DB::table('actividades')
                 ->where('actividades.grado_id',"=",$grado)
                 ->where('actividades.ASIGNATURA_idASIGNATURA',"=",$asignatura)
                 ->where('actividades.tipoactividad_id',"=",'1')
                 ->get();
//=======================================================================================
        return view('Actividades/subActividad', compact('nombre','tipo','actividades'));

      }
      else{
      if($action==2)
      {
  //Entrara aqui cuando se creen las subActividades
        $act=$request->act_padre;
        $actividadPadre1=Actividad::where('id',"=",$act)->first();
        $num= $request->subact;
        $p=$request->pond;
        $sum=0;
        $actividadesHijas=\DB::table('actividades')->where('Actividades_idActividades',"=",$actividadPadre1->id)->get();
        foreach($actividadesHijas as $activity)
        {
          $sum=$sum+$activity->ponderacion;
        }
        $sum2=0;
        //Probando========================================== corrigiendo
        for($i=0; $i<$num; $i++)
        {
          $idAct="act".$i;
          $s=$request->$idAct;
          $sum2=$sum2+$s;
        }
        $sum2=$sum2+$sum;
      //  return $sum2;
        //===================================================
        if($sum2<=$actividadPadre1->ponderacion)
        {
        $actividadPadre1=DB::table('actividades')->where('id',"=",$act)->get();
        foreach ($actividadPadre1 as $actividadPadre)
        {
          if($sum2<=$actividadPadre->ponderacion)
          {
            for($i=0; $i<$num; $i++)
            {

              $sub=new Actividad();
              $idAct="act".$i;
              $name="nombre".$i;
              foreach ($actividadPadre1 as $actividadPadre)
              {
                $sub->grado_id=$actividadPadre->grado_id;
                $sub->nombre=$request->$name;
                $sub->ponderacion=$request->$idAct;
                $sub->ASIGNATURA_idASIGNATURA=$actividadPadre->ASIGNATURA_idASIGNATURA;
                $sub->TipoActividad_id=2;
                $sub->Actividades_idActividades=$actividadPadre->id;
                $sub->save();
              }
          }
          $sub="";
          $mensaje="Sub Actividades guardas";
          return view('Actividades/exito', compact('nombre','tipo','mensaje'));
        }//Aqui termina la validacion de ponderacion.
        else
        {
          $actividades=\DB::table('actividades')
                   ->where('actividades.grado_id',"=",$grado)
                   ->where('actividades.ASIGNATURA_idASIGNATURA',"=",$asignatura)
                   ->where('actividades.tipoactividad_id',"=",'1')
                   ->get();
          $mensaje="La ponderacion de las Sub-Actividades es mayor a la de la Actividad";
          return view('Actividades/error', compact('nombre','tipo','mensaje'));

        }
      }}else
      {
        $mensaje="El total de Sub-Actividades es mayor a la de la Actividad";
        return view('Actividades/error', compact('nombre','tipo','mensaje'));
      }
      }
      else
      {
        if($action==3)
        {
          $i=$request->fila;
          $a="asignatura".$i;
          $g="grado".$i;
          $grado=$request->$g;
          $asignatura=$request->$a;
          $actividades=\DB::table('actividades')
                   ->where('actividades.grado_id',"=",$grado)
                   ->where('actividades.ASIGNATURA_idASIGNATURA',"=",$asignatura)
                   ->where('actividades.tipoactividad_id',"=",'1')
                   ->get();
  //=======================================================================================
          return view('Actividades/subActividad', compact('nombre','tipo','actividades'));
        }
      }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}

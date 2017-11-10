<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\configuracion;
use App\User;
use Auth;
use App\Actividad;
use App\Materia;
use App\Nota;
class updatePorGradoController extends Controller
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
      $asig=\DB::table('asignatura_has_docente')
                ->join('grado','asignatura_has_docente.grado_id','=','grado.id')
                ->join('asignatura','asignatura_has_docente.ASIGNATURA_idASIGNATURA','=','asignatura.id')
                ->where('asignatura_has_docente.docente_NIP',"=",$nip)
                ->whereNotIn('grado.tipo_id',[1,4])
               ->get();
      $actividades="";
      return view('Actividades/Update/ConsultarPA', compact('nombre','tipo','asig','actividades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $action=$request->accion;
      if($action==1)
      {
      $i=$request->fila;
      $asi="asignatura".$i;
      $grado="grado".$i;
      $as=$request->$asi;
      $grado=$request->$grado;
      $id=Auth::user()->id;
      $docente=User::find($id)->docente;
      $nombre=$docente->nombre;
      $tipo=configuracion::tipo();
      $nip=$docente->NIP;
      $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->select('grado.id', 'grado.grado')
            ->get();
            $asig=\DB::table('asignatura_has_docente')
                      ->join('grado','asignatura_has_docente.grado_id','=','grado.id')
                      ->join('asignatura','asignatura_has_docente.ASIGNATURA_idASIGNATURA','=','asignatura.id')
                      ->where('asignatura_has_docente.docente_NIP',"=",$nip)
                      ->whereNotIn('grado.tipo_id',[1,4])
                     ->get();
      $actividades=\DB::table('actividades')
                        ->join('tipoactividad','actividades.tipoactividad_id','=','tipoactividad.id')
                        ->where('grado_id',"=",$grado)
                        ->where('ASIGNATURA_idASIGNATURA',"=",$as)
                        ->select('actividades.id','actividades.ponderacion','actividades.nombre','tipoactividad.nombre As tp')
                        ->get();
      $asignaturas= \DB::table('asignatura')
                      //  ->whereNotIn('asignatura.id',['CC','INN'])
                        ->get();
      return view('Actividades/Update/ConsultarPA', compact('nombre','tipo','grados','actividades','asignaturas','asig'));
    }else
    {
      if($action==2)
      {
        $id=$request->idActividad;
        $nombre=$request->nombre;
        $ponderacion=$request->ponderacion;
        $actividad=Actividad::where('id',$id)->first();
        if($actividad->tipoactividad_id !=2)
        {
          $actividades=\DB::table('actividades')
                      ->where('grado_id',"=",$actividad->grado_id)
                      ->whereNotIn('tipoactividad_id',[2])
                      ->where('ASIGNATURA_idASIGNATURA','=',$actividad->ASIGNATURA_idASIGNATURA)
                      ->get();
          $sum=0;
          foreach($actividades as $a)
          {
            $sum=$sum+$a->ponderacion;
          }
          $sum=$sum-$actividad->ponderacion;
          $sum=$sum+$ponderacion;
          if($sum<=100)
          {
            $subActividades=\DB::table('actividades')
                             ->where('Actividades_idActividades',$actividad->id)
                             ->where('tipoactividad_id',"=",2)
                             ->get();
           $suma=0;
            foreach($subActividades as $sub)
            {
              $suma=$suma+$sub->ponderacion;
            }
            if($suma <= $ponderacion)
            {
              $result=Actividad::where('id',$actividad->id)->update(array('ponderacion' => $ponderacion,'nombre'=>$nombre));
              return redirect('/updateG')->with('message', 'Actividad Actualizada');;
            }
            else{
              return redirect('/updateG')->with('message-error', 'La ponderacion de la actividad es menor a la suma de sus subactividades');;
            }
          }
          else{
            return redirect('/updateG')->with('message-error', 'Las ponderaciones de las actividades es mayor a 100%');;
          }

        }
        else
        {

          $subActividades=\DB::table('actividades')
                           ->where('Actividades_idActividades',$actividad->Actividades_idActividades)
                           ->where('tipoactividad_id',"=",2)
                           ->get();
          $actividadpadre=Actividad::where('id',$actividad->Actividades_idActividades)->first();
          $suma1=0;
          foreach ( $subActividades as $sub)
          {
            $suma1=$suma1+$sub->ponderacion;
          }
          $suma1=$suma1-$actividad->ponderacion;
          $suma1=$suma1+$ponderacion;
          if($suma1 <=$actividadpadre->ponderacion)
          {
            $result=Actividad::where('id',$actividad->id)->update(array('ponderacion' => $ponderacion,'nombre'=>$nombre));
            return redirect('/updateG')->with('message', 'Sub-Actividad Actualizada');;
          }
            else{
              return redirect('/updateG')->with('message-error', 'La suma de las subactividades debe ser menor o igual a la de la actividad padre');;
            }
        }

      }
      else{}

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
      
      $nota=Nota::where('Actividades_idActividades',$id)->first();
      if($nota=="")
      {
        $subactividad=Actividad::where('Actividades_idActividades',$id)->first();
        if($subactividad =="")
        {
          $result = Actividad::where('id', $id)->delete();
          return redirect('/updateG')->with('message', 'Actividad eliminada');;
        }else{
          return redirect('/updateG')->with('message-error', 'No se puede eliminar tiene subactividades');;}

      }else
      {
        return redirect('/updateG')->with('message', 'No se puede eliminar tiene notas asociadas');;
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $actividad = Actividad::where('id',$id)
                  ->first();
      $subactividad=Actividad::where('id',$actividad->Actividades_idActividades)->first();
      $as=Materia::where('id',$actividad->ASIGNATURA_idASIGNATURA)->first();
      if($subactividad!="")
      {
      $actividad->Actividades_idActividades=$subactividad->nombre;
      }else{$actividad->Actividades_idActividades="No posee actividad padre";}

      $actividad->ASIGNATURA_idASIGNATURA=$as->materia;

      return response()->json
      (
      $actividad->toArray()
    );
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
        //
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

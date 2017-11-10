<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Actividad;
use App\Nota;
class LlenarBDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function llenarNotas()
    {
    /*  ini_set("memory_limit","7G");
      ini_set('max_execution_time', '0');
      ini_set('max_input_time', '0');
      set_time_limit(0);
      ignore_user_abort(true);
      */  $actividades=\DB::table('actividades')->whereNotIn('tipoactividad_id',[1])->get();
        foreach ($actividades as $act)
        {
          $alumnos=\DB::table('alumno')->where('grado_id',"=",$act->grado_id)->get();
          foreach($alumnos as $alumno)
          {
            $n= new Nota();
            $n->nota=(rand(4, 10));
            $n->alumno_NIE=$alumno->NIE;
            $n->PeriodoTrimestral_idPeriodoTrimestral=2;
            $n->Actividades_idActividades=$act->id;
            $n->save();
          }
        }
        return "Notas registradas";
    }
    public function llenarSubactividad()
    {
      $actividades=\DB::table('actividades')->whereNotIn('tipoactividad_id',[2,3])->get();
      foreach ($actividades as $act)
      {
        $actividad1= new Actividad();
        $actividad1->grado_id=$act->grado_id;
        $actividad1->nombre="Subactividad-1";
        $actividad1->ponderacion=35;
        $actividad1->ASIGNATURA_idASIGNATURA=$act->ASIGNATURA_idASIGNATURA;
        $actividad1->TipoActividad_id=2;
        $actividad1->Actividades_idActividades=$act->id;
        $actividad1->save();
      }
      return "Sub-Actividades creadas";
    }

    public function llevarActividades()
    {
      $grados=\DB::table('grado')->whereNotIn('tipo_id',[4])->get();
      foreach ($grados as $g)
      {
        $asignaturas=\DB::table('asignaturaciclo')->where('tipociclo_id',"=",$g->tipo_id)->get();

        foreach($asignaturas as $as)
        {
          $actividad1= new Actividad();
          $actividad1->grado_id=$g->id;
          $actividad1->nombre="Actividad-1";
          $actividad1->ponderacion=35;
          $actividad1->ASIGNATURA_idASIGNATURA=$as->asignatura_id;
          $actividad1->TipoActividad_id=1;
          $actividad1->save();

          $actividad2= new Actividad();
          $actividad2->grado_id=$g->id;
          $actividad2->nombre="Actividad-2";
          $actividad2->ponderacion=35;
          $actividad2->ASIGNATURA_idASIGNATURA=$as->asignatura_id;
          $actividad2->TipoActividad_id=1;
          $actividad2->save();

          $prueba= new Actividad();
          $prueba->grado_id=$g->id;
          $prueba->nombre="Examen Final";
          $prueba->ponderacion=30;
          $prueba->ASIGNATURA_idASIGNATURA=$as->asignatura_id;
          $prueba->TipoActividad_id=3;
          $prueba->save();
        }
      }
        return "Actividades creadas";
    }

}

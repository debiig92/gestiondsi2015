<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProbandoController extends Controller
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
//Defino variables principales
      $grado;$asignatura;
      $trimestre=Periodo::where('estado',"=",1)->first();
      $escolar=Escolar::where('estado',"=",1)->first();

      if($escolar!="")
      {
        if($trimestre !="")
        {
      $action=$request->accion;

      if($action==1)
      {
        $grado=$request->grado_act;
        $asignatura=$request->act_asignatura;
      }
      else
      {
        $i=$request->fila;
        $g="grado".$i;
        $a="asignatura".$i;
        $grado=$request->$g;
        $asignatura=$request->$a;
      }
  $procesados=AsignaturaGrado::where('grado_id',$grado)->where('ASIGNATURA_idASIGNATURA',$asignatura)->first();
  if($procesados->estado==0)
  {
    $estado=1;
    $actividadPadre=\DB::table('actividades')
                         ->whereNotIn('tipoactividad_id',[2,3])
                         ->where('grado_id',"=",$grado)
                         ->where('ASIGNATURA_idASIGNATURA',"=",$asignatura)
                        ->get();
  if($actividadPadre!="")
  {
//===================================================================================================================================
//Verifica si esta el periodo creado en la base historico....
    $trimestre=Periodo::where('estado',"=",1)->first();
    $escolar=Escolar::where('estado',"=",1)->first();
    $t;$a;
    $a=EscolarH::where('anoEscolar',"=",$escolar->anoEscolar)->first();
    if($a=="")
    { ///Si esta vacio...crea  el ano escolar.
      $ano=new EscolarH();
      $ano->anoEscolar=$escolar->anoEscolar;
      $ano->save();
      $a=EscolarH::where('anoEscolar',$escolar->anoEscolar)->first();
      $t=PeriodoH::where('numperiodo',"=",$trimestre->numperiodo)->where('AnoEscolar_idAnoEscolar',"=",$a->id)->first();
      if($t=="")
      {
        $trimestrehistorico=new PeriodoH();
        $trimestrehistorico->numperiodo=$trimestre->numperiodo;
        $trimestrehistorico->AnoEscolar_idAnoEscolar=$a->id;
        $trimestrehistorico->save();
        $t=PeriodoH::where('numperiodo',"=",$trimestre->numperiodo)->where('AnoEscolar_idAnoEscolar',"=",$a->id);
      }
      else{}}
    else
    {
      $a=EscolarH::where('anoEscolar',$escolar->anoEscolar)->first();
      $t=PeriodoH::where('numperiodo',"=",$trimestre->numperiodo)->where('AnoEscolar_idAnoEscolar',"=",$a->id)->first();
      if($t=="")
      {
        $trimestrehistorico=new PeriodoH();
        $trimestrehistorico->numperiodo=$trimestre->numperiodo;
        $trimestrehistorico->AnoEscolar_idAnoEscolar=$a->id;
        $trimestrehistorico->save();
        $t=PeriodoH::where('numperiodo',"=",$trimestre->numperiodo)->where('AnoEscolar_idAnoEscolar',"=",$a->id)->first();
      }
      else{
       $t=PeriodoH::where('numperiodo',"=",$trimestre->numperiodo)->where('AnoEscolar_idAnoEscolar',"=",$a->id)->first();
      }
    }
//===================================================================================================================================
$alumnos=\DB::table('alumno')->where('grado_id',"=",$grado)->get();
//===================================================================================================================
//Proceso las notas aqui.. xD
foreach($alumnos as $alumno)
{//Verifica si el alumno ya esta registrado si no lo esta no lo registra.
  $alum=AlumnoH::where('NIE',$alumno->NIE)->first();
  if($alum=="")
  {
  $alumnoh= new AlumnoH();
  $alumnoh->NIE=$alumno->NIE;
  $alumnoh->nombre=$alumno->nombre;
  $alumnoh->apellidos=$alumno->apellidos;
  $alumnoh->save();}else {} //Lo registra si el alumno no esta en la base base;
//=========================================================================================================================
foreach($actividadPadre as $ap)
{
//crear la actividad Padre;Veritifica si existe tal actividad;
$verifica=ActividadH::where('grado_id',$ap->grado_id)->where('ASIGNATURA_idASIGNATURA',$ap->ASIGNATURA_idASIGNATURA)->where('nombre',$ap->nombre)->first();
  if($verifica=="")
  {//Si la actividad no existe la crea..
  $actividadH= new ActividadH();
  $actividadH->nombre=$ap->nombre;
  $actividadH->ponderacion=$ap->ponderacion;
  $actividadH->grado_id=$ap->grado_id;
  $actividadH->tipoactividad_id=$ap->tipoactividad_id;
  $actividadH->ASIGNATURA_idASIGNATURA=$ap->ASIGNATURA_idASIGNATURA;
  $actividadH->save();}else{}
//Buscar actividad en base 2
  $ah=ActividadH::where('grado_id',$ap->grado_id)
               ->where('ASIGNATURA_idASIGNATURA',$ap->ASIGNATURA_idASIGNATURA)
               ->where('nombre', $ap->nombre)
               ->first();
  $suma=0;
  $subactividades=\DB::table('actividades')
                  ->where('Actividades_idActividades',"=", $ap->id)
                  ->get();
if($subactividades!="")
{
  foreach($subactividades as $sub)
  {
    $nota=Nota::where('Actividades_idActividades',"=",$sub->id)->where('alumno_NIE',$alumno->NIE)->first();
    $suma=$suma+(($nota->nota)*(($sub->ponderacion)/100));
  }
  $promedio=($suma/(($ap->ponderacion)/10)*10);
 //Procedo a crear la nota
  $verificaNota=NotaH::where('alumno_NIE',$alumno->NIE)
                      ->where('Actividades_idActividades',$ah->id)
                      ->where('PeriodoTrimestral_idPeriodoTrimestral', $t->id)
                      ->first();
  if($verificaNota=="")
  {
    $n= new NotaH;
    $n->nota=$promedio;
    $n->alumno_NIE=$alumno->NIE;
    $n->PeriodoTrimestral_idPeriodoTrimestral=$t->id;
    $n->Actividades_idActividades=$ah->id;
    $n->tipoNota_idtipoNota=1;
    $n->save();
  }
  else{return redirect('/procesar')->with('message-error', 'Las  notas ya han sido procesadas');;}}
  else{return redirect('/procesar')->with('message-error', 'No hay subactividades, ni notas que registrar');;}}}
//=====================================================================================================================
//Prueba Objetiva;
$grado=$request->grado_act;
$asignatura=$request->act_asignatura;
$alumnos=\DB::table('alumno')->where('grado_id',"=",$grado)->get();
$pruebaObjetiva=\DB::table('actividades')
                    ->whereNotIn('tipoactividad_id',[1,2])
                    ->where('grado_id',"=",$grado)
                    ->where('ASIGNATURA_idASIGNATURA',"=",$asignatura)
                    ->get();
//verificar si esta creada;

       foreach($alumnos as $alumno)
       {
         foreach($pruebaObjetiva as $po)
         {
           //Verifico actividades creadas
$verifica=ActividadH::where('grado_id',$po->grado_id)->where('ASIGNATURA_idASIGNATURA',$po->ASIGNATURA_idASIGNATURA)->where('nombre',$po->nombre)->first();
          if($verifica=="")
          {//Si la actividad no existe la crea..
          $actividadH= new ActividadH();
          $actividadH->nombre=$po->nombre;
          $actividadH->ponderacion=$po->ponderacion;
          $actividadH->grado_id=$po->grado_id;
          $actividadH->tipoactividad_id=$po->tipoactividad_id;
          $actividadH->ASIGNATURA_idASIGNATURA=$po->ASIGNATURA_idASIGNATURA;
          $actividadH->save();
          }else{}
           //Buscar actividad en base 2
        $ah=ActividadH::where('grado_id',$po->grado_id)
                    ->where('ASIGNATURA_idASIGNATURA',$po->ASIGNATURA_idASIGNATURA)
                    ->where('nombre', $po->nombre)
                    ->first();
        $nota=Nota::where('Actividades_idActividades',"=",$po->id)->where('alumno_NIE',$alumno->NIE)->first();
        $promedio=$nota->nota;
        $n= new NotaH;
        $n->nota=$promedio;
        $n->alumno_NIE=$alumno->NIE;
        $n->PeriodoTrimestral_idPeriodoTrimestral=$t->id;
        $n->Actividades_idActividades=$ah->id;
        $n->tipoNota_idtipoNota=1;
        $n->save();
         }
       }
  $result=AsignaturaGrado::where('id',$procesados->id)->update(array('estado' => $estado));
  return redirect('/procesar')->with('message', 'Notas registradas');;}
  else{return redirect('/procesar')->with('message-error', 'No hay actividades creadas, ni notas registradas');;}}
  else{return redirect('/procesar')->with('message-error', 'Ya estan registradas las notas para la asignatura seleccionada');;}}
  else{return redirect('/procesar')->with('message-error', 'No hay trimestre activo.');;}}
  else{return redirect('/procesar')->with('message-error', 'No hay año escolar activo.');;}}

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
}

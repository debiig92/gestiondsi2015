<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\configuracion;
use App\User;
use App\Nota;
use App\NotaH;
use App\Grado;
use App\Materia;
use Auth;
use App\AsignaturaGrado;
use App\Periodo;
use App\Escolar;
use App\PeriodoH;
use App\EscolarH;
use App\ActividadH;
use App\Actividad;
use App\Alumno;
use App\AlumnoH;
use App\gradoAlumno;
use App\NotaF;

class ProcesarNotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se cargaran los grados que tienen asignados y materias asignados;
        $id=Auth::user()->id;
    		$docente=User::find($id)->docente;
    	  $nombre=$docente->nombre;
    		$tipo=configuracion::tipo();
    		$nip=$docente->NIP;
    		//---------------------------------------------------------------------------------------------------
    		//Recoge valores para 1 ciclo
    	  $asignaturas=\DB::table('asignatura')
    		                 //	->whereNotIn('asignatura.id',['CC','INN'])
    		                 ->get();
    		$grados=\DB::table('docentegrado')
    					->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
    					->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
    					->where('docente.user_id',"=",$id)
    					->whereNotIn('grado.tipo_id',[3,2,4])
    					->select('grado.id', 'grado.grado')
    					->get();
    //---------------------------------------------------------------------------------------------------------
    		$asig=\DB::table('asignatura_has_docente')
    	      	    ->join('grado','asignatura_has_docente.grado_id','=','grado.id')
    							->join('asignatura','asignatura_has_docente.ASIGNATURA_idASIGNATURA','=','asignatura.id')
    					   	->where('asignatura_has_docente.docente_NIP',"=",$nip)
    							->whereNotIn('grado.tipo_id',[1,4])
    			  	   ->get();
   	return view('ProcesarNotas/procesa', compact('nombre','tipo','asig','grados','asignaturas'));
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
                            //  return $actividadPadre;
        if(count($actividadPadre)!=0)
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
      //====================================================================================================================================

      //======================================================================================================================================
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
        $alumnoh->save();
        }else {} //Lo registra si el alumno no esta en la base base;
      //creo grado alumno;;;
      $v=gradoAlumno::where('nie',$alumno->NIE)->where('grado_id',$alumno->grado_id)->where('id_ano',$a->id)->first();
      if(count($v)==0)
      {
      $alumnogrado=new gradoAlumno();
      $alumnogrado->nie=$alumno->NIE;
      $alumnogrado->grado_id=$alumno->grado_id;
      $alumnogrado->id_ano=$t->id;
      $alumnogrado->save();
      }else{}
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
      if(count($subactividades)!=0)
      {
        foreach($subactividades as $sub)
        {
          $nota=Nota::where('Actividades_idActividades',"=",$sub->id)->where('alumno_NIE',$alumno->NIE)->first();
          $suma=$suma+(($nota->nota)*(($sub->ponderacion)/100));
        }
        $promedio=($suma/(($ap->ponderacion)/10)*10);
        $promedio=round($promedio);
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
              $promedio=round($promedio);
              $n= new NotaH();
              $n->nota=$promedio;
              $n->alumno_NIE=$alumno->NIE;
              $n->PeriodoTrimestral_idPeriodoTrimestral=$t->id;
              $n->Actividades_idActividades=$ah->id;
              $n->tipoNota_idtipoNota=1;
              $n->save();
               }
             }
        //Crear notas finales de trimestre----------------------------------------------------------------------
        //Probando las notas finales;
        //Crear notas finales de trimestre----------------------------------------------------------------------
        foreach ($alumnos as $alumno)
        {//$t trimestre-----
        $notas=\DB::connection('historico')->table('nota')
                  ->join('actividades', 'nota.Actividades_idActividades','=','actividades.id')
                  ->where('nota.alumno_NIE',"=",$alumno->NIE)
                  ->where('nota.PeriodoTrimestral_idPeriodoTrimestral',$t->id)
                  ->where('actividades.ASIGNATURA_idASIGNATURA',"=", $asignatura)
                  ->get();
            $suma=0;
            foreach($notas as $n)
            {
              $suma=$suma+$n->nota;
            }
            //['id','NIE','nota','asignatura','grado_id','trimestre'];
             $suma=$suma/3;
             $notaFT=new NotaF();
             $notaFT->nota=round($suma);
             $notaFT->NIE=$alumno->NIE;
             $notaFT->trimestre=$t->id;
             $notaFT->grado_id=$alumno->grado_id;
             $notaFT->asignatura=$asignatura;
             $notaFT->save();
        }
        //----------------------------------------------------------------------------------------------------------------------------------------
        //--------------------------------------------------------------------------------------------------------
        $result=AsignaturaGrado::where('id',$procesados->id)->update(array('estado' => $estado));
        return redirect('/procesar')->with('message', 'Notas registradas');;}
        else{return redirect('/procesar')->with('message-error', 'No hay actividades creadas, ni notas registradas');;}}
        else{return redirect('/procesar')->with('message-error', 'Ya estan registradas las notas para la asignatura seleccionada');;}}
        else{return redirect('/procesar')->with('message-error', 'No hay trimestre activo.');;}}
        else{return redirect('/procesar')->with('message-error', 'No hay año escolar activo.');;}
//==================================================================================================================
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
}

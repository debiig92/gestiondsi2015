<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\configuracion;
use App\User;
use Auth;
use App\Grado;
use App\Escolar;
use App\Periodo;
use App\NotaH;
use App\GradoH;
use App\EscolarH;
use App\PeriodoH;
use App\Alumno;
use App\RegistroAsistencia;
use App\Conducta;
use App\Docente;
class BoletaController extends Controller
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
    /*  $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->select('grado.id', 'grado.grado')
            ->get();*/
      $grados=configuracion::gradosPorDocenteSinP($id);
          $alumnos="";
      return view('Boleta/boleta', compact('nombre','tipo','grados','alumnos'));

    }
    public function Listar()
    {
      $id=Auth::user()->id;
      $docente=User::find($id)->docente;
      $nombre=$docente->nombre;
      $nip=$docente->NIP;
      $tipo=configuracion::tipo();
  /*    $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->select('grado.id', 'grado.grado')
            ->get();
*/
  $grados=configuracion::gradosPorDocente($id);
      return view('Boleta/lista', compact('nombre','tipo','grados'));

    }



    public function cuadroFinal()
    {
      $id=Auth::user()->id;
      $docente=User::find($id)->docente;
      $nombre=$docente->nombre;
      $tipo=configuracion::tipo();
      $grados=configuracion::gradosPorDocente($id);
      return view('Boleta/cuadroFinal', compact('nombre','tipo','grados'));

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
      $action= $request->accion;
      if($action==4)
      {
        $grado=$request->grado_act;
        $ruta='/list/'.$grado;
        return redirect($ruta);

      }

      else{
        if($action==5)
        {
          $grado=$request->grado_act;
          $ruta='/final/'.$grado;
          return redirect($ruta);

        }else{
      $id=Auth::user()->id;
      $docente=User::find($id)->docente;
      $nombre=$docente->nombre;
      $nip=$docente->NIP;
      $tipo=configuracion::tipo();
  /*    $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->select('grado.id', 'grado.grado')
            ->get();*/
      $grados=configuracion::gradosPorDocenteSinP($id);
      $grado=$request->grado_act;
      $alumnos=\DB::table('alumno')->where('grado_id',"=",$grado)->get();
      return view('Boleta/boleta', compact('nombre','tipo','grados','alumnos'));
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
      $trimestre=Periodo::where('estado','1')->first();
      if($trimestre=="")
      {
      $alumno=Alumno::where('NIE',$id)->first();
      $ruta='/boleta/'.$alumno->grado_id.'/'.$id;
      return redirect($ruta);
      }
      else
      {
        return redirect('/boletas')->with('message-error', 'El trimestre debe estar cerrado');;
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
        $grado=$request->grado_act;
        return $grado;
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
    public function generar($grado_id,$nie)
    {
//-=------------------------------------------------------------------------------------------------------------

      $alumnos=\DB::table("alumno")->where("grado_id",$grado_id)->get();
      $ano=Escolar::where('estado',1)->first();
      $trimestre1=Periodo::where('AnoEscolar_idAnoEscolar',$ano->id)->orderBy('numperiodo', 'asc')->get();
      $anoH=EscolarH::where("anoEscolar",$ano->anoEscolar)->first();
      $periodoH=\DB::connection('historico')->table('periodotrimestral')
                    ->where("AnoEscolar_idAnoEscolar","=",$anoH->id)
                    ->orderBy('numperiodo', 'asc')
                    ->get();
      $num=count($periodoH);
      $grado=Grado::where('id',$grado_id)->first();
//Asistencia------------------------------------------------------------------------------------------------------------------------------
  $asistencias=RegistroAsistencia::asistenciaPorMes($nie,$ano->anoEscolar);
  $inasistencias=RegistroAsistencia::inasistenciaPorMes($nie,$ano->anoEscolar);

//=========================================================================================================================================
//Notas de computacion
  $i=1;
foreach($periodoH as $ph){
  if($i==1)
  {
    $NotasComputacion=\DB::connection('historico')->table('grado_alumno')
                          ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                          ->join('nota','grado_alumno.nie','=','alumno_NIE')
                          ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                          ->where('grado_alumno.grado_id',"=",$grado_id)
                          ->where('grado_alumno.id_ano',$anoH->id)
                          ->where('grado_alumno.nie',$nie)
                          ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                          ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'CC')
                          //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                          ->get();
       $suma1=0;
       foreach($NotasComputacion as $n)
       {
       $suma1=$suma1+(($n->ponderacion)*($n->nota));
       }
       $suma1=round($suma1/100);
//=========================================================================================================================================
//Notas de fisica
$NotasFisica=\DB::connection('historico')->table('grado_alumno')
                      ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                      ->join('nota','grado_alumno.nie','=','alumno_NIE')
                      ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                    ->where('grado_alumno.grado_id',"=",$grado_id)
                      ->where('grado_alumno.id_ano',$anoH->id)
                      ->where('grado_alumno.nie',$nie)
                      ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                      ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'EFS')
                      ->get();
   $suma7=0;
   foreach($NotasFisica as $n)
   {
   $suma7=$suma7+(($n->ponderacion)*($n->nota));
   }
   $suma7=round($suma7/100);
//-----------------------------------------------------------------------------------------------------------------------------------------
//Notad de ciencia
  $NotasCiencia=\DB::connection('historico')->table('grado_alumno')
                    ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                    ->join('nota','grado_alumno.nie','=','alumno_NIE')
                    ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                    ->where('grado_alumno.grado_id',"=",$grado_id)
                    ->where('grado_alumno.id_ano',$anoH->id)
                    ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                    ->where('grado_alumno.nie',$nie)
                    ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'CIC')
                    //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                    ->get();
  $suma2=0;
  foreach($NotasCiencia as $n)
  {
  $suma2=$suma2+(($n->ponderacion)*($n->nota));
  }
  $suma2=round($suma2/100);
//----------------------------------------------------------------------------------------------------------------------------------------
$NotasMatematica=\DB::connection('historico')->table('grado_alumno')
                ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                ->join('nota','grado_alumno.nie','=','alumno_NIE')
                ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                ->where('grado_alumno.grado_id',"=",$grado_id)
                ->where('grado_alumno.id_ano',$anoH->id)
                ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                ->where('grado_alumno.nie',$nie)
                ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'MAT')
                ->where('nota.PeriodoTrimestral_idPeriodoTrimestral',"=",$ph->id)
                //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                ->get();
    $suma3=0;
    foreach($NotasMatematica as $n)
    {
     $suma3=$suma3+(($n->ponderacion)*($n->nota));
    }
    $suma3=round($suma3/100);

//----------------------------------------------------------------------------------------------------------------------------------------
$NotasLenguaje=\DB::connection('historico')->table('grado_alumno')
                ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                ->join('nota','grado_alumno.nie','=','alumno_NIE')
                ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                ->where('grado_alumno.grado_id',"=",$grado_id)
                ->where('grado_alumno.id_ano',$anoH->id)
                ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                ->where('grado_alumno.nie',$nie)
                ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'LENG')
                //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                ->get();
  $suma4=0;
  foreach($NotasLenguaje as $n)
  {
   $suma4=$suma4+(($n->ponderacion)*($n->nota));
  }
  $suma4=round($suma4/100);
//-----------------------------------------------------------------------------------------------------------------------------------------
$NotasSociales=\DB::connection('historico')->table('grado_alumno')
                ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                ->join('nota','grado_alumno.nie','=','alumno_NIE')
                ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                ->where('grado_alumno.grado_id',"=",$grado_id)
                ->where('grado_alumno.id_ano',$anoH->id)
                ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                ->where('grado_alumno.nie',$nie)
                ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'SOC')
                //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                ->get();
    $suma5=0;
    foreach($NotasSociales as $n)
    {
     $suma5=$suma5+(($n->ponderacion)*($n->nota));
    }
    $suma5=round($suma5/100);
//----------------------------------------------------------------------------------------------------------------------------------------=
$NotasIngles=\DB::connection('historico')->table('grado_alumno')
                ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                ->join('nota','grado_alumno.nie','=','alumno_NIE')
                ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                ->where('grado_alumno.grado_id',"=",$grado_id)
                ->where('grado_alumno.id_ano',$anoH->id)
                ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                ->where('grado_alumno.nie',$nie)
                ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'INN')
                //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                ->get();
     $suma6=0;
     foreach($NotasIngles as $n)
     {
      $suma6=$suma6+(($n->ponderacion)*($n->nota));
     }
     $suma6=round($suma6/100);
     //------------------------------------------------------------------------------------------------------------------------
     $NotasArtistica=\DB::connection('historico')->table('grado_alumno')
                     ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                     ->join('nota','grado_alumno.nie','=','alumno_NIE')
                     ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                     ->where('grado_alumno.grado_id',"=",$grado_id)
                     ->where('grado_alumno.id_ano',$anoH->id)
                     ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                     ->where('grado_alumno.nie',$nie)
                     ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'EDA')
                     //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                     ->get();
          $suma9=0;
          foreach($NotasArtistica as $n)
          {
           $suma9=$suma9+(($n->ponderacion)*($n->nota));
          }
          $suma9=round($suma9/100);
     //========================================================================================================================
     //------------------------------------------------------------------------------------------------------------------------
     $NotasMoral=\DB::connection('historico')->table('grado_alumno')
                     ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                     ->join('nota','grado_alumno.nie','=','alumno_NIE')
                     ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                     ->where('grado_alumno.grado_id',"=",$grado_id)
                     ->where('grado_alumno.id_ano',$anoH->id)
                     ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                     ->where('grado_alumno.nie',$nie)
                     ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'MYC')
                     //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                     ->get();
          $suma8=0;
          foreach($NotasArtistica as $n)
          {
           $suma8=$suma8+(($n->ponderacion)*($n->nota));
          }
          $suma8=round($suma8/100);
     //========================================================================================================================
     //Aspectos de conducta para el trimestre 1...
     $tri=Periodo::where('AnoEscolar_idAnoEscolar',$ano->id)->where('numperiodo',$ph->numperiodo)->first();
     $aspectos= \DB::table('conducta')
                ->where('periodotrimestral_id',"=",$tri->id)
                ->where('NIE',$nie)
                ->orderBy('IDINDICADORC','asc')
                ->get();
     //------------------------------------------------------------------------------------------------------------------------
     $i=$i+1;
     }else
     {// notas del 2 periodo
       if($i==2)
       {
         //------------------------------------------------------------------------------------------------------------------------
         //Aspectos de conducta para el trimestre 1...
         $tri=Periodo::where('AnoEscolar_idAnoEscolar',$ano->id)->where('numperiodo',$ph->numperiodo)->first();
         $aspectos2= \DB::table('conducta')
                    ->where('periodotrimestral_id',"=",$tri->id)
                    ->where('NIE',$nie)
                    ->orderBy('IDINDICADORC', 'asc')
                    ->get();
         //------------------------------------------------------------------------------------------------------------------------

        $NotasComputacion2=\DB::connection('historico')->table('grado_alumno')
                               ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                               ->join('nota','grado_alumno.nie','=','alumno_NIE')
                               ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                               ->where('grado_alumno.grado_id',"=",$grado_id)
                               ->where('grado_alumno.id_ano',$anoH->id)
                               ->where('grado_alumno.nie',$nie)
                               ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                               ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'CC')
                               //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                               ->get();

            $suma12=0;
            foreach($NotasComputacion2 as $n)
            {
            $suma12=$suma12+(($n->ponderacion)*($n->nota));
            }
            $suma12=round($suma12/100);
  //=========================================================================================================================================
            //Notas de fisica
            $NotasFisica2=\DB::connection('historico')->table('grado_alumno')
                                  ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                                  ->join('nota','grado_alumno.nie','=','alumno_NIE')
                                  ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                                ->where('grado_alumno.grado_id',"=",$grado_id)
                                  ->where('grado_alumno.id_ano',$anoH->id)
                                  ->where('grado_alumno.nie',$nie)
                                  ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                                  ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'EFS')
                                  ->get();
               $suma72=0;
               foreach($NotasFisica2 as $n)
               {
               $suma72=$suma72+(($n->ponderacion)*($n->nota));
               }
               $suma72=round($suma72/100);
     //-----------------------------------------------------------------------------------------------------------------------------------------
     //Notad de ciencia
       $NotasCiencia2=\DB::connection('historico')->table('grado_alumno')
                         ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                         ->join('nota','grado_alumno.nie','=','alumno_NIE')
                         ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                         ->where('grado_alumno.grado_id',"=",$grado_id)
                         ->where('grado_alumno.id_ano',$anoH->id)
                         ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                         ->where('grado_alumno.nie',$nie)
                         ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'CIC')
                         //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                         ->get();
       $suma22=0;
       foreach($NotasCiencia2 as $n)
       {
       $suma22=$suma22+(($n->ponderacion)*($n->nota));
       }
       $suma22=round($suma22/100);
     //----------------------------------------------------------------------------------------------------------------------------------------
     $NotasMatematica2=\DB::connection('historico')->table('grado_alumno')
                     ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                     ->join('nota','grado_alumno.nie','=','alumno_NIE')
                     ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                     ->where('grado_alumno.grado_id',"=",$grado_id)
                     ->where('grado_alumno.id_ano',$anoH->id)
                     ->where('grado_alumno.nie',$nie)
                     ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'MAT')
                     ->where('nota.PeriodoTrimestral_idPeriodoTrimestral',"=",$ph->id)
                     //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                     ->get();
         $suma32=0;
         foreach($NotasMatematica2 as $n)
         {
          $suma32=$suma32+(($n->ponderacion)*($n->nota));
         }
         $suma32=round($suma32/100);
     //----------------------------------------------------------------------------------------------------------------------------------------
     $NotasLenguaje2=\DB::connection('historico')->table('grado_alumno')
                     ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                     ->join('nota','grado_alumno.nie','=','alumno_NIE')
                     ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                     ->where('grado_alumno.grado_id',"=",$grado_id)
                     ->where('grado_alumno.id_ano',$anoH->id)
                     ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                     ->where('grado_alumno.nie',$nie)
                     ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'LENG')
                     //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                     ->get();
       $suma42=0;
       foreach($NotasLenguaje2 as $n)
       {
        $suma42=$suma42+(($n->ponderacion)*($n->nota));
       }
       $suma42=round($suma42/100);

     //-----------------------------------------------------------------------------------------------------------------------------------------
     $NotasSociales2=\DB::connection('historico')->table('grado_alumno')
                     ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                     ->join('nota','grado_alumno.nie','=','alumno_NIE')
                     ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                     ->where('grado_alumno.grado_id',"=",$grado_id)
                     ->where('grado_alumno.id_ano',$anoH->id)
                     ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                     ->where('grado_alumno.nie',$nie)
                     ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'SOC')
                     //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                     ->get();

         $suma52=0;
         foreach($NotasSociales2 as $n)
         {
          $suma52=$suma52+(($n->ponderacion)*($n->nota));
         }
         $suma52=round($suma52/100);

     //----------------------------------------------------------------------------------------------------------------------------------------=
     $NotasIngles2=\DB::connection('historico')->table('grado_alumno')
                     ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                     ->join('nota','grado_alumno.nie','=','alumno_NIE')
                     ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                     ->where('grado_alumno.grado_id',"=",$grado_id)
                     ->where('grado_alumno.id_ano',$anoH->id)
                     ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                     ->where('grado_alumno.nie',$nie)
                     ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'INN')
                     //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                     ->get();
          $suma62=0;
          foreach($NotasIngles2 as $n)
          {
           $suma62=$suma62+(($n->ponderacion)*($n->nota));
          }
          $suma62=round($suma62/100);
          //------------------------------------------------------------------------------------------------------------------------
          $NotasArtistica2=\DB::connection('historico')->table('grado_alumno')
                          ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                          ->join('nota','grado_alumno.nie','=','alumno_NIE')
                          ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                          ->where('grado_alumno.grado_id',"=",$grado_id)
                          ->where('grado_alumno.id_ano',$anoH->id)
                          ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                          ->where('grado_alumno.nie',$nie)
                          ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'EDA')
                          //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                          ->get();
               $suma92=0;
               foreach($NotasArtistica2 as $n)
               {
                $suma92=$suma92+(($n->ponderacion)*($n->nota));
               }
               $suma92=round($suma92/100);
          //========================================================================================================================
          //------------------------------------------------------------------------------------------------------------------------
          $NotasMoral2=\DB::connection('historico')->table('grado_alumno')
                          ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                          ->join('nota','grado_alumno.nie','=','alumno_NIE')
                          ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                          ->where('grado_alumno.grado_id',"=",$grado_id)
                          ->where('grado_alumno.id_ano',$anoH->id)
                          ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                          ->where('grado_alumno.nie',$nie)
                          ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'MYC')
                          //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                          ->get();
               $suma82=0;
               foreach($NotasMoral2 as $n)
               {
                $suma82=$suma82+(($n->ponderacion)*($n->nota));
               }
               $suma82=round($suma82/100);
          //========================================================================================================================

          $i=$i+1;
       }
         else{
           if($i==3)
           {
             //------------------------------------------------------------------------------------------------------------------------
             //Aspectos de conducta para el trimestre 1...
             $tri=Periodo::where('AnoEscolar_idAnoEscolar',$ano->id)->where('numperiodo',$ph->numperiodo)->first();
             $aspectos3= \DB::table('conducta')
                        ->where('periodotrimestral_id',"=",$tri->id)
                        ->where('NIE',$nie)
                        ->orderBy('IDINDICADORC', 'asc')
                        ->get();
             //------------------------------------------------------------------------------------------------------------------------


               $NotasComputacion3=\DB::connection('historico')->table('grado_alumno')
                                     ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                                     ->join('nota','grado_alumno.nie','=','alumno_NIE')
                                     ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                                     ->where('grado_alumno.grado_id',"=",$grado_id)
                                     ->where('grado_alumno.id_ano',$anoH->id)
                                     ->where('grado_alumno.nie',$nie)
                                     ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                                     ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'CC')
                                     //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                                     ->get();
                  $suma13=0;
                  foreach($NotasComputacion3 as $n)
                  {
                  $suma13=$suma13+(($n->ponderacion)*($n->nota));
                  }
                  $suma13=round($suma13/100);
//=========================================================================================================================================
  //Notas de fisica
                $NotasFisica3=\DB::connection('historico')->table('grado_alumno')
                                        ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                                        ->join('nota','grado_alumno.nie','=','alumno_NIE')
                                        ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                                      ->where('grado_alumno.grado_id',"=",$grado_id)
                                        ->where('grado_alumno.id_ano',$anoH->id)
                                        ->where('grado_alumno.nie',$nie)
                                        ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                                        ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'EFS')
                                        ->get();
                     $suma73=0;
                     foreach($NotasFisica3 as $n)
                     {
                     $suma73=$suma73+(($n->ponderacion)*($n->nota));
                     }
                     $suma73=round($suma73/100);
           //-----------------------------------------------------------------------------------------------------------------------------------------
           //Notad de ciencia
             $NotasCiencia3=\DB::connection('historico')->table('grado_alumno')
                               ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                               ->join('nota','grado_alumno.nie','=','alumno_NIE')
                               ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                               ->where('grado_alumno.grado_id',"=",$grado_id)
                               ->where('grado_alumno.id_ano',$anoH->id)
                               ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                               ->where('grado_alumno.nie',$nie)
                               ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'CIC')
                               //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                               ->get();
             $suma23=0;
             foreach($NotasCiencia3 as $n)
             {
             $suma23=$suma23+(($n->ponderacion)*($n->nota));
             }
             $suma23=round($suma23/100);
           //----------------------------------------------------------------------------------------------------------------------------------------
           $NotasMatematica3=\DB::connection('historico')->table('grado_alumno')
                           ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                           ->join('nota','grado_alumno.nie','=','alumno_NIE')
                           ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                           ->where('grado_alumno.grado_id',"=",$grado_id)
                           ->where('grado_alumno.id_ano',$anoH->id)
                           ->where('grado_alumno.nie',$nie)
                           ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'MAT')
                           ->where('nota.PeriodoTrimestral_idPeriodoTrimestral',"=",$ph->id)
                           //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                           ->get();
               $suma33=0;
               foreach($NotasMatematica3 as $n)
               {
                $suma33=$suma33+(($n->ponderacion)*($n->nota));
               }
               $suma33=round($suma33/100);

           //----------------------------------------------------------------------------------------------------------------------------------------
           $NotasLenguaje3=\DB::connection('historico')->table('grado_alumno')
                           ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                           ->join('nota','grado_alumno.nie','=','alumno_NIE')
                           ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                           ->where('grado_alumno.grado_id',"=",$grado_id)
                           ->where('grado_alumno.id_ano',$anoH->id)
                           ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                           ->where('grado_alumno.nie',$nie)
                           ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'LENG')
                           //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                           ->get();
             $suma43=0;
             foreach($NotasLenguaje3 as $n)
             {
              $suma43=$suma43+(($n->ponderacion)*($n->nota));
             }
             $suma43=round($suma43/100);
           //-----------------------------------------------------------------------------------------------------------------------------------------
           $NotasSociales3=\DB::connection('historico')->table('grado_alumno')
                           ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                           ->join('nota','grado_alumno.nie','=','alumno_NIE')
                           ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                           ->where('grado_alumno.grado_id',"=",$grado_id)
                           ->where('grado_alumno.id_ano',$anoH->id)
                           ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                           ->where('grado_alumno.nie',$nie)
                           ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'SOC')
                           //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                           ->get();
               $suma53=0;
               foreach($NotasSociales3 as $n)
               {
                $suma53=$suma53+(($n->ponderacion)*($n->nota));
               }
               $suma53=round($suma53/100);
           //----------------------------------------------------------------------------------------------------------------------------------------=
           $NotasIngles3=\DB::connection('historico')->table('grado_alumno')
                           ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                           ->join('nota','grado_alumno.nie','=','alumno_NIE')
                           ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                           ->where('grado_alumno.grado_id',"=",$grado_id)
                           ->where('grado_alumno.id_ano',$anoH->id)
                           ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                           ->where('grado_alumno.nie',$nie)
                           ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'INN')
                           //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                           ->get();
                $suma63=0;
                foreach($NotasIngles3 as $n)
                {
                 $suma63=$suma63+(($n->ponderacion)*($n->nota));
                }
                $suma63=round($suma63/100);
                //------------------------------------------------------------------------------------------------------------------------
                $NotasArtistica3=\DB::connection('historico')->table('grado_alumno')
                                ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                                ->join('nota','grado_alumno.nie','=','alumno_NIE')
                                ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                                ->where('grado_alumno.grado_id',"=",$grado_id)
                                ->where('grado_alumno.id_ano',$anoH->id)
                                ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                                ->where('grado_alumno.nie',$nie)
                                ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'EDA')
                                //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                                ->get();
                     $suma93=0;
                     foreach($NotasArtistica3 as $n)
                     {
                      $suma93=$suma93+(($n->ponderacion)*($n->nota));
                     }
                     $suma93=round($suma93/100);
                //========================================================================================================================
                //------------------------------------------------------------------------------------------------------------------------
                $NotasMoral3=\DB::connection('historico')->table('grado_alumno')
                                ->join('alumno','grado_alumno.nie','=','alumno.NIE')
                                ->join('nota','grado_alumno.nie','=','alumno_NIE')
                                ->join('actividades','nota.Actividades_idActividades','=','actividades.id')
                                ->where('grado_alumno.grado_id',"=",$grado_id)
                                ->where('grado_alumno.id_ano',$anoH->id)
                                ->where('PeriodoTrimestral_idPeriodoTrimestral',$ph->id)
                                ->where('grado_alumno.nie',$nie)
                                ->where('actividades.ASIGNATURA_idASIGNATURA',"=",'MYC')
                                //->select('grado_alumno.nie','nota.nota','grado_alumno.grado_id')
                                ->get();
                     $suma83=0;
                     foreach($NotasMoral3 as $n)
                     {
                      $suma83=$suma83+(($n->ponderacion)*($n->nota));
                     }
                     $suma83=round($suma83/100);
                //========================================================================================================================

                $i=$i+1;

           }
             else{}}
     }
     //Recopila las de
     }
//----------------------------------------------------------------------------------------------------------------------------------------=

      $alumno=Alumno::where('NIE',$nie)->first();
      $director=Docente::where('tipousuario_id',1)->first();
      $docente=\DB::table('grado')
                 ->join('docente','grado.orientador','=','docente.NIP')
                 ->where('id',"=",$grado_id)
                 ->get();
      //return $NotasComputacion;
      //Funciona todo para generar ahorita probare la consulta
      $pdf = \App::make('dompdf.wrapper');
      $date = date('Y-m-d');
      $num=count($periodoH);
      $view = \View::make('boleta.boletapdf',compact ('grado','num','alumno','anoH','NotasComputacion','NotasComputacion2','NotasComputacion3','suma1','suma12','suma13','NotasCiencia','NotasCiencia2','NotasCiencia3','suma2','suma22','suma23','NotasMatematica','NotasMatematica2','NotasMatematica3','suma3','suma32','suma33','NotasLenguaje','NotasLenguaje2','NotasLenguaje3','suma4','suma42','suma43','NotasSociales','NotasSociales2','NotasSociales3','suma5','suma52','suma53',
      'NotasIngles','NotasIngles2','NotasIngles3','suma6','suma62','suma63','NotasFisica','NotasFisica2','NotasFisica3','suma7','suma72','suma73','asistencias','inasistencias',
      'aspectos','aspectos2','aspectos3','director','docente','NotasMoral','NotasMoral2','NotasMoral3','suma9','suma92','suma93','NotasArtistica',
      'NotasArtistica2','NotasArtistica3','suma8','suma82','suma83'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->setOrientation('landscape');
      return $pdf->stream();

    }
    public function generarPorGrado($id_grado)
    {
      $alumnos=\DB::table('alumno')->where('grado_id',"=",$id_grado)->orderBy('apellidos','asc')->get();
      $grado=Grado::where('id',$id_grado)->first();
      $pdf = \App::make('dompdf.wrapper');
      $date = date('Y-m-d');
      $view = \View::make('boleta.listapdf',compact ('alumnos','grado'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      //$pdf->setOrientation('landscape');
      return $pdf->stream();
    }



    public function generarCuadroFinal($id_grado)
    {
      $alumnos=\DB::table('alumno')->where('grado_id',"=",$id_grado)->orderBy('apellidos','asc')->get();

      $datos= \DB::table('grado')
      ->join('tipociclo','grado.tipo_id', '=','tipociclo.id')
      ->join('turno','grado.turno_id', '=','turno.id')
      ->select('tipoD','grado','turno','tipociclo.id')
      ->where('grado.id',$id_grado)
      ->first();


      if($datos->id==4)
        $tipo="Parvularia";
      else
        $tipo="Básica";

    //  $grado=Grado::where('id',$id_grado)->first();
      $date = date('Y-m-d');
      $view = \View::make('boleta.cuadrofinalpdf',compact ('alumnos','datos','tipo'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->setOrientation('landscape');
      $pdf->loadHTML($view);
      //$pdf->setOrientation('landscape');
      return $pdf->stream();
    }
  }

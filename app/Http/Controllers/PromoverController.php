<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\configuracion;
use Auth;
use App\Grado;
use App\Escolar;
use App\Alumno;
use App\estadistica;
use App\EscolarH;
class PromoverController extends Controller
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

      $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->whereNotIn('grado.tipo_id',[4])
            ->select('grado.id', 'grado.grado')
            ->get();


       return view('Promover/promover', compact('nombre','tipo','asig','grados'));

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
        $grado=$request->grado;
        $alumnos=\DB::table('alumno')->where('grado_id', $grado)->get();
        $g=Grado::where('id',$grado)->first();
        $asignaturas=\DB::table('asignaturaciclo')->where('tipociclo_id', $g->tipo_id)->get();
        $ano=Escolar::orderBy('id','asc')->first();
        $anoPrueba=Escolar::where('estado',1)->first();
        if($anoPrueba="")
        {
        $alumnosReprobados=0;$alumnosAprobados=0;
        foreach($alumnos as $alumno)
        {
          $reprobadas=0;$aprobadas=0;
          foreach ($asignaturas as $as){
          $notas=\DB::connection('historico')
                      ->table('notasfinales')
                      ->join('periodotrimestral','notasfinales.trimestre','=','periodotrimestral.id')
                      ->join('anoescolar','periodotrimestral.AnoEscolar_idAnoEscolar','=','anoescolar.id')
                      ->where('anoescolar.anoEscolar',"=",$ano->anoEscolar)
                      ->where('NIE',"=",$alumno->NIE)
                      ->where('grado_id',"=",$grado)
                      ->where('asignatura',"=",$as->asignatura_id)
                      ->get();
            $suma=0;
            foreach ($notas as $n){
              $suma=$suma+$n->nota;
            }
            $suma=$suma/3;
            if($suma>=5)
            {
              $aprobadas=$aprobadas+1;
            }else{
              $reprobadas=$reprobadas+1;
            }
          }
          $num=count($asignaturas);
          if($num=$aprobadas)
          {
            $alumnosAprobados=$alumnosAprobados+1;
            $actualizar=Alumno::where('NIE',$alumno->NIE)->update(array('grado_id' => ($alumno->grado_id+1)));
          }
          else
          {
            $alumnosReprobados=$alumnosReprobados+1;

          }
        }
        //crear estadisticas; 'id','ano','aprobados','grado_id','reprobados'
          $anoh=EscolarH::where('anoEscolar',$ano->anoEscolar)->first();
          $estadisticas= new estadistica;
          $estadisticas->ano=$anoh->id;
          $estadisticas->aprobados=$alumnosAprobados;
          $estadisticas->reprobados=$alumnosReprobados;
          $estadisticas->grado_id=$grado;
          $estadisticas->save();
          return redirect('/promover')->with('message','Alumnos promovidos');;
        }else
        {
          return redirect('/promover')->with('message-error','El año debe estar cerrado');;
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

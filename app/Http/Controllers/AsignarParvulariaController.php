<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AsignaturaCiclo;
use App\Materia;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\configuracion;
use App\Docente;
use App\DocenteGrado;
use App\Grado;
class AsignarParvulariaController extends Controller
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

      //GRADO DEL MISMO TURNO
      // cuenta si el docente ya es orientador de un grado en un turno especifico, para validar que un docente no pueda
      // dar clases en 2 grados del mismo turno
      $turno = Grado::where('grado',$request->grado)->get();
      $t=$turno->last();
      $cuentaturnos = Grado::where('orientador','=',$request->docente)
                        ->where('turno_id','=',$t->turno_id)
                        ->count();
      /*Valida que el docente no haya sobrepasado el limite de asignaciones de orientador que son 2 maximo*/
      $cuenta = Grado::where('orientador','=',$request->docente)->count();

      /* Vañoda que un docente ya es orientador de el grado seleccionado*/
      $cuentaGrados = Grado::where('orientador','=',$request->docente)
      ->where('grado','=',$request->grado)
      ->count();

      $gradoocupado = Grado::where('grado','=',$request->grado)->first();
    if($gradoocupado->orientador!=null){
    	return redirect('/asignatura')->with('message-error','Este Grado ya tiene Asignado un orientador!');
    }
else{
      if($cuenta>=2){
        return redirect('/asignatura')->with('message-error','Este docente ya tiene el maximo de grados asignados!');
      }
        else{
        if($cuentaGrados!=0){
          return redirect('/asignatura')->with('message-error','Este grado ya le ha sido asignado al docente anteriormente');
        }
        else{
          if($cuentaturnos>=1){
              return redirect('/asignatura')->with('message-error','El docente no puede impartir clases en dos grado en el mismo turno');
          }

          else{

            $idu = \DB::table('grado')
                  ->where('grado', $request->grado)
                  ->get();
            //  dd($idu);
             $grados= Grado::where('grado',$request->grado)->get();
             $u=$grados->last();

              \DB::table('grado')
                  ->where('grado', $request->grado)
                  ->update(['orientador' => $request->docente]);
              DocenteGrado::insertaDC($u->id,$request->docente);
          //    PARA ASIGNAR COMPUTACION O INGLES A PARVULARIA PERO COMO NO SE LES IMPARTIRA , SI NO SE VA CAMBIAR DE PARECER DESCOMENTAR E IMPLEMENTAR
        /*      $m= $request->materia;
               $d=$request->docente2;
              for($i=0;$i<count($request->materia);$i++){
                  \DB::table('asignatura_has_docente')->insert(
                      ['docente_NIP' => $d[$i],
                      'ASIGNATURA_idASIGNATURA'=>$m[$i],
                      'grado_id'=>$u->id
                     ]
                  );
          }*/
              $grados1=configuracion::primerCiclo();
              $grados2=configuracion::segundoCiclo();
              $grados3=configuracion::tercerCiclo();
              $grados4=configuracion::parvularia();
              $nombre=configuracion::nombreUsuario(Auth::user()->id);
              $tipo=configuracion::tipo();
              //return view('docentes.asignaturas',compact('nombre','grados1','grados2','grados3','tipo','grados4'));
              return redirect('/asignatura')->with('message','Orientador y Asignatura asignada correctamente!');


          }

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
        $docenteB=$id;
        $grados= Grado::where('grado',$id)->get();
        $tipociclo=$grados->last();
        $tp=$tipociclo->tipo_id;

        $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre;
        $tipo=configuracion::tipo();

        $docentesO=Docente::join('usuario', 'docente.user_id', '=', 'usuario.id')
                       ->where('idtu',[3])
                       ->get();

    /*  $d=Docente::join('usuario', 'docente.user_id', '=', 'usuario.id')
                											 ->whereIn('idtu',[3,5,6])
                											 ->get();


*/
        $mat=AsignaturaCiclo::where('tipociclo_id',$tp)->get();
      $materias=array();
        foreach($mat as $m){
            $ma=Materia::where('id',$m->asignatura_id);
            $u=$ma->first();
            $materias[]=$u->materia;

        }
             // $materias=$m->lists('materia','id');
        return view('docentes.parvularia', compact('nombre','docenteB','tipo','docentesO','materias','mat'));
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

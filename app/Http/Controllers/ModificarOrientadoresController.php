<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\configuracion;
use App\DocenteGrado;
use App\Docente;
use App\Grado;
class ModificarOrientadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nombre=configuracion::nombreUsuario(Auth::user()->id);
      $tipo=configuracion::tipo();
      $docentegrado=DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
      ->join('docente','docente.NIP', '=', 'docentegrado.NIP')
      ->select('docentegrado.id','grado','nombre','apellido')
                     ->get();
      return view('docentes.modificarAsignatura.lista',compact('nombre','tipo','docentegrado'));

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
          dd($request);
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
      $docenteygrado=$id;
      $nombre=configuracion::nombreUsuario(Auth::user()->id);
      $tipo=configuracion::tipo();



      $docentegrado=DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
      ->join('docente','docente.NIP', '=', 'docentegrado.NIP')
      ->select('grado','nombre','apellido')
      ->where('docentegrado.id','=',$id)
                     ->first();


      $gradosAsignados=DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
                     ->get();

      $tipoCiclo=DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
      ->select('tipo_id')
      ->where('docentegrado.id',$docenteygrado)
      ->first();

      if($tipoCiclo->tipo_id==4){

        $docentesO=Docente::join('usuario', 'docente.user_id', '=', 'usuario.id')
                       ->whereIn('idtu',[3])
                       ->get();


      }else{

      $docentesO=Docente::join('usuario', 'docente.user_id', '=', 'usuario.id')
                     ->whereIn('idtu',[2])
                     ->get();
      }


      return view('docentes.modificarAsignatura.modificarOrientadores',compact('nombre','tipo','grados','docentesO','gradosAsignados','docenteygrado','docentegrado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      // VALIDACIONES
      //GRADO DEL MISMO TURNO

  /*    $turno =DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->select('turno_id')
            ->where('docentegrado.id', $request->id)
            ->first();
            // cuenta si el docente ya es orientador de un grado en un turno especifico, para validar que un docente no pueda
            // dar clases en 2 grados del mismo turno


      $cuentaturnos = Grado::where('orientador','=',$request->NIP)
                        ->where('turno_id','=',$turno->turno_id)
                        ->count();


      /*Valida que el docente no haya sobrepasado el limite de asignaciones de orientador que son 2 maximo

    dd($cuenta);*/

      /* Vañoda que un docente ya es orientador de el grado seleccionado*/
      $cuentaGrados = Grado::where('orientador','=',$request->NIP)
      ->where('grado','=',$request->grado_id)
      ->count();

      if($cuentaGrados!=0){
        return redirect('/modificarOrientador')->with('message-error','Este grado ya le ha sido asignado al docente anteriormente');
      }else{


      $docente=DocenteGrado::findOrFail($request->id);
      $nombre=configuracion::nombreUsuario(Auth::user()->id);
      $docente->NIP=$request->NIP;
      $docente->save();


      \DB::table('grado')
          ->where('grado', $request->grado_id)
          ->update(['orientador' => $request->NIP]);

      $tipo=configuracion::tipo();
    return redirect('/modificarOrientador')->with('message','Orientador fue Actualizado Exitosamente!');
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $docente=DocenteGrado::find($request->id);

        \DB::table('grado')
                ->where('grado.id', $docente->grado_id)
                ->update(['orientador' => NULL]);

        \DB::table('asignatura_has_docente')
                  ->where('grado_id', $docente->grado_id)
                  ->delete();


        $docente->delete();

            return redirect('/modificarOrientador')->with('message','La asignacion fue eliminada Correctamente!');
    }
}

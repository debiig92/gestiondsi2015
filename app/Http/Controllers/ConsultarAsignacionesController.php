<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\configuracion;
use App\DocenteGrado;
use App\Grado;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConsultarAsignacionesController extends Controller
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
              $grado= DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
                                 ->get();

              $asignaturaD=\DB::table('asignatura_has_docente')
              ->join('asignatura', 'asignatura_has_docente.ASIGNATURA_idASIGNATURA', '=', 'asignatura.id')
              ->join('docente','docente.NIP', '=', 'asignatura_has_docente.docente_NIP')
              ->join('grado', 'asignatura_has_docente.grado_id', '=', 'grado.id')
              ->select('materia','nombre','apellido','orientador')
              ->where('asignatura_has_docente.grado_id',0)
              ->get();
              $orientador= \DB::table('grado')
              ->join('docente','grado.orientador', '=','docente.NIP')
              ->select('nombre','apellido')
              ->first();
              return view('docentes.consultarAsignaciones.consultarAsignaciones',compact('nombre','tipo','grado','asignaturaD','docentegrado','orientador'));
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


      $grado= DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
                         ->get();
      $nombre=configuracion::nombreUsuario(Auth::user()->id);
      $tipo=configuracion::tipo();

      $docentegrado=DocenteGrado::join('grado', 'docentegrado.grado_id', '=', 'grado.id')
      ->join('docente','docente.NIP', '=', 'docentegrado.NIP')
      ->select('grado','nombre','apellido')
      ->where('docentegrado.grado_id',$request->grado)
                     ->first();

      $asignaturaD=\DB::table('asignatura_has_docente')
      ->join('asignatura', 'asignatura_has_docente.ASIGNATURA_idASIGNATURA', '=', 'asignatura.id')
      ->join('docente','docente.NIP', '=', 'asignatura_has_docente.docente_NIP')
      ->join('grado', 'asignatura_has_docente.grado_id', '=', 'grado.id')
      ->select('materia','nombre','apellido','orientador')
      ->where('asignatura_has_docente.grado_id','=',$request->grado)
      ->get();

      $orientador= \DB::table('grado')
      ->join('docente','grado.orientador', '=','docente.NIP')
      ->select('nombre','apellido')
      ->where('grado.id','=',$request->grado)
      ->first();


      return view('docentes.consultarAsignaciones.consultarAsignaciones',compact('nombre','tipo','grado','asignaturaD','docentegrado','orientador'));

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

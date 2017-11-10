<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\configuracion;
use App\User;
use App\Alumno;
use App\Conducta;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EliminarConductaController extends Controller
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
  		$grado=configuracion::gradosPorDocente(Auth::user()->id);

  	if($tipo==1){
  	$alumnos= \DB::table('conducta')
        ->join('alumno','conducta.NIE','=','alumno.NIE')
        ->select('conducta.NIE','nombre','apellidos','periodotrimestral_id')
         ->where('estado', 1)
         ->distinct()
         ->orderBy('apellidos','ASC')
          ->paginate(10);
  	}
  	else{
  			$alumnos=\DB::table('conducta')
              ->join('alumno','conducta.NIE','=','alumno.NIE')
              ->select('conducta.NIE','nombre','apellidos','periodotrimestral_id')
               ->where('estado', 3)
                  ->distinct()
               ->orderBy('apellidos','ASC')
                ->paginate(10);
  	}

  		return view('RegistroNotas.conducta.eliminarConducta',compact('tipo','nombre','grado','alumnos'));
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
      $grado=configuracion::gradosPorDocente(Auth::user()->id);
      $id=Auth::user()->id;
      $docente=User::find($id)->docente;
      $nombre=$docente->nombre;
      $tipo=configuracion::tipo();
  //dd($request->get('nombreA'));
      $alumnos=Conducta::join('alumno','conducta.NIE','=','alumno.NIE')
      ->select('conducta.NIE','nombre','apellidos','periodotrimestral_id')
       ->where('estado', 1)
       ->where('alumno.grado_id',$request->grado)
       ->where(\DB::raw("CONCAT(nombre,' ',apellidos)"),"LIKE","%$request->nombreA%")
       ->distinct()
       ->orderBy('apellidos','ASC')
        ->paginate(10);

      return view('RegistroNotas.conducta.eliminarConducta',compact('tipo','nombre','grado','alumnos'));
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
    public function destroy(Request $request)
    {
      
        \DB::table('conducta')
                  ->where('NIE',$request->id)
                  ->where('periodotrimestral_id',$request->periodoid)
                  ->delete();

return redirect('/eliminarConducta')->with('message','La Conducta fue eliminada Correctamente!');

    }
}

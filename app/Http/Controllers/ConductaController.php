<?php namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\configuracion;
use App\User;
use Illuminate\Http\Request;

class ConductaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id=Auth::user()->id;
		$docente=User::find($id)->docente;
		$nombre=$docente->nombre;
		$tipo=configuracion::tipo();
		$grado=configuracion::gradosPorDocente(Auth::user()->id);
		//  $alumno=Alumno::name($request->get('nombreA'))->orderBy('apellidos','ASC')->paginate();
	//  $alumno=Alumno::orderBy('apellidos','ASC')->get();
	if($tipo==1){
	$alumnos=configuracion::alumnosActivos();
	}
	else{
			$alumnos=configuracion::alumnosActivos2();
	}
	//  $encargado=Alumno::find($alumno->encargado_id)->encargado;
		//$nombreE=$encargado->nombre;
		return view('RegistroNotas.conducta',compact('tipo','nombre','grado','alumnos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $grado=configuracion::grados();
        $tipo=configuracion::tipo();
        return view('RegistroNotas.registroConducta',compact('tipo','nombre','grado'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$grado=configuracion::gradosPorDocente(Auth::user()->id);
		$id=Auth::user()->id;
		$docente=User::find($id)->docente;
		$nombre=$docente->nombre;
		$tipo=configuracion::tipo();
//dd($request->get('nombreA'));
		$alumnos=Alumno::filtrosPromocion($request->get('nombreA'),$request->get('grado'));
	//  $encargado=Alumno::find($alumno->encargado_id)->encargado;
	//  $nombreE=$encargado->nombre;

		return view('RegistroNotas.conducta',compact('tipo','nombre','grado','alumnos'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
      
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

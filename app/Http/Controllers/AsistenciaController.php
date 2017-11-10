<?php namespace App\Http\Controllers;

use App\Alumno;
use App\Encargado;
use App\Grado;
use App\Http\Requests;
use App\Http\Requests\AlumnosRequest;
use App\Http\Controllers\Controller;
use App\Turno;
use App\User;
use Auth;
use App\configuracion;
use Illuminate\Http\Request;

class AsistenciaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
      // captura y enviar valores registrados de asistencia semanal.
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
        return view('asistencia.index',compact('nombre','tipo','area'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AlumnosRequest $request)
	{




        return  0;

	}


    public function consultarAlumno(Request $request){

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{



	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
      //  $alumno=Alumno::findOrFail($id);
		//return $id->nombre;
	}


    /**
     * Registrar indicadores para Alumnos de Parvularia
     */

     /* public function
     */

	/* Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

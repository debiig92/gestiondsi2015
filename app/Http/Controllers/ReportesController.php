<?php namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Template;
use App\PDF;
use App\configuracion;
use Illuminate\Http\Request;

class ReportesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $grado=configuracion::grados();
        $tipo=configuracion::tipo();
	    	return view('reportes.boletaTrimestral',compact('tipo','nombre','grado'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $data= array(
            'name'=> 'Debora Guardado Reinoza',
            'course' => 'Curso basico de laravel'

        );
        $html = Template::render('.reportes',$data);

        Pdf::render('prueba',$html);
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

<?php namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Grado;
use Auth;
use App\configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PromocionController extends Controller {

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
    //  $alumno=Alumno::name($request->get('nombreA'))->orderBy('apellidos','ASC')->paginate();
    //   $alumno=Alumno::orderBy('apellidos','ASC')->paginate();
		if($tipo==1){
		$alumno=configuracion::alumnosNoActivos();
	  }
	  else{
	 		 $alumno=configuracion::alumnosActivos2();
	  }


        $grado=configuracion::gradosPorDocente(Auth::user()->id);
		return view('alumnos.promocion',compact('grado','nombre','alumno','tipo'));
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
        $grado=configuracion::gradosPorDocente(Auth::user()->id);

        $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre;
        $tipo=configuracion::tipo();
//dd($request->get('nombreA'));
       $alumno=Alumno::filtrosPromocion2($request->get('nombreA'),$request->get('grado'));

       return view('alumnos.promocion',compact('nombre','grado','alumno','tipo'));
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
	public function update(Request $request)
	{
        foreach($request->prov as $provs){

            \DB::table('alumno')
                ->where('NIE', $provs)
                ->update(['estado' => 1]);
        }
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
        $tipo=configuracion::tipo();
        //$alumno=configuracion::alumnos();
        $alumno=configuracion::alumnosNoActivos();

        return view('alumnos.promocion',compact('nombre','grado','alumno','tipo'));
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

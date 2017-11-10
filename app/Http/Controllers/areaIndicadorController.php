<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\AreaIndicador;
use App\configuracion;
use Illuminate\Http\Request;

class areaIndicadorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
      $areas=AreaIndicador::all();
        $tipo=configuracion::tipo();
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        return view('indicadores.areaIndicador.consultarArea',compact('nombre','tipo','areas'));

       // return 'Hola';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
        return view('indicadores.areaIndicador.crearArea',compact('nombre','tipo'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        AreaIndicador::create($request->all());
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
      //  return view('indicadores.areaIndicador.crearArea',compact('nombre','tipo'));
			return  redirect('/areaIndicador/create')->with('message','El Area Indicador fue creada Exitosamente!');
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
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
        $area=AreaIndicador::findOrFail($id);
        return view('indicadores.areaIndicador.actualizarEliminar',compact('nombre','tipo','area'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
        $a=AreaIndicador::find($id);
        $a->fill($request->all());
        $a->save();
        $tipo=configuracion::tipo();
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $area=AreaIndicador::findOrFail($id);
      //  return view('indicadores.areaIndicador.actualizarEliminar',compact('nombre','tipo','area'));
	return  redirect('/areaIndicador')->with('message','El Area Indicador fue Actualizada Exitosamente!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		AreaIndicador::destroy($id);
        $areas=AreaIndicador::all();
        $tipo=configuracion::tipo();
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
      //  return view('indicadores.areaIndicador.consultarArea',compact('nombre','tipo','areas'));
				return  redirect('/areaIndicador')->with('message','El Area Indicador fue Eliminada Exitosamente!');
	}

}

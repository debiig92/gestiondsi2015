<?php namespace App\Http\Controllers;

use App\AreaIndicador;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\configuracion;
use App\RespuestaIndicador;
use App\Grado;

use App\Indicadores;
use Illuminate\Http\Request;

class IndicadorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
        $a=AreaIndicador::all();
        $indicadores=Indicadores::where('grado_id', 1)
        ->where('IDAREAIN','0')
            ->get();

				
        return view('indicadores.consultar',compact('nombre','tipo','a','indicadores'));
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
        $area=AreaIndicador::all();
 //       $area=$a->lists('areaindicador');
        return view('indicadores.crear',compact('nombre','tipo','area'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
				if($tipo==1){
					$grado=Grado::where('tipo_id', 4) ->get();
				}else{
			$grado=configuracion::gradosPorDocente(Auth::user()->id);
		}
        $a=AreaIndicador::all();
        if($request->get('indicador')!=""){
            $indicadores=Indicadores::filtrosAreaIndicador($request->get('indicador'),$request->get('gradoP'),$request->get('area'));
        }else{
            $indicadores=Indicadores::filtrosAreaGrado($request->get('gradoP'),$request->get('area'));

        }
        return view('indicadores.consultar',compact('nombre','tipo','a','indicadores','grado'));
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
        //dd($id);
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
        $area=AreaIndicador::all();
       // $area=$a->lists('areaindicador');
        $indicadores=Indicadores::findOrFail($id);
				$grado=configuracion::gradosPorDocente(Auth::user()->id);
       // dd($indicadores);
        return view('indicadores.editar',compact('nombre','tipo','area','indicadores','grado'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
        $a=Indicadores::find($id);
        $a->fill($request->all());
        $a->save();
        $tipo=configuracion::tipo();
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $a=AreaIndicador::all();
        $indicadores=Indicadores::filtrosAreaIndicador($request->get('INDICADOR'),$request->get('area'),$request->get('gradoP'));
        //return view('indicadores.consultar',compact('nombre','tipo','a','indicadores'));
				return  redirect('/indicador')->with('message','El Indicador fue Actualizado Exitosamente!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,Request $request)
	{

		Indicadores::destroy($id);
        RespuestaIndicador::destroy($id);
        $tipo=configuracion::tipo();
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $a=AreaIndicador::all();
        $indicadores=Indicadores::filtrosAreaIndicador($request->get('INDICADOR'),$request->get('area'),$request->get('gradoP'));
      //  return view('indicadores.consultar',compact('nombre','tipo','a','indicadores'));
				return  redirect('/indicador')->with('message','El Indicador fue Eliminado Exitosamente!');

	}

}

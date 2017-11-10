<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\configuracion;
use App\Grado;
use App\Alumno;
use App\AreaIndicador;
use App\Indicadores;

class CrearIndicadorController extends Controller
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
    {//dd($request);
        $indicador=Indicadores::where('IDAREAIN',$request->areaindicador)
            ->where('grado_id',$request->gradoP)
            ->get();
        $ultimo=$indicador->last();
        //dd($indicador);
        \DB::table('indicador')->insert(
            [   'IDAREAIN' => $request->areaindicador,
                'INDICADOR'=>$request->INDICADOR,
                'grado_id'=>$request->gradoP,
                'NUMEROINDICADOR'=>$ultimo->NUMEROINDICADOR+1
            ]
        );
        //Si se crea un nuevo controlador se instancia a un avance T
        $alumno=Alumno::whereIn('grado_id',array(1,2,3,13,14,15))->get();
        $indicador2=Indicadores::all();
        $ulti=$indicador2->last();
        $avance="T";
        $total_indicador=count($alumno);
        for ($x=0; $x<=$total_indicador-1; $x++){
            \DB::table('respuestaindicador')->insert(
                [   'NIE' => $alumno[$x]->NIE,
                    'IDINDICADOR'=>$ulti->id,
                    'area_ind'=>$request->areaindicador,
                    'avance'=>$avance
                ]
            );
        }


        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $tipo=configuracion::tipo();
        $area=AreaIndicador::all();
          	$grado=configuracion::gradosPorDocente(Auth::user()->id);
      //  $area=$a->lists('areaindicador');

      //  return view('indicadores.crear',compact('nombre','tipo','area'));
      return  redirect('/indicador/create')->with('message','El Indicador fue creado Exitosamente!');
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

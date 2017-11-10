<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\configuracion;
use App\IndicadoresConducta;
use App\Alumno;
use App\Conducta;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistrarCoductaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

//verifica que ya exista un trimestre activo para poder asignar notas de conducta
      $trimestreActivo=\DB::table('periodotrimestral')
            ->where('estado',1)
            ->get();

  if(!empty($trimestreActivo)){

        foreach($trimestreActivo as $trim){
          $trimestre=$trim->id;

        }
        // verifica que si ya se le ha asignado la conducta a ese alumno en ese trimestre
      $estado=Conducta::where('NIE',$request->NIE)
      ->where('periodotrimestral_id',$trimestre)
      ->first();

    if($estado==null){
              $indicadoresC=$request->indicadoresC;
              $conceptos=$request->concepto;
              for($i=0;$i<count($request->indicadoresC);$i++){
              \DB::table('conducta')->insert(
                                  ['IDINDICADORC' => $indicadoresC[$i],
                                  'NIE'=>$request->NIE,
                                  'CONCEPTO'=>$conceptos[$i],
                                  'periodotrimestral_id'=>$trimestre
                                 ]
                              );
                              }

                return redirect('/conducta')->with('message','Conducta registrada correctamente!');

        }
        else{
          return redirect('/conducta')->with('message-error','Al Alumno ya se le registro la conducta este trimestre !');    }
        }
  else{
          $tipo=configuracion::tipo();
          if($tipo==1){
            return redirect('/conducta')->with('message-error','No hay trimestre Activo, Debe de iniciar el trimestre !');
          } else{
              return redirect('/conducta')->with('message-error','No hay trimestre Activo, notifique al director, para que inicie el trimestre!');
          }
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $nombre=configuracion::nombreUsuario(Auth::user()->id);
      $grado=configuracion::grados();
      $tipo=configuracion::tipo();
     $nombreC=Alumno::where('NIE',$id)->first();

     $nombreCompleto=$nombreC->nombre." ".$nombreC->apellidos;

    /*  $no=\DB::table('alumno')
      ->where('NIE',$id)
      ->get();*/


      $IndicadoresConducta=IndicadoresConducta::all();

    return view('RegistroNotas.registroConducta',compact('tipo','nombre','grado','id','IndicadoresConducta','nombreCompleto'));
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

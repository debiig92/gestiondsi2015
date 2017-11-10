<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Alumno;
use App\configuracion;
use Illuminate\Http\Request;

class DesinscribirAlumnosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
      //  $alumno=configuracion::alumnosActivos();
        $tipo=configuracion::tipo();

        if($tipo==1){
        $alumno=configuracion::alumnosActivos();
        }
        else{
            $alumno=configuracion::alumnosActivos2();
        }
        //  $encargado=Alumno::find($alumno->encargado_id)->encargado;
        //$nombreE=$encargado->nombre;
      //  dd($alumno);
        return view('alumnos.egresar',compact('grado','nombre','alumno','tipo'));
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
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
        $tipo=configuracion::tipo();
//dd($request->get('nombreA'));
        $alumno=Alumno::filtrosPromocion($request->get('nombreA'),$request->get('grado'));
        //$alumno=configuracion::alumnosActivos();
        // $encargado=Alumno::find($alumno->encargado_id)->encargado;
        //  $nombreE=$encargado->nombre;
        return view('alumnos.egresar',compact('nombre','grado','alumno','tipo'));
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
    public function update(Request $request)
    {
        foreach($request->prov as $provs){

            \DB::table('alumno')
                ->where('NIE', $provs)
                ->update(['estado' => 0]);
        }
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
        $tipo=configuracion::tipo();
        $alumno=configuracion::alumnosActivos();

        //return view('alumnos.egresar',compact('nombre','grado','alumno','tipo'));
        return redirect('/egresar')->with('message','El Alumno fue Egresado Exitosamente!');
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

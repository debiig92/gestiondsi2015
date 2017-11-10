<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\configuracion;
use Auth;
use App\Alumno;
use Illuminate\Http\Request;

class ActualizarAlumnoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
          $tipo=configuracion::tipo();
       // $alumno=configuracion::alumnos();
       if($tipo==1){
       $alumno=configuracion::alumnosActivos();
       }
       else{
           $alumno=configuracion::alumnosActivos2();
       }

        //  $encargado=Alumno::find($alumno->encargado_id)->encargado;
        //$nombreE=$encargado->nombre;

        return view('alumnos.editar',compact('grado','nombre','alumno','tipo'));

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
        // $encargado=Alumno::find($alumno->encargado_id)->encargado;
        //  $nombreE=$encargado->nombre;
        return view('alumnos.editar',compact('nombre','grado','alumno','tipo'));
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
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
        $alumno=Alumno::findOrFail($id);
        $tipo=configuracion::tipo();

        return view('alumnos.actualizar',compact('alumno','nombre','grado','tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $alumno=Alumno::findOrFail($id);
        $nombre=configuracion::nombreUsuario(Auth::user()->id);
        $alumnos=Alumno::find($id);
        $alumnos->fill($request->all());
        $alumnos->save();
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
        $tipo=configuracion::tipo();


        // Session::flash('message','Alumno Actualizado exitosamente');
        return redirect('/actualizarAlumno')->with('message','El Alumno fue Actualizado Exitosamente!');

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

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumno;
use App\Encargado;
use App\Grado;
use App\Turno;
use App\User;
use Auth;
use App\configuracion;
use App\Asistencia;
use App\fechaAsistencia;
use App\RegistroAsistencia;
use Session;




class RegistrarAsistenciaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$nombre=configuracion::nombreUsuario(Auth::user()->id);
		//$tipo=configuracion::tipo();
        $id=Auth::user()->id;
		$docente=User::find($id)->docente;
		$nombre=$docente->nombre;
        $tipo=configuracion::tipo();
        $nip=$docente->NIP;
        $grado = Asistencia::getGrado($nip);
		return view('asistencia.grados',compact('nombre','tipo','grado'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
         
        
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

        $id1=Auth::user()->id;
		$docente=User::find($id1)->docente;
		$nombre=$docente->nombre;
        $tipo=configuracion::tipo();
        //obtengo la llave primario de Docente logeado
        $nip=$docente->NIP;
        //Obtengo grados del docente para retornar a la vista de grados.
        $grado = Asistencia::getGrado($nip);
        //Obtengo alumnos del grado seleccionado.
        $alumnos=Alumno::getAlumnosGrado($request->idgrado);
        //Valido si ya esta registrada la fecha
        $registro=fechaAsistencia::findFecha($request->date);
        if(empty($registro)){
        //Guardo fecha seleccionada en el datepciker
        fechaAsistencia::saveFecha($request->date);
         //obtengo las fechas almacenadas
        $fecha= fechaAsistencia::all();
        //Obtengo ultima id de la fecha
        $idfecha=$fecha->last()->id;
        } else {
        $idfecha=$registro->id;
        }

        // Agrego un valor nulo al final del arreglo de asistencias para validar la ultima posición.
        $asist=$request->asist;
        array_push($asist, null);
      for($i=0;$i<count($asist);$i++){ //recorre el arreglo de checkbox
      	 for($j=0;$j<count($request->nie);$j++){ //recorre el arreglo de NIE de alumnos.
      	 	 if($request->nie[$j]!=$asist[$i]){ //compara posiciones de arreglos.
     	    $valor=RegistroAsistencia::saveInasistencia($request->nie[$j],$idfecha); //guarda 1 significando que si asistio.
      	    } else  {
              $valor=RegistroAsistencia::saveAsistencia($request->nie[$j],$idfecha);// guarda 0 significando que no asistio.
               $i++;  // incremento la posicion de asist porque ya encontre el valor del NIE, no debe seguir buscando.
               }
         }
      }
      if($valor!=false){
      Session::flash('message','Asistencia Registrada');
      } else
      Session::flash('message','Fecha de Asistencia Repetida');
        
     return view('asistencia.grados',compact('nombre','tipo','grado'));

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show()
	{
		$valor2=RegistroAsistencia::asistenciasTotales('2014-01-01', '2016-12-01');
        
       $nie='1003';
        $año=2015;
        $valor=RegistroAsistencia::asistenciaPorMes($nie,$año);
        $valor1=RegistroAsistencia::inasistenciaPorMes($nie,$año);
		return $valor1;

        $nie='11071631';
				$ano=2015;
        $valor=RegistroAsistencia::asistenciaPorMes($nie,$ano);
        $valor1=RegistroAsistencia::inasistenciaPorMes($nie,$ano);
		    return $valor1;

	}

  //----
	public function asistencias($nie, $ano)
	{
		  $valor=RegistroAsistencia::asistenciaPorMes($nie,$ano);
			return $valor;
	}
	public function inasistencias($nie, $ano)
	{
		$valor1=RegistroAsistencia::inasistenciaPorMes($nie,$ano);
		return $valor1;
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$id1=Auth::user()->id;
		$docente=User::find($id1)->docente;
		$nombre=$docente->nombre;
        $tipo=configuracion::tipo();
        $alumnos=Alumno::getAlumnosGrado($id);
       $idgrado=$id;
        return view('asistencia.asistenciaregister',compact('nombre','tipo','alumnos','idgrado'));
        //return $alumnos;
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

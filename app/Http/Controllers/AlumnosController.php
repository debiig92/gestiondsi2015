<?php namespace App\Http\Controllers;

use App\Alumno;
use App\Encargado;
use App\Grado;
use App\Http\Requests;
use App\Http\Requests\AlumnosCreateRequest;
use App\Http\Controllers\Controller;
use App\Turno;
use App\User;
use Auth;
use App\configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\AlumnoH;

class AlumnosController extends Controller {

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
     //   $grado=configuracion::gradosPorDocente(Auth::user()->id);
        //  $alumno=Alumno::name($request->get('nombreA'))->orderBy('apellidos','ASC')->paginate();
        $alumno=Alumno::orderBy('apellidos','ASC')->paginate(2);
        $grado=configuracion::gradosPorDocente(Auth::user()->id);
        return view('alumnos.consultar',compact('nombre','alumno','tipo','grado'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    $id=Auth::user()->id;
    $docente=User::find($id)->docente;
    $nombre=$docente->nombre;
    $tipo=configuracion::tipo();
   // $grado=Grado::lists('grado','id');
    $grado=configuracion::gradosPorDocente(Auth::user()->id);
   //dd($grado);
    return view('alumnos.inscripcion',compact('grado','nombre','tipo'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(AlumnosCreateRequest $request)
    {
				$cuenta = Alumno::where('grado_id','=',$request->grado)
				->count();
				if($cuenta!=50){
        $alumno = new Alumno();
        $alumno->NIE=$request->NIE;
        $alumno->grado_id=$request->grado;
        $alumno->nombre=$request->nombre;
        $alumno->apellidos=$request->apellidos;
        $alumno->direccion=$request->direccion;
        $alumno->sexo=$request->sexo;
        $alumno->fecha_nac=$request->fecha_nac;
        $alumno->lugar_nac=$request->lugar_nac;
        $alumno->numero=$request->numero;
        $alumno->folio=$request->folio;
        $alumno->tomo=$request->tomo;
        $alumno->libro=$request->libro;
        $alumno->nombrePadre=$request->nombrePadre;
        $alumno->nombreMadre=$request->nombreMadre;
        $alumno->DUIM=$request->DUIM;
        $alumno->DUIP=$request->DUIP;
        $alumno->nombreE=$request->nombreE;
        $alumno->direccionE=$request->direccionE;
        $alumno->telefonoE=$request->telefonoE;
        $alumno->DUIE=$request->DUIE;
        $alumno->estado=1;
        $alumno->save();
				return  redirect('/alumno/create')->with('message','El Alumno fue creado Exitosamente!');
      }
			else{
				return  redirect('/alumno/create')->with('message-error','Este grado ya tiene asignado el número máximo de alumnoos (50 alumnos máximo)');
			}
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
    public function registrarIndicador(){
        $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre;
        $alumnos = Alumno::all();
        $columnas =25;
        $tipo=configuracion::tipo();
        return view('parvularia.registrarIndicador',compact('alumnos','columnas','nombre','tipo'));

    }
    /**
     * public function
     */
    public function cuadros($title=null,$nie=null){
        $id=Auth::user()->id;
        $b=$nie;
        $alumno[]=\DB::table('alumno')->where('NIE','=',$nie)->get();//no hace lo que quiero aun
        $nombre=configuracion::nombreUsuario($id);
        $tipo=configuracion::tipo();
         if($title=='Cuadro 1'){
             return view('parvularia.alumnoCuadros.Cuadro1',compact('nombre','nie','tipo'));
            }
           else
               return ("Etapa de Prueba");

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

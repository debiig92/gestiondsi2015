<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\AreaIndicador;
use App\Indicadores ;
use App\Grado;
use App\Periodo;
use App\Http\Requests;
use App\Http\Requests\AlumnosRequest;
use App\Http\Controllers\registrarIndicador;
use App\RespuestaIndicador;
use App\User;
use Auth;
use App\configuracion;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;

class RegristrarIndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
         $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre;
        $tipo=configuracion::tipo();
        $nip=$docente->NIP;

        $asignaturas=\DB::table('asignatura')->get();
        $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->select('grado.id', 'grado.grado')
            ->get();
        return view('parvularia/SeleccionGrado',compact('nombre','tipo','grados'));
       // return view('parvularia/InformeAvancePdf',compact('nombre','tipo','grados'));
    }

    public function indexGenerarL(){
        $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre;
        $tipo=configuracion::tipo();
        $nip=$docente->NIP;

        $asignaturas=\DB::table('asignatura')->get();
        $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->select('grado.id', 'grado.grado')
            ->get();
        $alumnos="";
        return view('parvularia/Libreta',compact('nombre','tipo','grados','alumnos'));
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

    public function generarL($nie)
    {
        //datos del docente
        //
        $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre.' '.$docente->apellido;

        //datos del alumno
		//
            $alumno=Alumno::where("NIE",$nie)->get()->first();
            $nomalumno=$alumno->nombre.' '.$alumno->apellidos;
            $grado=Grado::where('id',$alumno->grado_id)->first();
			$gradoes=$this::queGradoES($alumno->grado_id);
            if($grado->turno_id==1)
			     $turno="Matutino";
		    else
                 $turno="Vespertino";			
       
		//datos de los indicadores Area 1
		//
		$area=AreaIndicador::all();
		$indi1=Indicadores::where("grado_id","LIKE","%$gradoes")->where("IDAREAIN","LIKE",1)->get();
		$max1=count($indi1);
		$respuesta=RespuestaIndicador::where("NIE","LIKE","%$nie")->where("area_ind","LIKE",1)->get();
		$maxres1=count($respuesta);
		//dd($respuesta,$indi1);
		//datos inidicadores Area 2
		//
		$indi2=Indicadores::where("grado_id","LIKE","%$gradoes")->where("IDAREAIN","LIKE",2)->get();
		$max2=count($indi2);
		$resp2=RespuestaIndicador::where("NIE","LIKE","%$nie")->where("area_ind","LIKE",2)->get();
		//dd($resp2,$indi2);
		//datos inidicadores Area 3
		//
		$indi3=Indicadores::where("grado_id","LIKE","%$gradoes")->where("IDAREAIN","LIKE",3)->get();
		$max3=count($indi2);
		$resp3=RespuestaIndicador::where("NIE","LIKE","%$nie")->where("area_ind","LIKE",3)->get();
		//dd($resp3,$indi3);

       $pdf = \App::make('dompdf.wrapper');
        $view = \View::make('parvularia.InformeAvancePdf',compact('nombre','nomalumno','grado','turno','area',
		                    'indi1','respuesta','max1','indi2','max2','resp2','indi3','max3','resp3'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setOrientation('landscape');
        return $pdf->stream();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nie=$request->nie;
        $cuadro=$request->area;
        $title=$this::cuadroT($cuadro);
        $total_array=count($request->num_id);
       //Actualiza el valor del avance
       for ($x=0; $x<=$total_array-1; $x++){
              \DB::table('respuestaindicador')
                  ->where('NIE', $nie)
                  ->where('IDINDICADOR',$request->num_id[$x])
                  ->update(['avance' => $request->letra[$x]]);
        }
        $path = 'registrar_indicador/'.$title.'/'.$nie;
        return redirect($path)->with('message','Los indicadores de logro se han guardado!');
    }

    /* metood para saber que area es y pasar el parametro del cuadro que
    //corresponde a la vista
    */
    private function cuadroT($cuadro){
        $area=$cuadro;
        switch ($area) {
            case '1':
                $titulo="Cuadro 1";
                break;
            case '2':
                $titulo="Cuadro 2";
                break;
            case '3':
                $titulo="Cuadro 3";
                break;
        }
        return $titulo;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trimestre=Periodo::where('estado','1')->first();
        if($trimestre=="")
        {
            $alumno=Alumno::where('NIE',$id)->first();
            $ruta='/registrarIndicadorLibreta/'.$id;
            return redirect($ruta);
        }
        else
        {
            return redirect('/boletas')->with('message-error', 'El trimestre debe estar cerrado');;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    /**
     * Registrar indicadores para Alumnos de Parvularia
     */
    public  function registrarIndicador2(Request $request){
        $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre;
        $tipo=configuracion::tipo();
        $nip=$docente->NIP;
        $grados=\DB::table('docentegrado')
            ->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
            ->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
            ->where('docente.user_id',"=",$id)
            ->select('grado.id', 'grado.grado')
            ->get();
        $grado=$request->grado_act;
        $alumnos=\DB::table('alumno')->where('grado_id',"=",$grado)->get();
        return view('Parvularia/Libreta', compact('nombre','tipo','grados','alumnos'));
    }

    public  function registrarIndicador(Request $request){
        $grado=$request->grado_act;
        return redirect()->route('listadoKP', [$grado]);;
    }

    public  function Listado($grados=null){
        $id=Auth::user()->id;
        $docente=User::find($id)->docente;
        $nombre=$docente->nombre;
        $grado=$grados;

        $alumnos=Alumno::where("grado_id","=","$grado")->paginate(4);
        //dd($alumnos);
        $area=AreaIndicador::all();
        $gradoid=\DB::table('grado')->select('grado.grado')->where('grado.id',"=", $grado)->get();
        $gradoname=$gradoid[0];
        $tipo=configuracion::tipo();
        //dd($alumnos);
        return view('parvularia/registrarIndicador',compact('alumnos','nombre','tipo','area','gradoname'));
    }
    /**
     * public function
     */
    public function cuadros($title=null,$nie=null){
        $id=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id);
        $alumnos=Alumno::where("NIE","LIKE", "%$nie%")->get()->first();
        $alumno=$alumnos->nombre;
        $apellido=$alumnos->apellidos;
        $tipo=configuracion::tipo();
        $area=AreaIndicador::all();
        $gradoQ=$alumnos->grado_id;// existe la posibilidad que sea 13-15
        $grado=$this::queGradoEs($gradoQ);
        $indi=0;
        //Se Guardan los avances como T de todos los indicadores
        //pertenecientes al cuadro de donde viene el request


         /*  $indicadores=Indicadores::where("grado_id","LIKE","%$grado")->where("IDAREAIN","LIKE","%$indi")->get();
         dd($indicadores);*/
    if($title=='Cuadro 1'){
          $indi=1;
          $indicadores=Indicadores::where("grado_id","LIKE","%$grado")->where("IDAREAIN","LIKE","%$indi")->paginate(6);
           $this::insertar($indi,$nie);
           $resp=RespuestaIndicador::where("NIE","LIKE","%$nie")->where("area_ind","LIKE","%$indi")->paginate(6);

          return view('parvularia.alumnoCuadros.Cuadro1',compact('nombre','nie','tipo','area','indicadores','alumno','apellido','gradoQ','resp'));
        }
        else {
            if($title=='Cuadro 2'){
                $indi=2;
                $indicadores=Indicadores::where("grado_id","LIKE","%$grado")->where("IDAREAIN","LIKE","%$indi")->paginate(6);
                $this::insertar($indi,$nie);
                $resp=RespuestaIndicador::where("NIE","LIKE","%$nie")->where("area_ind","LIKE","%$indi")->paginate(6);

                return view('parvularia.alumnoCuadros.Cuadro2',compact('nombre','nie','tipo','area','indicadores','alumno','apellido','gradoQ','resp'));
            }
            else {
                if($title=='Cuadro 3'){
                    $indi=3;
                    $indicadores=Indicadores::where("grado_id","LIKE","%$grado")->where("IDAREAIN","LIKE","%$indi")->paginate(6);
                    $this::insertar($indi,$nie);
                    $resp=RespuestaIndicador::where("NIE","LIKE","%$nie")->where("area_ind","LIKE","%$indi")->paginate(6);

                    return view('parvularia.alumnoCuadros.Cuadro3',compact('nombre','nie','tipo','area','indicadores','alumno','apellido','gradoQ','resp'));
                }                                                                                  }

        }
   }
/*
 * Se necesita conocer que grado es para el turno Vespertino
 * se numeran de 13-15 y los indicadores se crean con
 * grado_id del 1-3 se debe hacer la conversion
 * */
  private function queGradoES($idg){
      $reg=$idg;
      if($idg=='13'){
         $reg=1; return  $reg;
         }
      else{
          if($idg=='14'){
              $reg=2; return  $reg;
          }
          else
              if($idg=='15'){
                  $reg=3; return  $reg;
              }
          else
              return  $reg;
      }
  }

  private function insertar($area,$nie){
      $alumno=Alumno::where("NIE","LIKE","%$nie")->get()->first();
      $grado=$alumno->grado_id;
      $gradoes=$this::queGradoES($grado);
      $indicador=Indicadores::where("grado_id","LIKE","%$gradoes")->where("IDAREAIN","LIKE","%$area")->get();
      $in=RespuestaIndicador::where("NIE","LIKE","%$nie")->where("area_ind","LIKE","%$area")->get();
      $total_ind=count($in);
      //dd($total_ind);
      if($total_ind<=1){
          $avance="T";
          $total_indicador=count($indicador);
      for ($x=0; $x<=$total_indicador-1; $x++){
          \DB::table('respuestaindicador')->insert(
              [   'NIE' => $nie,
                  'IDINDICADOR'=>$indicador[$x]->id,
                  'area_ind'=>$area,
                  'avance'=>$avance
              ]
          );
      }}
  }

}





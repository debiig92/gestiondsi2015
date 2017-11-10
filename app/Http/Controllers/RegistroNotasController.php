<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\configuracion;
use Illuminate\Http\Request;
use App\User;
use App\Nota;
use App\Grado;
use App\Materia;
use App\Actividad;
use Auth;
use App\Asistencia;
use App\Periodo;


class RegistroNotasController extends Controller {

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
		$nip=$docente->NIP;
		//---------------------------------------------------------------------------------------------------
		//Recoge valores para 1 ciclo
	  $asignaturas=\DB::table('asignatura')
		                 //	->whereNotIn('asignatura.id',['CC','INN'])
		                 ->get();
		$grados=\DB::table('docentegrado')
					->join('docente', 'docentegrado.NIP', '=', 'docente.NIP')
					->join('grado', 'docentegrado.grado_id', '=', 'grado.id')
					->where('docente.user_id',"=",$id)
					->whereNotIn('grado.tipo_id',[3,2,4])
					->select('grado.id', 'grado.grado')
					->get();
//---------------------------------------------------------------------------------------------------------
		$asig=\DB::table('asignatura_has_docente')
	      	    ->join('grado','asignatura_has_docente.grado_id','=','grado.id')
							->join('asignatura','asignatura_has_docente.ASIGNATURA_idASIGNATURA','=','asignatura.id')
					   	->where('asignatura_has_docente.docente_NIP',"=",$nip)
							->whereNotIn('grado.tipo_id',[1,4])
			  	   ->get();
//-----------------------------------------------------------------------------------------------------------------
//Inicializar notas
//==================================================================================================================
	 	return view('RegistroNotas/MostrarGA/RegistrarNotas', compact('nombre','tipo','asig','grados','asignaturas'));
	  //=======================================================================================================

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
		$id=Auth::user()->id;
		$docente=User::find($id)->docente;
	  $nombre=$docente->nombre;
		$tipo=configuracion::tipo();
//========================================================================================================================
//Para recuperar actividades por grado y asignatura
    $action=$request->accion;
	  if($action==1)
		{
		$asignatura=$request->act_asignatura;
		$grado=$request->grado_act;
		if($asignatura!="")
		{
		$actividades=\DB::table('actividades')
		              ->join('asignatura', 'actividades.ASIGNATURA_idASIGNATURA', '=', 'asignatura.id')
									->join('grado', 'actividades.grado_id', '=', 'grado.id')
		              ->where('ASIGNATURA_idASIGNATURA', "=",$asignatura)
									->where('grado_id',"=",$grado)
									->whereNotIn('actividades.tipoactividad_id',[2])
									->select('actividades.id','grado.grado', 'asignatura.materia','actividades.ponderacion','actividades.nombre')
									->get();
		return view('RegistroNotas/ListarActividades/ListActivity', compact('nombre','tipo','actividades'));
	  }
	  // return view('actividades.')
		}
//-------------------------------------------------------------------------------------------------------------------------
		else{
			if($action==2)
			{
			}
			else{
				if($action==3) //Devuelve los alumnos//Aqui debo crear las actividades...
				{
//Devuelve las sub-actividades de una materia, grado y en especifico para luego ir a traerlas
//Aqui comienza
       	$i=$request->fila;
         if($i=="")
				 {
					 //retorna cuando no tienee
					 return redirect('/registrar')->with('message-error', 'Debe crear actividades para registrar notas');;

				 }
				 else{
					$i=$request->fila;
					$id="id".$i;
				  $idActividad=$request->$id;
					$ActividadPadre=Actividad::where('id', $idActividad)->first();//recordar trae el objeto especifico Actividad padre
					$ActividadesHijas=\DB::table("actividades")->where('Actividades_idActividades',"=",$ActividadPadre->id)->get(); //subactividades
				  $Alumnos=\DB::table('alumno')
					              ->where('grado_id',"=", $ActividadPadre->grado_id)
					              ->get();
					$as=Materia::where('id',$ActividadPadre->ASIGNATURA_idASIGNATURA)->first();
					$gra=Grado::where('id', $ActividadPadre->grado_id)->first();
					if($ActividadPadre->tipoactividad_id == 1)
					{
//-----------------------------------------------------------------------------------------------------------------
//Inicializar notas
          if($ActividadPadre->tipoactividad_id==1 | $ActividadPadre->tipoactividad_id==4)
				  {
          foreach($ActividadesHijas as $sub)
					{
						foreach($Alumnos as $alumno)
						{
							$notaPrueba=Nota::where('Actividades_idActividades',$sub->id)->where('alumno_NIE',$alumno->NIE)->first();
							$trimestre=Periodo::where('estado',"=",1)->first();
							if($notaPrueba=="")
							{
							$nota= new Nota();
							$nota->alumno_NIE= $alumno->NIE;
					    $nota->nota=0;
							$nota->PeriodoTrimestral_idPeriodoTrimestral=$trimestre->id;
						  $nota->Actividades_idActividades=$sub->id;
							$nota->save();
						  }else{}
						}
					}
				  $num=count($ActividadesHijas);
					return view('RegistroNotas/ListSub/ListSUB', compact('nombre','tipo','ActividadesHijas','ActividadPadre','Alumnos','num','as','gra'));
	//hasta qui llega registrar notas para actividades tipo 2;
				}else
				{
					//Aqui cuando es una Prueba objetiva
					return view('RegistroNotas/PruebaObjetiva/ListarAlumnos', compact('nombre','tipo','alumnos','num','as','gra','ActividadPadre'));
				}
				}
//=============================================================================================================================
//Entra cuando es PruebaObjetiva;
				 else
				 {
					 foreach($Alumnos as $alumno)
					 {
						 $notaPrueba=Nota::where('Actividades_idActividades',$ActividadPadre->id)->where('alumno_NIE',$alumno->NIE)->first();
						 if($notaPrueba=="")
						 {
						 $nota= new Nota();
						 $nota->alumno_NIE= $alumno->NIE;
						 $nota->nota=0;
						 $nota->Actividades_idActividades=$ActividadPadre->id;
						 $nota->save();
						 }
						 else{}
					 }
					 $as=Materia::where('id',$ActividadPadre->ASIGNATURA_idASIGNATURA)->first();
					 $gra=Grado::where('id', $ActividadPadre->grado_id)->first();
					 $alumnos=\DB::table('alumno')
													->join('nota', 'alumno.NIE', '=', 'nota.alumno_NIE')
													->where('grado_id',"=", $ActividadPadre->grado_id)
													->where('nota.Actividades_idActividades',"=",$ActividadPadre->id)
													->get();
					  $num=count($alumnos);
					 //Hare otro //casi listo
				   return view('RegistroNotas/PruebaObjetiva/ListarAlumnos', compact('nombre','tipo','alumnos','num','as','gra','ActividadPadre'));
				 }//termina el else
			 }
//==================================================================================================================================
				}else
				{
					if($action==4)
					{
							$num=$request->num;
							for($i=0; $i<$num; $i++)
							{
								$n="nota".$i;
								$ID="id".$i;
								$nota=$request->$n;
								$id=$request->$ID;
								$result=Nota::where('id',$id)->update(array('nota' => $nota));

							}
							$mensaje="Las notas han sido guardaas";
							return view('Actividades/exito', compact('nombre','tipo','mensaje'));
//===================================================================================================================

					}else
					{
						if($action==5)
						{
							$i=$request->fila;
							if($i=="")
							{
								return redirect('/registrar')->with('message-error','No tiene asignaturas asignadas.');;
							}
							else{
							$i=$request->fila;
							$g="grado".$i;
							$a="asignatura".$i;
							$asignatura=$request->$a;
							$grado=$request->$g;
							$actividades=\DB::table('actividades')
							              ->join('asignatura', 'actividades.ASIGNATURA_idASIGNATURA', '=', 'asignatura.id')
														->join('grado', 'actividades.grado_id', '=', 'grado.id')
							              ->where('ASIGNATURA_idASIGNATURA', "=",$asignatura)
														->where('grado_id',"=",$grado)
														->whereNotIn('actividades.tipoactividad_id',[2])
														->select('actividades.id','grado.grado', 'asignatura.materia','actividades.ponderacion','actividades.nombre')
														->get();
							return view('RegistroNotas/ListarActividades/ListActivity', compact('nombre','tipo','actividades'));
						}}
						else{
							if($action==6)
							{
								$sub=$request->subActividades;
								$Act=Actividad::where('id',$sub)->first();
								$grado=Grado::where('id',$Act->grado_id)->first();
								$asignatura=Materia::where('id',$Act->ASIGNATURA_idASIGNATURA)->first();
								$alumnos=\DB::table('alumno')
								              ->join('nota', 'alumno.NIE', '=', 'nota.alumno_NIE')
								              ->where('grado_id',"=", $Act->grado_id)
															->where('nota.Actividades_idActividades',"=",$Act->id)
								              ->get();
								$num=count($alumnos);
								return view('RegistroNotas/ListarAlumnos/ListarAlumnos', compact('nombre','tipo','alumnos','num','asignatura','grado',"Act"));
							}
								else{}
						}
						//------------------------------------------------------------------------------

					}
				}
			}
		}
//================================================================================================================
	/*
  $i=2; Sirve para el request---
  $grad="grado".$i;
	$materia="asignatura".$i;
  $m=$request->fila; //recupera el numero de fila
	$p=$request->$materia;
	return $p;*/

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

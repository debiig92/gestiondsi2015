<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Escolar;
use App\configuracion;
use App\User;
use Auth;
use DB;
use App\Periodo;
use App\AsignaturaGrado;

class EscolarController extends Controller
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
      $nip=$docente->NIP;
      $tipo=configuracion::tipo();
      $mensaje="";
      return view('AnoEscolar.crear', compact('nombre','tipo','mensaje'));
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
      $id=Auth::user()->id;
      $docente=User::find($id)->docente;
      $nombre=$docente->nombre;
      $nip=$docente->NIP;
      $tipo=configuracion::tipo();
      $action=$request->accion;
        if($action==1)
        {
          $valor=$request->escolar;
          if($valor==1)
          {
            $a=Escolar::where('estado',1)->first();
            if($a=="")
            {
              $hoy = getdate();
              $escolar=new Escolar();
              $escolar->anoEscolar= $hoy['year'];
              $escolar->estado=1;
              $escolar->save();
              $message="Año escolar iniciado";
              $valor='message';
            }
            else
            {
              $message="Ya esta activo el año escolar";
              $valor='message-error';
            }
          return redirect('/escolar')->with($valor,$message);;
        }
          else
          {
            $a=Escolar::where('estado',1)->first();
            if($a=="")
            {
              $message="No hay año escolar activo";
              $valor='message-error';
            }
            else{
              $a->estado=0;
              $x=DB::table('anoescolar')->where('estado', 1)->update(array('estado' => 0));
              $message="El año escolar ha sido cerrado";
              $valor='message';
            }
            return redirect('/escolar')->with($valor,$message);;
          }
        }
          else{
            if($action==2)
            {
              $valor=$request->trimestre;
              if($valor==1)
              {
                $a=Escolar::where('estado',1)->first();
                if($a=="")
                {
                  return redirect('/escolar')->with('message-error','Debe iniciar el año escolar antes de iniciar un trimestre');;
                }else
                  {
                    $trimestre=Periodo::where('estado',1)->first();
                    if($trimestre=="")
                    {
                      $trimestre1=Periodo::where('AnoEscolar_idAnoEscolar',$a->id)->orderBy('numperiodo', 'desc')->first();
                      if($trimestre1=="")
                      {//no hay trimestre anterior
                        DB::table('asignatura_has_docente')->update(array('estado' => 0));


                        //================================================
                        $t=new Periodo();
                        $t->numperiodo=1;
                        $t->estado=1;
                        $t->AnoEscolar_idAnoEscolar=$a->id;
                        $t->save();
                        $valor='message';
                        $message="El trimestre 1 ha sido iniciado";
                        return redirect('/escolar')->with($valor,$message);;
                      }
                     
                      else
                      {
                        //si hay trimestre anterior
                        if($trimestre1->numperiodo <= 3)
                        {
                        DB::table('asignatura_has_docente')->update(array('estado' => 0));
                        $t=new Periodo();
                        $t->numperiodo=($trimestre1->numperiodo)+1;
                        $t->estado=1;
                        $t->AnoEscolar_idAnoEscolar=$a->id;
                        $t->save();
                        $valor='message';
                        $message="El trimestre ".$t->numperiodo." ha sido iniciado";
                        return redirect('/escolar')->with($valor,$message);;
                        }
                        else{
                          return redirect('/escolar')->with('message-error',"Ya existen tres periodos para este Año Escolar");;
                        }
                      }
                    }else
                    {
                      $valor='message-error';
                      $message="Ya hay un trimestre activo!";
                      return redirect('/escolar')->with($valor,$message);;

                    }
                  }
              }
              else{
                if($valor==2)
                {
                  $a=Escolar::where('estado',1)->first();
                  if($a=="")
                  {
                    return redirect('/escolar')->with('message-error','No hay trimestre activo.');;
                  }
                  else
                  {//Cerrar un perido trimestral
                    $result=AsignaturaGrado::where('estado',1)->first();
                    if($result !="")
                    {
                    $x=DB::table('periodotrimestral')->where('estado', 1)->update(array('estado' => 0));
                    DB::table('nota')->delete();
                    DB::table('actividades')->delete();
                    return redirect('/escolar')->with('message','El trimestre ha sido cerrado!');;
                  }else{
                    return redirect('/escolar')->with('message-error','No han sido procesadas las notas por los docentes, no puede cerrar trimestre hasta que hayan sidos registradas');;
                  }
                  }
                }
                }
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

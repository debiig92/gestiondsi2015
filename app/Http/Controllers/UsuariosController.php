<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Docente;
use Illuminate\Http\Request;
use App\Http\Requests\UsuariosRequest;
use App\configuracion;
use Auth;
use App\TipoUser;
use Session;
use Redirect;
class UsuariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 *
	 */

	public function index()
	{

        $id=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id);
     //   $users= User::all();
        $users=User::getUsers();
        $tipo=configuracion::tipo();
       
		return view('usuario.read', compact('users','tipo','nombre'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $id1=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id1);
		$user= User::all();
		$id=$user->last()->id+1;
		$docente=Docente::all();
		$NIP=$docente->last()->NIP+1;
        $tipo=configuracion::tipo();
        $tipot=TipoUser::all();

		return view('usuario.create', compact('id','tipo','nombre','tipot','NIP'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

    public function cambiarContraseña (){
    	    }

	public function store(Request $request)
	{


        $user= new User();
        $docente= new Docente();
				$user->idtu=$request->tipot;
				$user->nombreUsuario=$request->usert;
				$user->password=bcrypt($request->contraseñat);
				$user->save();
		    $user=User::all();


            $value=Docente::verificarNIP($request->NIP);
            if(empty($value)){ 
	        $docente->NIP=$request->NIP;
            } else {
            Session::flash('message', 'Usuario no se creo por NIP repetido');
		   return Redirect::to('/usuario/create');
            }			
            $docente->user_id=$user->last()->id;
			$docente->nombre=$request->nombre;
			$docente->apellido=$request->apellido;
			$docente->DUI=$request->DUI;
			$docente->email=$request->email;
			$docente->telefono=$request->telefono;
			$docente->tipousuario_id=$request->tipot;
			$docente->save();
			$docente=Docente::all();
           // return $docente;
	     Session::flash('message', 'Usuario creado con existo');
       //  return Redirect::to('usuario');
		 return Redirect::to('/usuario/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, Request $request)
	{
		$id1=Auth::user()->id;

       $nombre=configuracion::nombreUsuario($id1);

	   $docente= Docente::getDocente($id);

       $tipo=configuracion::tipo();

        $tipouser=TipoUser::all();


   return view ('usuario.find',compact('docente','tipo','nombre','tipouser'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
      Docente::deleteDocente($id);
      Session::flash('message', 'Usuario Eliminado');
       //  return Redirect::to('usuario');
		 return Redirect::to('/usuario');

    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function cambiar(Request $request){


	}
	public function update($id, Request $request)
	{

		$id1=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id1);
		$docente= Docente::getDocente($id);

        $tipo=configuracion::tipo();



            $docente->user_id=$id;
			$docente->nombre=$request->nombre;
			$docente->apellido=$request->apellido;
			$docente->DUI=$request->DUI;
			$docente->email=$request->email;
			$docente->telefono=$request->telefono;


	    Docente::updateDocente($docente);
       Session::flash('message','Usuario Actualizado');
     return Redirect::to('/usuario');
     //  return view ('usuario.find', compact('docente','tipo','nombre','message'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}

}

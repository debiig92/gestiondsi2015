<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\LoginRequest;
use Session;
use Redirect;
use App\User;
use Illuminate\Http\Request;

class LogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  $tipo= Auth::user()->idtu;
          $id=Auth::user()->id;
          $docente=User::find($id)->docente;
          $nombre=$docente->nombre;
          return view('layouts.inicio2',compact('nombre','tipo'));
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
	public function store(LoginRequest $request)
	{
       if(Auth::attempt(['nombreUsuario'=>$request['nombreU'],'password'=>$request['password']])){

          $tipo= Auth::user()->idtu;
          $id=Auth::user()->id;
          $docente=User::find($id)->docente;
          $nombre=$docente->nombre;
          return view('layouts.inicio2',compact('nombre','tipo'));



         /*   switch (Auth::user()->idtu) {
                case 1:
                $id=Auth::user()->id;
                    $docente=User::find($id)->docente;
                    $nombre=$docente->nombre;
                    return view('layouts.director',compact('nombre'));
                    break;
                case 2:
                    $id=Auth::user()->id;
                    $docente=User::find($id)->docente;
                    $nombre=$docente->nombre;
                    return view('layouts.docenteB',compact('nombre'));
                    break;
                case 3:
                    $id=Auth::user()->id;
                    $docente=User::find($id)->docente;
                    $nombre=$docente->nombre;
                    return view('layouts.docenteP',compact('nombre'));
                    break;
             }*/
        }
       Session::flash('message-error','Datos incorrectos');
       return Redirect::to('/');






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

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }

}

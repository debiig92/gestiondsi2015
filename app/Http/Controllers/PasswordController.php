<?php

namespace App\Http\Controllers;

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

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id1=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id1);
        $tipo=configuracion::tipo();
        return view('usuario.cambioPass', compact('id1','tipo','nombre'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id);
        $users= User::getUsers();
        $tipo=configuracion::tipo();
                return view('usuario.contrasena', compact('users','tipo','nombre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id1=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id1);


        $id=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id);

        $tipo=configuracion::tipo();
        $user=User::find($request->id1);
        $user->password=bcrypt($request->nueva);
        $user->save();

        Session::flash('message', 'Contraseña actualizada');


        return Redirect::to('/password');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    
    /*public function show($id)
    {

        $id1=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id1);
        $tipo=configuracion::tipo();
        return view('usuario.pass', compact('id1','tipo','nombre')); 
    }*/
    public function show($id1)
    {
        $id=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id);
        $tipo=configuracion::tipo();
        return view('usuario.cambioPass', compact('id1','tipo','nombre'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

         $id1=Auth::user()->id;
        $nombre=configuracion::nombreUsuario($id1);
        $tipo=configuracion::tipo();
        $user=User::find($id);
        $user->password=bcrypt($request->nueva);
        $user->save();

        Session::flash('message', 'Contraseña actualizada');


        return Redirect::to('/password');
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

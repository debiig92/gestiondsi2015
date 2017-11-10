<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VistasController extends Controller {


    function __construct()
    {
        $this->middleware('auth',['only'=>'director','docenteB','docenteP']);

    }

    public function index(){
        return view('index');
    }

    public function director(){
        return view('layouts.director');
    }


    public function subdirector(){
        return view('layouts.subdirector');
    }


    public function docenteB(){
        return view('layouts.docenteB');
    }


    public function docenteP(){
        return view('layouts.docenteP');
    }


    public function alumno(){
        return view('layouts.alumno');
    }


}

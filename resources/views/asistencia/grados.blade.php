@extends('layouts.menu')
@section('content')

<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            @if(Session::has('message'))
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('message')}}
            </div>
            @endif
            <h2>Registro de Asistencia Diaria</h2>
            <hr class="colorgraph" id="linea-Superior">
            <div style="margin-top:40px;">
              <div>
                <div id="page-wrapper" style=" width:450px; margin-left:100px;">

                   @yield('content')
                   @foreach($grado as $row)
                <a href="{!! URL::to('/registrarAsistencia').'/'.$row->id.'/edit' !!}" style="color:#2E353D; font-size:30px; margin-left:50px;">
                <i class="fa fa-users fa-3x"></i>{{ $row->grado }}</a><br/><br/><br/>

              @endforeach
                </div>
              </div>
              <br><br><br><br><br><br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop

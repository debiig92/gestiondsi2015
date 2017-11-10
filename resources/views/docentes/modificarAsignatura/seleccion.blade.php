@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  </style>
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            <h2>Modificar Orientadores y Asignaturas</h2>
            <hr class="colorgraph" id="linea-Superior">
            <h4>Seleccione la opcion a modificar:</h4><br>
            <a href="{{route('modificarOrientador.index')}}" style="color:#2E353D; font-size:30px; margin-left:30px;">
                <i class="fa fa-users fa-3x"></i>Orientadores</a>
            <a href="{{route('modificarAsignatura.edit')}}" style="color:#2E353D; font-size:30px; margin-left:30px;">
            <i class="fa fa-book fa-3x"></i>Asignaturas</a>
          </div>
      </div>
    </div>
  </div>
</div>
@stop

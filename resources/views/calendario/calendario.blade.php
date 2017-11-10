@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
          <div class="panel-body">
            <h2>Gestion del Año Escolar</h2>
            <hr class="colorgraph">
            @include('calendario.comboperiodo')
            <!--Aqui ponen lo que quieran -->
            <div id="calendar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            @include('alerts.errors')
            <h2>Actividades</h2>
            <hr class="colorgraph">
            {!!Form::open(['route'=>'registrar.store','method'=>'POST']) !!}
            {!! Form::hidden('accion', 3) !!}
            @include('RegistroNotas.ListarActividades.List')
            {!!Form::submit('Registrar Notas',['class'=>'btn btn-primary']) !!}
            {!!Form::close() !!}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

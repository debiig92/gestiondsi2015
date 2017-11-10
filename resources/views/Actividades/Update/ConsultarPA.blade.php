@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            @include('alerts.exito')
            @include('alerts.errors')
            <h2>Actividades</h2>
            <hr class="colorgraph">
            @include('Actividades.update.modal2')
              {!!Form::open(['route'=>'updateG.store','method'=>'POST']) !!}
              {!! Form::hidden('accion', 1) !!}
             @include('RegistroNotas.MostrarGA.table_Materias_asignadas')
               <td><input type="submit" value="Listar Actividades" class="btn btn-primary" style="background:#23282E; border-color:#23282E;"></td>
              {!!Form::close() !!}
             @include('Actividades.Update.list2')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            <h2>Actividades</h2>
            <hr class="colorgraph">
            {!!Form::open(['route'=>'registrar.store','method'=>'POST']) !!}
            {!! Form::hidden('accion', 6) !!}
            <table class="table table-striped table-bordered" >
             <thead>
              <tr>
                <th>Grado</th>
                <th>Asignatura</th>
                <th>Actividad</th>
                <th>Sub-Actividades</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" style="border:none; background:#f9f9f9" id="grado" name="grado"  value="{{$gra->grado}}" readonly></td>
                <td><input type="text" style="border:none; background:#f9f9f9" id="Asignatura" name="Asignatura" value="{{$as->materia}}" readonly></td>
                <td><input type="text" style="border:none; background:#f9f9f9" id="Actividad" name="Actividad" value="{{$ActividadPadre->nombre}}" readonly></td>
                <td>@include('RegistroNotas.ListSub.select_sub')</td>
              </tr>
            </tbody>
            </table>
            {!!Form::submit('Registrar Notas',['class'=>'btn btn-primary']) !!}
            {!!Form::close() !!}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

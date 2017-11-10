@extends('layouts.menu')
@section('content')

<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
          <div class="panel-body">
            <h2>Registro Asistencia Diaria</h2>

            <hr class="colorgraph">
            <table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th class="encabezado-registro-notas">NIE</th>
      <th class="encabezado-registro-notas">Nombre</th>
      <th class="encabezado-registro-notas">Asistencia</th>
    </tr>
  </thead>
  <tbody>
   {!! Form::open(['route'=>['registrarAsistencia.store'],'method'=>'POST']) !!}
    <div style="width: 200px;">
              {!!Form::label('fecha','Seleccione Fecha:')!!}
             {!!Form::date('date',null,['id'=>'txtDate', 'class'=>'form-control datepiker'])!!}
             </div>
     @foreach($alumnos as $row)

    <tr id="fila-1">
      <td>{!!Form::text('nie[]',$row->NIE,['readonly'=>'readonly'])!!}</td>
      <td>{{$row->nombre}}  {{$row->apellidos}}</td>
      <td> {!!Form::checkbox('asist[]',$row->NIE, 'true')!!}</td>

    </tr>
  @endforeach
 {!!Form::hidden('idgrado',$idgrado)!!}
  </tbody>
</table>
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
           <!-- @include('asistencia.tabla_asistencia')-->
            <!--Aqui ponen lo que quieran -->
          <!--  <a href="#" class="btn btn-primary" style="width:100px;" role="button" id="Guardar-Notas">Registrar</a>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
<script>
$(function() {
   $('#txtDate').datepicker({ 
       beforeShowDay: $.datepicker.noWeekends 
   });
});
</script>

@stop

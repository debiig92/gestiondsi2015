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
            @include('Actividades.update.modal')
            {!!Form::open(['route'=>'updateActividad.store','method'=>'POST']) !!}
            {!! Form::hidden('accion', 1) !!}
            <table>
              <tr>
                <td style="width:100px"><label class="form-label">Grados</label></td>
                <td style="width:240px">@include('Actividades.table_grado')</td>
                <td style="width:240px;">@include('Actividades.tabla_asignaturas')</td>
                <td><input type="submit" value="Listar Actividades" class="btn btn-primary" style="margin-left:50px;background:#23282E; border-color:#23282E;"></td>
              </tr>
            </table>
             {!!Form::close() !!}
              <br><br>
             @include('Actividades.Update.list')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

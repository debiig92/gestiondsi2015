@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            <h2>Crear Sub-Actividades</h2>
            <hr class="colorgraph">
              {!!Form::open(['route'=>'subactividad.store','method'=>'POST']) !!}
              <h4>Por grado:</h4>
              <table class="table table-bordered table-hover" id="act_table">
                    <tr>
                    <th style="width:300px;">
                      <label class="control-label">Grado</label>
                    </th>
                    <th>
                        <label class="control-label" >Asignatura</label>
                    </th>
                  </tr>
                  <tr>
                    <td style="width:300px;">@include('Actividades/table_grado') <br></td>
                    <td>  @include('Actividades/tabla_asignaturas') <br></td>
                  </tr>
              </table>
              <input type="submit" class="btn btn-primary" id="buscar" name="buscar" value="Crear Sub-Actividad"/><br><br>
              {!!Form::close() !!}
              {!!Form::open(['route'=>'subactividad.store','method'=>'POST']) !!}
              {!! Form::hidden('accion', 1) !!}
              <h4>Por Asignatura:</h4>
              @include('RegistroNotas.MostrarGA.table_Materias_asignadas')
              <input type="submit" class="btn btn-primary" id="buscar" name="buscar" value="Crear Sub-Actividad"/>
              {!!Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

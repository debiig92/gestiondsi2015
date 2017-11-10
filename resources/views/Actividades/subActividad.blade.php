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
                {!! Form::hidden('accion', 2) !!}
                @include('Actividades/tableActividades')
                <table style="float:right;">
                <tr><th>N° Sub-Actividades&nbsp;&nbsp;</th>
                <th><input type="text"  name="subact" id="subact" class="form-control" style="width:50px" readonly="readonly"></tr>
                </table>
                <br>
                <label class="control-label">Sub-Actividades</label>
                @include('Actividades/tabla_act')
                <br><br><br><br>
                <table style="float:right;">
                <tr><th>Ponderacion Total&nbsp;&nbsp;</th>
                <th><input type="number" min="0" max="100" name="pond" id="pond" class="form-control" style="width:70px" readonly="readonly"></tr>
                </table><br>
              <br><br><input type="submit" value="Aceptar" class="btn btn-primary" >
             {!!Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

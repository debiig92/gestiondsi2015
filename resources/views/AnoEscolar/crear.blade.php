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
            <h2>Gestión Año Escolar</h2>
            <hr class="colorgraph">
              {!!Form::open(['route'=>'escolar.store','method'=>'POST']) !!}
              {!! Form::hidden('accion', 1) !!}
              <label class="form-label">Año Escolar</label>
              <select id="escolar" name="escolar" class="form-control">
                <option value="1">Iniciar Año Escolar</option>
                <option value="2">Cerrar Año Escolar</option>
              </select>
              <br>
              <input type="submit" class="btn btn-primary" id="buscar" name="buscar" value="Aceptar"/>
              {!!Form::close() !!}
              {!!Form::open(['route'=>'escolar.store','method'=>'POST']) !!}
              {!! Form::hidden('accion', 2) !!}
              <br><br>
              <label class="form-label">Trimestre</label>
              <select id="trimestre" name="trimestre" class="form-control">
                <option value="1">Iniciar Trimestre</option>
                <option value="2">Cerrar Trimestre</option>
              </select><br>
              <input type="submit" class="btn btn-primary" id="buscar" name="buscar" value="Aceptar"/>
              {!!Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

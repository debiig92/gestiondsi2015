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
            <h2>Promover Alumnos</h2>
            <hr class="colorgraph">
            {!!Form::open(['route'=>'promover.store','method'=>'POST']) !!}
            {!! Form::hidden('accion', 1) !!}
            <table class="table table-bordered table-hover">
              <tr>
                <td><label class="form-label" >Grado</td>
                <td>
                  <select class="form-control" id="grado" name="grado">
                    @foreach($grados as $grado)
                    <option value="{{$grado->id}}" >{{$grado->grado}}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </table>
            <input type="submit" value="Promover" class="btn btn-primary">
            {!!Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

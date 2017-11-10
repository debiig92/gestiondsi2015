@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px; margin-left:-14px;">
                    <div class="panel-body">
                        <h2>Actualizar Alumnos</h2>
                        <hr class="colorgraph">
                        @include('alerts.exito')
                        {!! Form::model($alumno,['route'=>['actualizarAlumno.update',$alumno->NIE],'method'=>'PUT']) !!}
                        @include('alumnos.edt.campos')
                        <button type="submit" class="btn btn-primary">Actualizar Alumno</button>
                        {!! Form:: close() !!}
                        <br>
                        <br>
                        <br>
                        <br><br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop

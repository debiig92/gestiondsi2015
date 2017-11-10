@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                        <h2>Asignas Grados y Asignaturas</h2>
                        <hr class="colorgraph">
                        <label for="">Grado: </label>
                        <label for="">{{$docenteB}}</label>
                        <br/>
                        <!-- **************************************************** -->
                        {!! Form::open(['route'=>['asignatura.store'],'method'=>'POST']) !!}
                        {!! Form::hidden('grado', $docenteB) !!}
                        @include('docentes.tabla')
                        <button type="submit" class="btn btn-primary">Asignar</button>
                        {!! Form:: close() !!}
                        <a href="{!! URL::to('/asignatura') !!}" style="color:#2E353D; font-size:16px">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

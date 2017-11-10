@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid" id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                        <h2>Des inscribir Alumnos</h2>
                        <hr class="colorgraph">
                        @include('alerts.exito')
                        @include('alerts.errors')
                        {!! Form::model(Request::all(),['route'=>'egresar.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                        @include('alumnos.edt.busqueda')
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form:: close() !!}


                        {!! Form::model($alumno,['route'=>['egresar.update'],'method'=>'PUT']) !!}
                        @include('alumnos.edt.tabla')
                        <button type="submit" class="btn btn-primary">Egresar Alumnos</button>
                        {!! Form:: close() !!}




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

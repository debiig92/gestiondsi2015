@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                        <h2>Actualizar Alumnos</h2>
                                <hr class="colorgraph">
                       @include('alerts.exito')
                        {!! Form::model(Request::all(),['route'=>'actualizarAlumno.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                        @include('alumnos.edt.busqueda')
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form:: close() !!}

                        <table class="table table-striped" style="background:#EFF3F6;">
                            <tr class="success" >
                                <th style="background:#2E353D; color:white">NIE</th>
                                <th style="background:#2E353D; color:white">Apellido y Nombre</th>
                                <th style="background:#2E353D; color:white"></th>
                            </tr>
                            @foreach($alumno as $user)
                            <tr>
                                <td>{{$user->NIE}}</td>
                                <td>{{$user->apellidos}} {{$user->nombre}}</td>
                                <td> <a href="{{route('actualizarAlumno.edit',$user->NIE)}}">Editar</a></td>
                            </tr>
                            @endforeach
                        </table>

  {!!$alumno->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Consultar Conducta </h2>
                        <hr class="colorgraph">
                        @include('alerts.exito')
                        @include('alerts.errors')
                        <div class="form-group">
                            {!! Form::open(['route'=>'consultarConducta.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                            {!! Form::label('Seleccione el Grado: ') !!}
                            <div class="form-group">
                                {!! Form::text('nombreA',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del alumno']) !!}
                                <select class="form-control" id="grado" name="grado">
                                    @foreach ($grado as $g)
                                    <option value="{{$g->id}}">{{$g->grado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                            {!! Form:: close() !!}
                        </div>
                        <div class="container" style="padding-top: 20px">
                            <table class="table table-striped table-bordered" style="width: 800px">
                                <thead>
                                <th style="background:#2E353D; color:white">NIE</th>
                                <th style="background:#2E353D; color:white">Nombre</th>
                                <th style="background:#2E353D; color:white">Apellidos</th>
                                <th style="background:#2E353D; color:white">Accion</th>

                                </thead>
                                @foreach($alumnos as $alumno)
                                <tbody>
                                <td >{{$alumno->NIE}}</td>
                                <td >{{$alumno->nombre}} </td>
                                <td >{{$alumno->apellidos}} </td>
                                <td><a href="{{route('consultarConducta.show',$alumno->NIE)}}">Consultar Conducta</a></td>
                                </td>
                                </tbody>
                                @endforeach
                            </table>
                            {!!$alumnos->render()!!}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

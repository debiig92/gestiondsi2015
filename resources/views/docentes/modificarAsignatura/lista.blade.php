@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Modificar Orientadores y asignaturas</h2>
                        <hr class="colorgraph" id="linea-Superior">
                        @include('alerts.exito')
                        @include('alerts.errors')
                          <h3> Seleccione la asignacion de Grado y Orientador a eliminar</h3>
                        <table class="table table-striped" style="background:#EFF3F6;">
                            <tr class="success" >
                                <th style="background:#2E353D; color:white">Grado/Orientador</th>
                                <th style="background:#2E353D; color:white">Eliminar Asignacion</th>
                            </tr>
                            @foreach($docentegrado as $grado)
                            <tr>
                              <td>
                                {{$grado->grado}} - {{$grado->nombre}} {{$grado->apellido}}</a>
                            </td>
                            <td>
                              {!! Form::open(['route'=>['modificarOrientador.destroy'],'method'=>'DELETE']) !!}
                                {!! Form::hidden('id', $grado->id) !!}
                              {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
                              {!! Form::close() !!}
                            </td>
                            </tr>
                            @endforeach
                        </table>
                        <div style="margin-top:40px;">



                            <br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

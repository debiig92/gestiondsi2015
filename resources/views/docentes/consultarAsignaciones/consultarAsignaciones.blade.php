@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid" id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                      <h2>Consultar Orientadores y Asignaturas</h2>
                        <hr class="colorgraph">
                        {!! Form::model(Request::all(),['route'=>'consultarOrientador.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                        <div class="form-group">
  <label>Seleccione el grado para consultar sus asignturas asignadas:</label>
                            <select class="form-control" id="grado" name="grado">
                                @foreach ($grado as $g)
                                <option value="{{$g->id}}">{{$g->grado}}</option>
                                @endforeach
                            </select>
                        </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form:: close() !!}
                        <table class="table table-striped" style="background:#EFF3F6;">
                            <tr class="success" >
                                <th style="background:#2E353D; color:white">Asignatura</th>
                                <th style="background:#2E353D; color:white">Docente</th>
                                <th style="background:#2E353D; color:white">Orientador</th>
                            </tr>
                            @for($i=0;$i < count($asignaturaD);$i++)
                            <tr>
                                <td>{{$asignaturaD[$i]->materia}}</td>
                                <td>{{$asignaturaD[$i]->apellido}} {{$asignaturaD[$i]->nombre}}</td>
                                <td>{{$orientador->nombre}} {{$orientador->apellido}}</td>
                            </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

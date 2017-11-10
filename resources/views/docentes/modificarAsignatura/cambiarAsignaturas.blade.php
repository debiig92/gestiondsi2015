@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid" id="container-fluid-incripcion-alumno" >
        <div class="row" id="row-inscripcion-alumno" >
            <div class="col-md-8 col-md-offset-2" >
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Modificar Asignaturas</h2>
                        <hr class="colorgraph">
                        {!! Form::model(Request::all(),['route'=>'consultar.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                        <div class="form-group">
                            <select class="form-control" id="grado" name="grado">
                                @foreach ($grado as $g)
                                <option value="{{$g}}">{{$g}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form:: close() !!}



                        <table class="table table-striped">

                            <tr class="success">
                                <th style="background:#2E353D; color:white">Asignatura</th>
                              <th style="background:#2E353D; color:white">Código</th>
                                <th style="background:#2E353D; color:white">Docente</th>
                            </tr>

                          

                            <tr>

                                <td></td>
                                <td></td>
                                <td></td>

                                </td>

                            </tr>


                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

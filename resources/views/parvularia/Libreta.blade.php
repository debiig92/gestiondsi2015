@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        @include('alerts.errors')
                        <h2>Reportes academicos</h2>
                        <hr class="colorgraph">
                        <!--Aqui ponen lo que quieran -->
                        {!!Form::open(array('route' => 'indicador.grado2'))!!}
                        {!! Form::hidden('accion', 1) !!}
                        <table>
                            <tr>
                                <td style="width:100px"><label class="form-label">Grados</label></td>
                                <td style="width:240px">@include('Actividades.table_grado')</td>
                                <td><input type="submit" value="Listar Alumnos" class="btn btn-primary" style="margin-left:50px;background: #23282E;"></td>
                            </tr>
                        </table>

                        {!!Form::close() !!}
                        @include('Parvularia.alumnoCuadros.ListadoParv')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

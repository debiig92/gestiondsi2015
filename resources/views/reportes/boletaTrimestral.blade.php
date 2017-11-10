@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px; margin-left:-14px;">
                    <div class="panel-body">
                        <h2 style="text-align:center">  Reportes Academicos</h2>
                        <hr class="colorgraph">
                        @include('alerts.errors')
                        <table class="table table-striped" style="background:#EFF3F6;">
                            <tr class="success" >
                                <th style="background:#2E353D; color:white">Reporte</th>
                                <th style="background:#2E353D; color:white">Campos de Busqueda</th>
                            </tr>
                            @if ($tipo == 1)
                            <tr>
                                <td>Boleta de Captura de Datos</td>
                                <td>{!!Form::open(['class'=>'navbar-form navbar-left pull-left'])!!}
                                    {!! Form::select('grado', $grado, null,['class'=>'form-control']) !!}
                                    <a href="/pdf/boletaCapturadeDatos.pdf" target="_blank"> <button type="submit" class="btn btn-default">Generar</button></a>
                                    {!!Form::close()!!}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Boleta de notas trimestral</td>
                                <td>   {!!Form::open(['route'=>'generarReportes.store', 'method'=>'POST', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search'])!!}
                                    @include('reportes.camposDeBusqueda')
                                    <button type="submit" class="btn btn-default">Generar</button>
                                    {!!Form::close()!!}</td>
                            </tr>
                            <tr>
                                <td>Lista de asistencia</td>
                                <td>   {!!Form::open(['route'=>'generarReportes.store', 'method'=>'POST', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search'])!!}
                                       {!! Form::select('grado', $grado, null,['class'=>'form-control']) !!}
                                        <button type="submit" class="btn btn-default">Generar</button>
                                       {!!Form::close()!!}</td>

                            </tr>
                            @if ($tipo == 1)
                            <tr>

                                <td>Cuadro Final</td>
                                <td>  {!!Form::open(['class'=>'navbar-form navbar-left pull-left'])!!}
                                      {!! Form::select('grado', $grado, null,['class'=>'form-control']) !!}

                                <a href="/pdf/CuadroFinal.pdf" target="_blank"><button type="submit" class="btn btn-default">Generar</button></a>
                                    {!!Form::close()!!}</td>
                            </tr>
                            @endif
                            @if ($tipo == 1)
                            <tr>
                                <td>Estadistica Anual</td>
                                <td>  <form id="form1" name="form1" class="navbar-form navbar-left pull-left">
                                    <a href="/pdf/EstadisticaAnual.pdf" target="_blank"><button type="submit" name="registrarse" id="registrarse" class="btn btn-default">Generar</button></a>
                                    <input type="checkbox" name="condicion" id="condicion" onclick="checkifempty()" checked/>
                                    </form></td>
                            </tr>
                            @endif
                            @if ($tipo == 1)
                            <tr>
                                <td>Libro de Promocion</td>
                                <td>  <form id="form2" name="form2" class="navbar-form navbar-left pull-left">
                                    <a href="/pdf/CuadroFinal.pdf" target="_blank"><button type="submit" name="registrarse2" id="registrarse2" class="btn btn-default" >Generar</button></a>
                                    <input type="checkbox" name="condicion2" id="condicion2" onclick="checkifempty2()" checked/>
                                    </form></td>
                            </tr>
                            @endif
                        </table>



                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection

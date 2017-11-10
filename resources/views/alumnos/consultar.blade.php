@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid" id="container-fluid-incripcion-alumno" >
        <div class="row" id="row-inscripcion-alumno" >
            <div class="col-md-8 col-md-offset-2" >
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Consultar Alumnos</h2>
                        <hr class="colorgraph">
                        {!! Form::model(Request::all(),['route'=>'consultar.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                        @include('alumnos.edt.busqueda')
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form:: close() !!}



                        <table class="table table-hover">
                            <TR>
                                <TH COLSPAN="14"></TH>
                                <TH COLSPAN="4" style="background:#2E353D; color:white">Partida de Nacimiento</TH>

                            </TR>
                            <tr class="success">
                                <th style="background:#2E353D; color:white">NIE</th>
                                <th style="background:#2E353D; color:white">Apellido</th>
                                <th style="background:#2E353D; color:white">Nombre</th>
                                <th style="background:#2E353D; color:white">Direccion</th>
                                <th style="background:#2E353D; color:white">Fecha de Nacimiento</th>
                                <th style="background:#2E353D; color:white">Sexo</th>
                                <th style="background:#2E353D; color:white">Encargado</th>
                                <th style="background:#2E353D; color:white">Direccion del encargado</th>
                                <th style="background:#2E353D; color:white">Telefono del encargado</th>
                                <th style="background:#2E353D; color:white">DUI del encargado</th>
                                <th style="background:#2E353D; color:white">Nombre Madre</th>
                                <th style="background:#2E353D; color:white">DUI de la madre</th>
                                <th style="background:#2E353D; color:white">Nombre Padre</th>
                                <th style="background:#2E353D; color:white">DUI del padre</th>
                                <th style="background:#2E353D; color:white">N°</th>
                                <th style="background:#2E353D; color:white">Folio</th>
                                <th style="background:#2E353D; color:white">Tomo</th>
                                <th style="background:#2E353D; color:white">Libro</th>
                            </tr>


                            @foreach($alumno as $user)
                            <tr>

                                <td>{{$user->NIE}}</td>
                                <td>{{$user->apellidos}}</td>
                                <td>{{$user->nombre}}</td>
                                <td>{{$user->direccion}}</td>
                                <td>{{$user->fecha_nac}}</td>
                                <td>{{$user->sexo}}</td>
                                <td>{{$user->nombreE}}</td>
                                <td>{{$user->direccionE}}</td>
                                <td>{{$user->telefonoE}}</td>
                                <td>{{$user->DUIE}}</td>
                                <td>{{$user->nombreMadre}}</td>
                                <td>{{$user->DUIM}}</td>
                                <td>{{$user->nombrePadre}}</td>
                                <td>{{$user->DUIP}}</td>
                                <td>{{$user->numero}}</td>
                                <td>{{$user->folio}}</td>
                                <td>{{$user->tomo}}</td>
                                <td>{{$user->libro}}</td>
                                <td>

                                </td>

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

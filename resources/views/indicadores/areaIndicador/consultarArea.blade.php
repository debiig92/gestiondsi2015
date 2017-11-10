@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid" id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                        <h2>Consultar área de indicador</h2>
                        <hr class="colorgraph">
                        @include('alerts.exito')
                        @include('alerts.errors')

                        <table class="table table-striped">

                            <tr class="success">
                                <th style="background:#2E353D; color:white">Id</th>
                                <th style="background:#2E353D; color:white">Área</th>
                                    @if ($tipo == 1 )
                                <th style="background:#2E353D; color:white">Operación</th>
                                  @endif
                            </tr>

                            @foreach($areas as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->areaindicador }}</td>
                                @if ($tipo == 1 )
                                <td><a href="{{route('areaIndicador.edit',$a->id)}}">Actualizar</a></td>
                                @endif
                            </tr>
                            @endforeach

                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

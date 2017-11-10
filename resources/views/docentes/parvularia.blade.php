@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                        <h2>Asignas Grados y Asignaturas</h2>
                        <hr class="colorgraph">
@include('alerts.exito')
                        <label for="">Grado: </label>
                        <label for="">{{$docenteB}}</label>

                        <br/>
                        <!-- **************************************************** -->
                        {!! Form::open(['route'=>['asignarparvularia.store'],'method'=>'POST']) !!}
                        {!! Form::hidden('grado', $docenteB) !!}
<!-- PARA ASIGNAR COMPUTACION O INGLES A PARVULARIA PERO COMO NO SE LES IMPARTIRA , SI  SE VA CAMBIAR DE PARECER DESCOMENTAR E IMPLEMENTAR
                        <table class="table table-striped" style="background:#EFF3F6;">
                            <tr class="success" >
                                <th style="background:#2E353D; color:white">Asignatura</th>
                                <th style="background:#2E353D; color:white">Código</th>
                                <th style="background:#2E353D; color:white">Docente</th>> -->
                                <div class="form-group">
                                    {!! Form::label('Orientador : ') !!}
                                    <select class="form-control" id="docebte" name="docente" style="width:300px;">
                                      @foreach ($docentesO as $asignatura)
                                      <option value="{!!$asignatura->NIP!!}">{{$asignatura->nombre}} {{$asignatura->apellido}}</option>
                                      @endforeach
                                      </select>
                                </div>
                        <!--    </tr>-->

                      </table>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                        {!! Form:: close() !!}
                        <a href="{!! URL::to('/asignatura') !!}" style="color:#2E353D; font-size:16px">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

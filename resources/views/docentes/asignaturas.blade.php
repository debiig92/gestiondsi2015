@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Asignar Grados y Asignaturas</h2>
                        <hr class="colorgraph" id="linea-Superior">
                        @include('alerts.exito')
                        @include('alerts.errors')
                        <div style="margin-top:40px;">
                            <h3> Primer Ciclo</h3>
                            @foreach($grados1 as $grado)
                            <a href="{{route('asignatura.edit',$grado->grado)}}" style="color:#2E353D; font-size:30px; margin-left:30px;">
                                <i class="fa fa-book fa-3x"></i>{{$grado->grado}}</a>
                            <br/>
                            @endforeach
                            <h3> Segundo Ciclo</h3>
                           @foreach($grados2 as $grado)
                           <a href="{{route('asignatura.edit',$grado->grado)}}" style="color:#2E353D; font-size:30px; margin-left:30px;">
                            <i class="fa fa-book fa-3x"></i>{{$grado->grado}}</a>
                            <br/>
                           @endforeach
                            <h3>Tercer Ciclo</h3>
                            @foreach($grados3 as $grado)
                            <a href="{{route('asignatura.edit',$grado->grado)}}" style="color:#2E353D; font-size:30px; margin-left:30px;">
                                <i class="fa fa-book fa-3x"></i>{{$grado->grado}}</a>
                            <br/>
                            @endforeach

                            <h3>Parvularia</h3>
                            @foreach($grados4 as $grado)
                            <a href="{{route('asignarparvularia.edit',$grado->grado)}}" style="color:#2E353D; font-size:30px; margin-left:30px;">
                                <i class="fa fa-book fa-3x"></i>{{$grado->grado}}</a>
                            <br/>
                            @endforeach
                            <div>
                                <div id="page-wrapper" style=" width:450px; margin-left:500px;">
                                    @yield('content')
                                </div>
                            </div>
                            <br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

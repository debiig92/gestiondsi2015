@extends('layouts.menu')
@section('content')
{!! Html::style('css/tableIndicadores.css') !!}

<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
    <h2>Registro Indicadores</h2>

    <hr class="colorgraph">
      <div style="width: 280px">
          @include('parvularia.AlumnosIndicador')


<!-- Aqui se muestran los 3 cuadros para el registro de indicadores de
     parvularia segun el numero de lista del alumno-->

</div>
<a href="/registrarIndicador " class="btn btn-primary" role="button" id="Regresar-Link">Regresar</a>
</div></div></div></div></div></div>
@stop

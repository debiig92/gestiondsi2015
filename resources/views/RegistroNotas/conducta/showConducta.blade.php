@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Consultar Conducta</h2>
  <hr class="colorgraph">
  <label>NIE:</label>{!!$id!!} <label>Alumno:</label>{!!$nombreCompleto!!}
        <div style="width: 700px">
          <table class="table table-striped table-bordered">
              <tr>
                  <th style="background:#2E353D; color:white">id</th>
                  <th style="background:#2E353D; color:white">Aspecto</th>
                  <th  style="background:#2E353D; color:white">Concepto Registrado</th>
              </tr>

            @foreach($IndicadoresConducta as $ic)
              <tr>
                <td>
                {!!Form::text('indicadoresC', $ic->id,['class'=>'form-control','readonly'=>'readonly'])!!}
                </td>
                  <td>{{$ic->NOMBREINDICADOR}}</td>
                  <td>{{$ic->CONCEPTO}}</td>
              </tr>
            @endforeach

</table>
      <a href="{!! URL::to('/consultarConducta') !!}" style="color:#2E353D; font-size:16px">Regresar</a>
</div>
@stop

@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Registro Conducta</h2>
  <hr class="colorgraph">
        <label>NIE:</label>{!!$id!!} <label>Alumno:</label>{!!$nombreCompleto!!}
        <div style="width: 700px">
            {!! Form::open(['route'=>'registrarConducta.store','method'=>'POST']) !!}
              {!! Form::hidden('NIE', $id) !!}
            @include('RegistroNotas.camposC')
            </table>
            {!! Form::submit('Registrar Conducta',['class'=>'btn btn-primary']) !!}
            {!! Form:: close() !!}

      <a href="{!! URL::to('/conducta') !!}" style="color:#2E353D; font-size:16px">Regresar</a>
</div>
@stop

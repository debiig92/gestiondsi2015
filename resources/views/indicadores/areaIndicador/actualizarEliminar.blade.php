@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px; margin-left:-14px;">
                    <div class="panel-body">
                        <h2>Actualizar Area Indicador</h2>
                        <hr class="colorgraph">
                        @include('alerts.exito')
                        @include('alerts.errors')
                        {!! Form::model($area,['route'=>['areaIndicador.update',$area],'method'=>'PUT']) !!}
                        @include('indicadores.areaIndicador.campos')
                        {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                        {!! Form:: close() !!}

                        {!! Form::open(['route'=>['areaIndicador.destroy',$area],'method'=>'DELETE']) !!}
                        {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        {!!link_to_route('areaIndicador.index', $title = 'Volver', $attributes = ['class'=>'btn btn-success'])!!}
                        <br>
                        <br>
                        <br>
                        <br><br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop

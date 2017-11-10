@extends('layouts.menu')
@section('content')
{!! Html::style('css/tableIndicadores.css') !!}
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px; margin-left:-14px;">
                    <div class="panel-body">
                        <h2>Actualizar Indicador</h2>
                        <hr class="colorgraph">

                        {!! Form::model($indicadores,['route'=>['indicador.update',$indicadores->id],'method'=>'PUT']) !!}
                        @include('indicadores.camposI')
						<div class="btn-group" style="width:400px">
                        {!! Form::submit('Actualizar Indicador',['class'=>'btn btn-primary'])!!}
                        {!! Form:: close() !!}

                        {!! Form::open(['route'=>['indicador.destroy',$indicadores],'method'=>'DELETE']) !!}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::submit('Eliminar Indicador',['class'=>'btn btn-danger']) !!}
                        {!! Form:: close() !!}
						</div>
                        <br><br><div class="btn-group">
                        <a href="{!! URL::to('/indicador') !!}" style="color:#2E353D; font-size:16px">Regresar</a>
</div>
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

@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Consultar Indicadores</h2>
                        <hr class="colorgraph">
                        @include('alerts.exito')
                        @include('alerts.errors')
                        @foreach($a as $user)
                        <label for="">Area {{$user->id}}: {{$user->areaindicador}}</label><br>
                        @endforeach
                        <br/><br/>
                        <!-- **************Combobox asignaturas ******************* -->
                         {!! Form::model(Request::all(),['route'=>'indicador.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                          {!! Form::text('indicador',null,['class'=>'form-control','placeholder'=>'Ingrese el indicador']) !!}
                          <div class="form-group">

                           {!!  Form::select('gradoP', array('1' => 'Kinder 4', '2' => 'Kinder 5', '3' => 'Preparatoria'), null,['class'=>'form-control']) !!}
                          </div>
                        <select class="form-control" id="area" name="area">
                            @foreach ($a as $g)
                            <option value="{{$g->id}}">Area {{$g->id}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form:: close() !!}

                        <!-- **************************************************** -->
                        @include('indicadores.indicadores')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

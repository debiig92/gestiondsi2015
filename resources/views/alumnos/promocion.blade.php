@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid" id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                      <h2>Promocion de Alumnos</h2>
                        <hr class="colorgraph">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                            {!! Form::model(Request::all(),['route'=>'promo.store','method'=>'POST','class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
                            @include('alumnos.edt.busqueda')
                            <button type="submit" class="btn btn-default">Buscar</button>
                            {!! Form:: close() !!}

                        {!! Form::model($alumno,['route'=>['promo.update'],'method'=>'PUT']) !!}
                        @include('alumnos.edt.tabla')
                        <button type="submit" class="btn btn-primary">Promocionar Alumnos</button>
                        {!! Form:: close() !!}




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

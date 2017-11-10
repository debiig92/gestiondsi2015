@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px; margin-left:-14px;">
                    <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-warning alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('message')}}
                    </div>
                    @endif
          <h2>Crear usuarios</h2>
              <hr class="colorgraph">
                 @include('alerts.errors')

           {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}

           <div class="form-group">
           {!!Form::label('tipot','Tipo:')!!}
             <select class="form-control" id="tipot" name="tipot">
                  @foreach ($tipot as $t)
                     <option  value="{{$t->id}}">{{$t->tipoU}}</option>
                  @endforeach
             </select>
           </div>
          <div class="form-group">
           {!!Form::label('user','Usuario:')!!}
           {!!Form::text('usert',null,['class'=>'form-control'])!!}
          </div>
          <div class="form-group">
            {!!Form::label('contrasena','Contraseña:')!!}
            {!!Form::password('contraseñat',['class'=>'form-control'])!!}
           </div>
           <h3>Datos del usuario</h3>
             <div class="form-group">
              {!!Form::label('NIP','NIP')!!}
              {!!Form::text('NIP',null,['class'=>'form-control'])!!}
            </div>
                @include('usuario.datos')

            <div class="form-group">
             {!!Form::label('id','Id de Usuario:')!!}
             {!!Form::text('user_id', $id, ['class'=>'form-control', 'readonly'=>'true'])!!}
            </div>
          {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
          {!!Form::close()!!}
     </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@extends('layouts.menu')

@section('content')



<div class="container">
  <section id="content">
                  @include('alerts.errors')

                    {!!Form::model($docente,['route'=>'usuario.update' ,'method'=>'PATCH'])!!}
                    @include('usuario.datos')
  				  {!!Form::label('id','Id de Usuario:',['class'=>'stilo'])!!}
                    {!!Form::text('user_id',null,['class'=>'username'])!!}
  					{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}

                          {!!Form::close()!!}
                     </div>
            </section>
    </div>
@endsection

@extends('layouts.menu')


@section('content')

  <div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                     
                    @if(Session::has('message'))
                    <div class="alert alert-warning alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('message')}}
                    </div>
                    @endif
                 
               
         {!!Form::open(['route'=>['password.store',$id1], 'method'=>'POST'])!!}
         <h2>Cambio de Contraseña</h2>
            <div class="form-group">
           {!!Form::label('label','Ingrese contraseña actual:')!!}
             {!!Form::password('anterior',['class'=>'form-control'])!!}
           </div>
          <div class="form-group">
           {!!Form::label('label2','Ingrese nueva contraseña:')!!}
           {!!Form::password('nueva',['class'=>'form-control'])!!}
          </div>

           {!!Form::hidden('id1', $id1, ['class'=>'form-control'])!!}
           {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}

              
         {!!link_to_route('usuario.index', $title = 'Volver', $parameters="", $attributes = ['class'=>'btn btn-principal'])!!}

          {!!Form::close()!!}
                     </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
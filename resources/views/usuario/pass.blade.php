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
                 
               
         {!!Form::open(['route'=>['password.show',$id],'method'=>'POST'])!!}
                  
           @include('usuario.datospass')
         
          
         {!!Form::submit('Carla',['class'=>'btn btn-primary'])!!}
              
         {!!link_to_route('usuario.index', $title = 'Volver', $parameters="", $attributes = ['class'=>'btn btn-success'])!!}

          {!!Form::close()!!}
                     </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
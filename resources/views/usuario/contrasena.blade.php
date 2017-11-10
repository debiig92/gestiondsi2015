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

              <h1>Consulta de Usuarios</h1>

              <h1>Cambio de Contraseñas</h1>

<hr class="colorgraph">
                <table class="table">
                 <thead>
                     <th>ID</th>
                      <th>Tipo de Usuario</th>
                      <th>Usuario</th>
                       <th>Operacion</th>
                </thead>

                <tbody>
  @foreach($users as $user)
<tr>
  <td>{{$user->id}}</td>
  <td>{{$user->tipoU}}</td>
  <td>{{$user->nombreUsuario}}</td>
  <td>

  
  {!!link_to_route('password.show', $title = 'Cambiar', $parameters = $user->id , $attributes = ['class'=>'btn btn-success'])!!}

      


  </td>
  </tr>
  @endforeach
</tbody>

</table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

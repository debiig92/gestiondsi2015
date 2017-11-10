@extends('layouts.menu')


@section('content')

  <div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">
                  @include('alerts.errors')
               
                        {!! Form::model($docente,['route'=>['usuario.update', $docente->user_id], 'method'=>'PUT']) !!}
                  
                      
                        <h2>Datos del Usuario</h2>
                        <hr class="colorgraph">
                         <div class="form-group">
                        {!!Form::label('NIP','NIP')!!}
                         {!!Form::text('NIP',null,['class'=>'form-control', 'readonly'=>'true'])!!}
                        </div>

                          @include('usuario.datos')
                         
                  
                       <div class="form-group">
                       {!!Form::label('tipouser','Tipo:')!!}
                       <select class="form-control" id="tipot" name="tipot">
                        @foreach ($tipouser as $t)
                          <option  value="{{$t->id}}">{{$t->tipoU}}</option>
                        @endforeach
                       </select>
                      </div>
                      <div class="form-group">
                        {!!Form::label('id','Id de Usuario:')!!}
                       {!!Form::text('user_id',null,['class'=>'form-control', 'readonly'=>'true'])!!}
                        </div> 
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                 
                   {!!link_to_route('usuario.edit', $title = 'Eliminar', $parameters = $docente->user_id, $attributes = ['class'=>'btn btn-danger'])!!}

                   {!!link_to_route('usuario.index', $title = 'Volver', $parameters="", $attributes = ['class'=>'btn btn-success'])!!}

                          {!!Form::close()!!}
                     </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

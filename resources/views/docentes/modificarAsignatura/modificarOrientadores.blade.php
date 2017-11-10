@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  </style>
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            <h2>Modificar Orientador</h2>
            <hr class="colorgraph" id="linea-Superior">
            <h4>Seleccione el grado y nuevo orientador:</h4><br>
        <b>Grado y oriendator seleccionado: </b>{!!$docentegrado->grado!!}   {!!$docentegrado->nombre!!}   {!!$docentegrado->apellido!!}
            {!! Form::open(['route'=>'modificarOrientador.update','method'=>'PUT']) !!}
              {!! Form::hidden('id', $docenteygrado) !!}
                   <table style="margin-left:30px;">
               <tr>
                 <td><i class="fa fa-graduation-cap fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                 <td>&nbsp;&nbsp;
            {!!Form::text('grado_id', $docentegrado->grado,['class'=>'form-control','readonly'=>'readonly'])!!}
                  </td>

               </tr>
               <tr>
                  <td><br><br><i class="fa fa-users fa-5x"></i></td>
                     <td>&nbsp;&nbsp;
                  <select class="form-control" id="grado_act" name="NIP" style="width:300px;">
                  @foreach ($docentesO as $grado)
                  <option value="{{$grado->NIP}}">{{$grado->nombre}} {{$grado->apellido}}</option>
                  @endforeach
                  </select>
                    </td>
               </tr>
               <br>
            <td>&nbsp;&nbsp;&nbsp;{!!Form::submit('Modificar Orientador',['class'=>'btn btn-primary']) !!}</td>

              {!! Form:: close() !!}
             </table>


          </div>
      </div>
    </div>
  </div>
</div>
@stop

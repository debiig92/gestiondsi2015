@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">

  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            <h2>Registro de Notas</h2>
            <hr class="colorgraph" id="linea-Superior">
            <div style="margin-top:40px;">
            <div id="page-wrapper" style=" width:450px; margin-left:100px;">
            {!!Form::open(['route'=>'registrar.store','method'=>'POST']) !!}
             <table>
               <tr>
                 <td><i class="fa fa-users fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;
                     <select class="form-control" id="grado_act" name="grado_act">
                     @foreach ($grados as $grado)
                     <option value="{{$grado->id}}">{{$grado->grado}}</option>
                     @endforeach
                     </select>
                     <br>
                  </td>
               </tr>
               <tr>
                 <td><br><br> <i class="fa fa-pencil-square-o fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></td>
                 <td><br><br>&nbsp;&nbsp; @include('RegistroNotas\asignaturas')</td>
               </tr>
             </table>
             <br><br><br>
               {!! Form::submit('Registrar Notas',['class'=>'btn btn-primary']) !!}
                 {!!Form::close() !!}
              </div>
            </div>
            <br><br><br><br><br><br><br>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

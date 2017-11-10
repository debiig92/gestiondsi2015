@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  </style>
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            @include('alerts.errors')
            <h2>Registro de Notas</h2>
            <hr class="colorgraph" id="linea-Superior">
            <h4>Seleccione el grado:</h4><br>
            {!!Form::open(['route'=>'registrar.store','method'=>'POST']) !!}
            {!! Form::hidden('accion', 1) !!}
             <table style="margin-left:30px;">
               <tr>
                 <td><i class="fa fa-users fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;
                     <select class="form-control" id="grado_act" name="grado_act" style="width:300px;" required
                     oninvalid="setCustomValidity('No tiene grados asignados')"
                     oninput="validarMensaje(this);">
                     @foreach ($grados as $grado)
                     <option value="{{$grado->id}}">{{$grado->grado}}</option>
                     @endforeach
                     </select>
                     <br>
                  </td>
                  <?php  $accion=1; ?>
                  <td>&nbsp;&nbsp;&nbsp;{!!Form::submit('Registrar Notas',['class'=>'btn btn-primary']) !!}</td>
               </tr>
               <tr>
                  <td><br><br><i class="fa fa-book fa-5x"></i></td>
                   <td>@include('RegistroNotas/MostrarGA/asignaturas')</td>
               </tr>
             </table>
            {!!Form::close() !!}
              <br><br><h4>Seleccione la asignatura:</h4><br>
            {!!Form::open(['route'=>'registrar.store','method'=>'POST']) !!}
            {!! Form::hidden('accion', 5) !!}
            @include('RegistroNotas.MostrarGA.table_Materias_asignadas')
           <br>
            {!!Form::submit('Registrar Notas',['class'=>'btn btn-primary']) !!}
            {!!Form::close() !!}
          </div>
      </div>
    </div>
  </div>
</div>
<!--valida-->
<script>
function validarMensaje(elementoInput) {
     if(elementoInput.validity.patternMismatch){
        elementoInput.setCustomValidity('Ingrese su DUI en el siguiente formato ########-#');
    }
    else {
         elementoInput.setCustomValidity('');
    }

}

</script>
@stop

@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno" >
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            @include('alerts.errors')
              @include('alerts.exito')
            <h2>Crear Actividades</h2>
            <hr class="colorgraph">
            {!!Form::open(['route'=>'actividad.store','method'=>'POST']) !!}
              {!! Form::hidden('accion', 1) !!}
            <table>
              <tr>
                <th><i class="fa fa-users fa-5x"></i></th>
                <th><h3>&nbsp;&nbsp;Grado</h3></th>
              </tr>
            </table><br><br>
            <table class="table table-bordered table-hover" >
              <tr><th>Nombre:</th>
              <th><input type="text"  name="nombre" id="nombre" class="form-control" style="width:600px; margin-right:-450px"
                oninvalid="setCustomValidity('Ingrese una ponderacion correcta entre 1%-%')"
                oninput="validarMensaje(this);"
                ></tr>
            </table>
            <table class="table table-bordered table-hover" id="act_table">
                  <tr>
                  <th style="width:300px;">
                    <label class="control-label">Grado</label>
                  </th>
                  <th>
                      <label class="control-label" >Asignatura</label>
                  </th>
                  <th>
                    <label class="control-label">Tipo de Actividad</label>
                  </th>
                    <th class="control-label" style="width:20px;" >Ponderación(%)</th>
                </tr>
                <tr>
                  <td style="width:300px;">@include('Actividades/table_grado') <br></td>
                  <td>  @include('Actividades/tabla_asignaturas') <br></td>
                  <td>  @include('Actividades/tabla_tipoAct') <br></td>
                  <td style="width:20px;">
                    <input class="form-control"  type="number" min="0" max="100" id="ponderacion" name="ponderacion" required

                    /></td>
                </tr>
            </table>
            <br><br><input type="submit" class="btn btn-primary" id="insertar" name="insertar" value="Crear Actividad"/><br>
             {!!Form::close() !!}<br><br><br><br>
                {!!Form::open(['route'=>'actividad.store','method'=>'POST']) !!}
                  {!! Form::hidden('accion', 2) !!}
                <table>
                  <tr>
                    <th><i class="fa fa-book fa-5x"></i></th>
                    <th><h3>&nbsp;&nbsp;Asignatura</h3></th>
                  </tr>
                </table><br><br>
                 @include('Actividades/act_mat')
           <br><br><input type="submit" class="btn btn-primary" id="insertarA" name="insertarA" value="Crear Actividad"/><br><br>
                {!!Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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

@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            <h2>Crear Actividad</h2>
            <hr class="colorgraph">
            {!!Form::open(['route'=>'actividad.store','method'=>'POST']) !!}
              {!! Form::hidden('accion', 3) !!}
            </table><br><br>
            <table class="table table-bordered table-hover" >
              <tr><th>Nombre:</th>
              <th><input type="text"  name="nombre" id="nombre" class="form-control" style="width:600px; margin-right:-450px"
                oninvalid="setCustomValidity('')"
                oninput="validarMensaje(this);"
                ></tr>
            </table>
            <table class="table table-bordered table-hover" id="act_table">
                  <tr>
                  <th style="width:300px;">
                    <label class="control-label">Grado</label>
                  </th>
                  <th>
                      <label class="control-label">Asignatura</label>
                  </th>
                  <th>
                    <label class="control-label">Tipo de Actividad</label>
                  </th>
                    <th class="control-label" style="width:20px;" >Ponderación(%)</th>
                </tr>
                <tr>
                  <td style="width:300px;">
                    @foreach($selectGrad as $grad)
                    <input type="text" class="form-control" id="grado" name="grado" value="{{$grad->grado}}" readonly>
                    @endforeach
                  </td>
                  <td>
                    @foreach($selecAs as $as)
                    <?php $idAsignatura=$as->id; ?>
                    <input type="text" class="form-control" id="asignatura" name="asignatura" value="{{$as->materia}}" readonly>
                    @endforeach
                  </td>
                  <td> @include('Actividades/tabla_tipoAct') <br></td>
                  <td style="width:20px;">
                    <input class="form-control" type="number" min="0" max="100" id="ponderacion" name="ponderacion" required/></td>
                </tr>
            </table>
            <br><br><input type="submit" class="btn btn-primary" id="insertar" name="insertar" value="Crear Actividad"/>
          <br>
          {!!Form::close() !!}<br><br><br><br>
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

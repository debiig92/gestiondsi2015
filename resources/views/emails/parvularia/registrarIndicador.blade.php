@extends('layouts.menu')
@section('content')
{!! Html::style('css/tableIndicadores.css') !!}

<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
    <h2>Registro Indicadores</h2>
    <hr class="colorgraph">
      <div style="width: 280px">
        <!-- Uso de un select junto con js para cargar dos diferentes div-->
           <select class="form-control" name="select" onChange="selectdivOnChange(this)" >
               <option value="nada" selected>Seleccione la forma del Registro</option>
               <option value="listaAlumno">Registro por Alumno</option>
               <option value="cuadroInd">Registro por Listado</option>
          </select>
      </div>
<!--Despliega el listado de los alumnos -->
      <div id="lista" style="display:none;">
          @include('parvularia.AlumnosIndicador')
      </div>
<!-- Aqui se muestran los 3 cuadros para el registro de indicadores de
     parvularia segun el numero de lista del alumno-->
      <div id="cuadros" style="display:none;" >
         <div class="panel-heading">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#tab_cuadro1" data-toggle="tab" >Cuadro 1</a></li>
               <li><a href="#tab_cuadro2" data-toggle="tab" >Cuadro 2</a></li>
               <li><a href="#tab_cuadro3" data-toggle="tab" >Cuadro 3</a></li>
            </ul>
         </div>
         <!--Se carga el contenido segun el tab que se seleccione-->
         <div class="panel-body" >
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab_cuadro1">
                    @include('parvularia.listaCuadros.listadoCuadro1')
                   <p>
                      <a href="#" class="btn btn-primary" role="button" id="Guardar-Notas">Guardar</a>
                   </p>
                </div>
            <div class="tab-pane fade" id="tab_cuadro2">
                   @include('parvularia.listaCuadros.listadoCuadro2')
                   <a href="#" class="btn btn-primary" role="button" id="Guardar-Notas">Guardar</a>
            </div>
            <div class="tab-pane fade" id="tab_cuadro3">
                   @include('parvularia.listaCuadros.listadoCuadro3')
                   <a href="#" class="btn btn-primary" role="button" id="Guardar-Notas">Guardar</a>
            </div>
          </div>
      </div>
    </div>
</div>

@stop

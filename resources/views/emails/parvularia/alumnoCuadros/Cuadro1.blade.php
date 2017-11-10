@extends('layouts.menu')
@section('content')

<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">
                        <h2>Registro Indicadores</h2>
                        <hr class="colorgraph">
    <label>NIE:</label>{!!$nie!!}
       <h3>AREA DE EXPERIENCIA Y DESARROLLO PERSONAL SOCIAL </h3>
       <div style="width: 700px">
           <table class="table table-striped table-bordered">
             <thead>
               <th style="width: 200px">Descripcion</th>
               <th  style="text-align: center ">Registro</th>
             </thead>

             <tbody>
               <tr>
                   <td>Se diferencia como niño o niña y se describe por atributos físicos, sin
                       discriminación de género.
                   </td><td>@include('parvularia.SelectLetra')</td></tr>
               <tr>
                   <td>Se sostiene en un pie por cinco segundos y los brazos extendidos.</td>
                   <td>@include('parvularia.SelectLetra')</td>
               </tr>
               <tr>
                   <td> Camina hacia atrás sobre una tabla. </td>
                   <td >@include('parvularia.SelectLetra')</td>
               <tr>
                   <td>Corre y puede disminuir velocidad, recoger un objeto y continuar.
                   </td><td>@include('parvularia.SelectLetra')</td></tr>
               <tr>
               <tr>
                   <td>Camina sobre una tabla inclinada.
                   </td><td>@include('parvularia.SelectLetra')</td></tr>
               <tr>

               </tbody>

           </table>

       <!--
        <ul class="list-group">
            <li class="list-group-item">Corre y puede disminuir velocidad, recoger un objeto y continuar</li>
            <li class="list-group-item">Camina sobre una tabla inclinada.</li>
            <li class="list-group-item">Salta en un pie con el otro arriba</li>
            <li class="list-group-item">Sube y baja rápidamente las gradas.</li>
        </ul>-->
       </div>

   </div>
                    <a href="#" class="btn btn-primary" role="button" id="Guardar-Notas">Guardar</a>
     <a href="{!! URL::to('/registrar_indicador') !!}" style="color:#2E353D; font-size:16px">Regresar</a>
  </div>
@stop
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="{{ asset('css/lista.css')}}" rel="stylesheet">
  </head>
  <body>
  <table class="titulo">
    <tr>
      <td class="title" class="logo" ><img src="{{asset('images/logoescuela.png') }}" class="title"/></td>
      <td class="nombre" >
        <center><h2>Centro Escolar "Profesora Herminia Martínez Alvarenga"</h2></center>
        <center>
        <h4>Final Calle principal, Col Mireya 2, San Ramón, San Salvador</h4>
        </center>
      </td>
    </tr>
    <tr>
      <td ></td>
      <td colspan="2" class="grado"><center>Grado:{{$grado->grado}}</center></center></td>
    </tr>
    <br><br>
  </table>
  <table class="list">
    <tr>
      <th class="list">N°</th>
      <th class="list">Nombre</th>
      <th class="list">Apellidos</th>
      <th class="list1"></th>
      <th class="list1"></th>
      <td class="list1"></td>
      <td class="list1"></td>
      <td class="list1"></td>
      <th class="list1"></th>
      <th class="list1"></th>
      <td class="list1"></td>
      <td class="list1"></td>
      <td class="list1"></td>
    </tr>
    <?php $i=1;?>
    @foreach($alumnos as $alumno)
    <tr>
      <td class="list">{{$i}}</td>
      <td class="list">{{$alumno->nombre}}</td>
      <td class="list">{{$alumno->apellidos}}</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="list1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <?php $i=$i+1;?>
    @endforeach
    
  </table>
</body>
<html>

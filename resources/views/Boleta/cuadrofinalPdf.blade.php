<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="{{ asset('css/cuadrofinal.css')}}" rel="stylesheet">

  </head>
  <body>
  <table class="letratablaCuadroFinal">
    <tr>
      <td class="title"><img src="{{ asset('images/elsalvador.PNG') }}" class="title"/></td>
      <td class="nombre">
        <center><h3 class="mayuscula">REGISTRO DE EVALUACION DEL RENDIMIENTO ESCOLAR DE EDUCACION {!!$tipo!!} </h3></center>
        <b>CUADRO FINAL DE EVALUACION DE</b> {{$datos->tipoD}}: {{$datos->grado}} <b>CODIGO DE INFRAESTRUCTURA:</b>11431
        <br><b>NOMBRE DEL CENTRO ESCOLAR:</b> Centro Escolar "Profesora Herminia Martínez Alvarenga"
        <br><b>DIRECCION:</b>Final Calle principal, Col Mireya 2, San Ramón, San Salvador <b>MUNICIPIO:</b> Mejicanos
        <br><b>DEPARTAMENTO:</b> San Salvador <b>N° DE ACUERDO DE CREACION:</b>             <b>FECHA:</b>

      </td>
    </tr>
  </table>
  <table border="1" class="tablaCuadroFinal">
  <colgroup>
  <col style="width: 20px">
  <col style="width: 25px">
  <col style="width: 25px">
  <col style="width: 25px">
  <col style="width: 25px">
  <col style="width: 24px">
  <col style="width: 24px">
  <col style="width: 24px">
  <col style="width: 24px">
  <col style="width: 22px">
  <col style="width: 22px">
  <col style="width: 22px">
  <col style="width: 24px">
  </colgroup>
    <tr>
      <th rowspan="2">NIE</th>
      <th rowspan="2">Nombre del Alumno</th>
      <th colspan="6">Asignatura</th>
      <th colspan="5">Moral y Civica <br> Aspectos de Conducta</th>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="vericaltext">Se respeta a si mismo y a los demas</td>
      <td class="vericaltext">Convive en forma armonica y solidaria</td>
      <td class="vericaltext">Toma deciciones responsablemente</td>
      <td class="vericaltext">Cumple sus deberes y ejerce correctamente sus derechos</td>
      <td class="vericaltext">Practica valores morales y civicos</td>
    </tr>
    @foreach($alumnos as $alumno)
      <tr>
        <td class="nombreAlumnos">{{$alumno->NIE}}</td>
        <td class="nombreAlumnos">{{$alumno->apellidos}} {{$alumno->nombre}}</td>
      </tr>
    @endforeach
  </table>
</body>
</html>

<?php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../vendor/autoload.php';

// disable DOMPDF's internal autoloader if you are using Composer
define('DOMPDF_ENABLE_AUTOLOAD', false);

//include DOMPDF's default configuration
require_once '../vendor/dompdf/dompdf/dompdf_config.inc.php';
$html=
'<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Example 2</title>
</head>
<body>
  <div>
  <table>
    <tr>
      <td><img src="logoescuela.png" style="width:100px"/></td>
      <td>
        <center>
        <h2 style="margin-left:50px;">Centro Escolar "Profesora Herminia Martínez Alvarenga"</h2>
      </center>
        <center>
        <h4>Final Calle principal, Col. Mireya 2, San Ramón, San Salvador</h4>
        </center>
      </td>
    </tr>
    <tr>
      <td><center><h4>Nombre:</h4></center></td>
      <td>Stefhanie</td>
    </tr>
  </table>
  <table style="border: 1px solid #000;">
    <thead style="border: 1px solid #000;">
      <tr style="border: 1px solid #000;">
        <th style="border: 1px solid #000;"  rowspan="2">Asignaturas</th>
        <th colspan="4" style="border: 1px solid #000;">1° Trimestre</th>
        <th colspan="4" style="border: 1px solid #000;">2° Trimestre</th>
        <th colspan="4" style="border: 1px solid #000;">3° Trimestre</th>
        <th style="border: 1px solid #000; font-size:12px" rowspan="4">Promedio final</th>
        <th rowspan="4" style="border: 1px solid #000;">Trimestre</th>
        <th rowspan="4" style="border: 1px solid #000;">Aspecto</th>
        <th rowspan="4" style="border: 1px solid #000; font-size:12px;">Promedio Final</th>
      </tr style="border: 1px solid #000;">
      <tr>
        <td style="border: 1px solid #000;">35%</td>
        <td style="border: 1px solid #000;">35%</td>
        <td style="border: 1px solid #000;">30%</td>
        <td style="border: 1px solid #000;">NF</td>

        <td style="border: 1px solid #000;">35%</td>
        <td style="border: 1px solid #000;">35%</td>
        <td style="border: 1px solid #000;">30%</td>
        <td style="border: 1px solid #000;">NF</td>

        <td style="border: 1px solid #000;">35%</td>
        <td style="border: 1px solid #000;">35%</td>
        <td style="border: 1px solid #000;">30%</td>
        <td style="border: 1px solid #000;">NF</td>
      </tr>
      <thead>
        <tbody>
          <tr>
            <td style="border: 1px solid #000;">Matematicas</td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
          </tr>
          <tr>
            <td style="border: 1px solid #000;">Lenguaje</td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
          </tr>
          <tr>
            <td style="border: 1px solid #000;">Estudios Sociales</td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>


          </tr>
          <tr>
            <td style="border: 1px solid #000;">Ciencias</td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>

          </tr>
          <tr>
            <td style="border: 1px solid #000;">Educacion Fisica</td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>

          </tr>
          <tr>
            <td style="border: 1px solid #000;">Ingles</td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>

          </tr>
          <tr>
            <td style="border: 1px solid #000;">Computacion</td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000;"></td>

            <td style="border: 1px solid #000;"></td>

          </tr>
        </tbody>
      </table>
      <br>
        <table style="border: 1px solid #000;">
          <thead >
            <tr >
              <th rowspan="2" style="border: 1px solid #000;">Aspecto</th>
              <th colspan="3" style="border: 1px solid #000;">Trimestre</th>
              <th rowspan="2" style="border: 1px solid #000; font-size:12px;">Promedio Final</th>
            </tr>
            <tr>
              <td style="border: 1px solid #000;" >1°</td>
              <td style="border: 1px solid #000;" >2°</td>
              <td style="border: 1px solid #000;" >3°</td>
            </tr>
          </thead>
          <tbody>
            <tr style="border: 1px solid #000;">
              <td  style="border: 1px solid #000; font-size:12px" >Se respeta a sí mismo (a) y a los demás</td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
            </tr>
            <tr>
              <td  style="border: 1px solid #000; font-size:12px" >Convive de forma armónica y solidaria</td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
            </tr>
            <tr>
              <td  style="border: 1px solid #000; font-size:12px">Toma decisiones responsablemente.</td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
            </tr>
            <tr>
              <td  style="border: 1px solid #000; font-size:12px">Cumple sus deberes y ejerce correctamente sus derechos</td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
            </tr>
            <tr>
              <td  style="border: 1px solid #000; font-size:12px">	Practica valores morales y cívicos.</td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
              <td style="border: 1px solid #000; font-size:12px"></td>
            </tr>
          <tbody>
        </table><br>
        <table style="border: 1px solid #000;">
          <thead >
            <tr><th  colspan="11" style="border: 1px solid #000;">Asistencias</th></tr>
            <tr>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;">Enero</td>
              <td style="border: 1px solid #000;">Febreo</td>
              <td style="border: 1px solid #000;">Marzo</td>
              <td style="border: 1px solid #000;">Abril</td>
              <td style="border: 1px solid #000;">Mayo</td>
              <td style="border: 1px solid #000;">Junio</td>
              <td style="border: 1px solid #000;">Julio</td>
              <td style="border: 1px solid #000;">Agosto</td>
              <td style="border: 1px solid #000;">Septiembre</td>
              <td style="border: 1px solid #000;">Octubre</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="border: 1px solid #000;">Asistencias</td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
            </tr>
            <tr>
              <td style="border: 1px solid #000;">Inasistencias</td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
              <td style="border: 1px solid #000;"></td>
            </tr>
          </tbody>

        </table>
</div>
</body>
</html>
';
$pdf=new DOMPDF();
$pdf->load_html();
$pdf->render();
$dompdf->stream("sample.pdf");

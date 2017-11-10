<?php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'C:\xampp\htdocs\gestiondsi2015\vendor\autoload.php';
// disable DOMPDF's internal autoloader if you are using Composer
define('DOMPDF_ENABLE_AUTOLOAD', false);
//include DOMPDF's default configuration
require_once 'C:\xampp\htdocs\gestiondsi2015\vendor\dompdf\dompdf\dompdf_config.inc.php';
$html='<!DOCTYPE html><html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>'.
'<title>Example 2</title>'.
'<link href="C:\xampp\htdocs\gestiondsi2015\public\css\reporte.css" rel="stylesheet">'.
'</head><body><table><tr><td><img src="C:\xampp\htdocs\gestiondsi2015\public\images\logoescuela.png" style="width:100px"/></td><td>'.
'<center><h2 style="margin-left:50px;">Centro Escolar "Profesora Herminia Martínez Alvarenga"</h2></center>'.
'<center><h4>Final Calle principal, Col. Mireya 2, San Ramón, San Salvador</h4></center></td></tr>'.
'<tr><td></td><td colspan="2"><center>Año: 2015 Grado: 7° Turno: Matutino</center></td></tr>'.
'<tr><td><center><h4>Nombre:</h4></center></td><td>Wendy Carolina Rizo Rodriguez</td></tr></table>'.
'<table class="boleta">'.
'<thead>'.
'<tr>'.
'<th class="boleta" rowspan="2">Asignaturas</th>'.
'<th class="boleta" colspan="4">1° Trimestre</th>'.
'<th class="boleta" colspan="4">2° Trimestre</th>'.
'<th class="boleta" colspan="4">3° Trimestre</th>'.
'<th class="boleta" style="font-size:12px" rowspan="4">Promedio final</th>'.
'</tr>'.
'<tr>'.
'<td class="boleta">35%</td>'.
'<td class="boleta">35%</td>'.
'<td class="boleta">30%</td>'.
'<td class="boleta">NF</td>'.
'<td class="boleta">35%</td>'.
'<td class="boleta">35%</td>'.
'<td class="boleta">30%</td>'.
'<td class="boleta">NF</td>'.
'<td class="boleta">35%</td>'.
'<td class="boleta">35%</td>'.
'<td class="boleta">30%</td>'.
'<td class="boleta">NF</td>'.
'</tr>'.
'<thead>'.
'<tbody>'.
'<tr>'.
  '<td class="boleta">Matematicas</td>'.
  '<td class="boleta">7</td>'.
  '<td class="boleta">7</td>'.
  '<td class="boleta">7</td>'.
  '<td class="boleta">7</td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
'</tr>'.
'<tr>'.
  '<td class="boleta">Lenguaje</td>'.
  '<td class="boleta">8</td>'.
  '<td class="boleta">6</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">8</td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
'</tr>'.
'<tr>'.
  '<td class="boleta">Estudios Sociales</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
'</tr>'.
'<tr>'.
  '<td class="boleta">Ciencias</td>'.
  '<td class="boleta">8</td>'.
  '<td class="boleta">5</td>'.
  '<td class="boleta">6</td>'.
  '<td class="boleta">6</td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
'</tr>'.
'<tr>'.
  '<td class="boleta">Educacion Fisica</td>'.
  '<td class="boleta">8</td>'.
  '<td class="boleta">7</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">8</td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
'</tr>'.
'<tr>'.
  '<td class="boleta">Ingles</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta">9</td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
'</tr>'.
'<tr>'.
  '<td class="boleta">Computacion</td>'.
  '<td class="boleta">2</td>'.
  '<td class="boleta">10</td>'.
  '<td class="boleta">8</td>'.
  '<td class="boleta">7</td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
  '<td class="boleta"></td>'.
'</tr>'.
'</tbody>'.
'</table>'.
'<br>'.
'<table class="aspectos">'.
'<thead>'.
  '<tr>'.
    '<th rowspan="2" class="boleta">Aspecto</th>'.
    '<th colspan="3" class="boleta">Trimestre</th>'.
    '<th rowspan="2" class="boleta-1">Promedio Final</th>'.
  '</tr>'.
  '<tr>'.
    '<td class="boleta">1°</td>'.
    '<td class="boleta">3°</td>'.
    '<td class="boleta">2°</td>'.
  '</tr>'.
'</thead>'.
'<tbody>'.
  '<tr class="boleta">'.
    '<td class="asp">Se respeta a sí mismo (a) y a los demás</td>'.
    '<td class="asp">MB</td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
  '</tr>'.
  '<tr>'.
    '<td class="asp">Convive de forma armónica y solidaria</td>'.
    '<td class="asp">MB</td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
  '</tr>'.
  '<tr>'.
    '<td class="asp">Toma decisiones responsablemente.</td>'.
    '<td class="asp">E</td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
  '</tr>'.
  '<tr>'.
    '<td class="asp">Cumple sus deberes y ejerce correctamente sus derechos</td>'.
    '<td class="asp">E</td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
  '</tr>'.
  '<tr>'.
    '<td class="asp">Practica valores morales y cívicos.</td>'.
    '<td class="asp">E</td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
    '<td class="asp"></td>'.
  '</tr>'.
'<tbody>'.
'</table>'.
'<table class="boleta">'.
'<thead>'.
  '<tr><th  colspan="11" class="boleta">Asistencias</th></tr>'.
  '<tr>'.
    '<td class="boleta"></td>'.
    '<td class="boleta">Enero</td>'.
    '<td class="boleta">Febreo</td>'.
    '<td class="boleta">Marzo</td>'.
    '<td class="boleta">Abril</td>'.
    '<td class="boleta">Mayo</td>'.
    '<td class="boleta">Junio</td>'.
    '<td class="boleta">Julio</td>'.
    '<td class="boleta">Agosto</td>'.
    '<td class="boleta">Septiembre</td>'.
    '<td class="boleta">Octubre</td>'.
  '</tr>'.
'</thead>'.
'<tbody>'.
  '<tr>'.
    '<td class="boleta">Asistencias</td>'.
    '<td class="boleta">20</td>'.
    '<td class="boleta">20</td>'.
    '<td class="boleta">20</td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
  '</tr>'.
  '<tr>'.
    '<td class="boleta">Inasistencias</td>'.
    '<td class="boleta">1</td>'.
    '<td class="boleta">1</td>'.
    '<td class="boleta">1</td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
    '<td class="boleta"></td>'.
  '</tr>'.
'</tbody>'.
'</table><br>'.
'<table>'.
'<tr>'.
'<th colspan="6">Firma del Responsable</th>'.
'<th></th>'.
'<th></th>'.
'</tr>'.
'<tr>'.
  '<td>F.</td>'.
  '<td></td>'.
  '<td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>'.
  '<td>F.</td>'.
  '<td></td>'.
'</tr>'.
'<tr>'.
  '<td style="width:10px;"></td>'.
  '<td class="firma">Lic. Edwin Aguilar Alvarenga</td>'.
  '<td></td>'.
  '<td style="width:10px;"></td>'.
  '<td colspan="2" class="firma">Lic.Estela Reyes  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>'.
  '<td></td>'.
'</tr>'.
'<tr>'.
'<td style="width:10px;"></td>'.
'<td>Director</td>'.
'<td></td>'.
'<td style="width:10px;"></td>'.
'<td colspan="2">Profesor</td>'.
'<td></td>'.
'</tr>'.
'</table>'.
'</body></html>';
$pdf=new DOMPDF();
$pdf->load_html($html);
$pdf->set_paper('A4',"landscape");
$pdf->render();
$pdf->stream("prueba.pdf");
?>

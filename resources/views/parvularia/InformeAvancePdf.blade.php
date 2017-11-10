<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Libreta_{{$nomalumno}}</title>
    <link href="{{ asset('css/Inicial.css')}}" rel="stylesheet">
</head>
<body>

<table   style="width: 1000px;  height: 100px;  margin-top: -17px;   ">
    <tr>
        <td style="width: 500px;">
            <h6>CONCEPTO: S= SI LO HACE, P= LO HACE CON AYUDA, T= TODAVÍA NO LO HACE </h6>
            &nbsp;&nbsp;&nbsp;Observaciones:
            <table  style="width:420px;margin-left:10px">
                <tr><td>Inicial:</td></tr>
                <tr><td class="firma">&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <tr><td class="firma">Intermedia:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <tr><td class="firma">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <tr><td class="firma">Final:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <tr><td class="firma">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <tr><td class="firma">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
            </table>

            <label>&nbsp;&nbsp;AREAS ESPECIALES</label>
            <table class="normal" style="margin-left:10px;">
                <tr><th style="width:175px">&nbsp;&nbsp;</th><th>INICIAL</th><th>INTERMEDIA</th><th>FINAL</th></tr>
                <tr><th style="width:175px">&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th></th></tr>
                <tr><th style="width:175px">&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th></th></tr>
                <tr><th style="width:175px">&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th></th></tr>
                <tr><th style="width:175px">&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th></th></tr>
                <tr><th style="width:175px">&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th>&nbsp;&nbsp;</th><th></th></tr>
            </table>

            <h6>&nbsp;&nbsp;&nbsp;F. PADRE DE FAMILIA O RESPONSABLE</h6>

            <table class="normal" style="margin-left:10px">
                <tr><td>INICIAL</td>
                    <td style="width:300px">&nbsp;&nbsp;</td>
                </tr>
                <tr><td>INTERMEDIA</td>
                    <td style="width:300px">&nbsp;&nbsp;</td>
                </tr>
                <tr><td>FINAL</td>
                    <td style="width:300px">&nbsp;&nbsp;</td>
                </tr>
            </table>
            &nbsp;&nbsp;Docente:<br>&nbsp;&nbsp;f.
            <table style="width:270px;margin-left:10px">
              <tr> <td class="firma">&nbsp;&nbsp;</td></tr>
            </table>
            &nbsp;&nbsp;Director:<br>&nbsp;&nbsp;f.
            <table style="width:270px;margin-left:10px">
                <tr> <td class="firma">&nbsp;&nbsp;</td></tr>
            </table>
            </td>
        <td>
            <center><h4>Centro Escolar "Profesora<br>Herminia Martínez Alvarenga"</h4>
                <label>Codigo 11431</label>
            </center>
            <center>
                <h5> Col Mireya No 2, final Calle Principal,<br>San Ramón, Mejicanos<br>Telefax:&nbsp;2284-2841</h5>
                <img style="width: 36.5%" src="{{ asset('images/logoescuela.png') }}" />
                <h4>INFORME DE AVANCE DE INDICADORES DE DESARROLLO</h4>
                <label><b>Año:</b>&nbsp;2015&nbsp; <b>Grado:</b>&nbsp;{{$grado->grado}}</label>
            </center>
            <p class="space"><b>Nombre del niño/a:</b><br>{{$nomalumno}}</p>
            <p class="space"><b>Nombre del Docente:</b>&nbsp;<br> {{$nombre}}</p>
            <p class="space"><b>Turno:</b>&nbsp;&nbsp;{{$turno}}</p>

        </td>

       </tr>
    </table>
    <div style="page-break-before: always;"></div>
<table  class="normal" style="width: 1000px; border: solid; ">
    <tr>
        <td style="width: 450px;">
            <table  class="normal" style="width: 450px">
                <tr><td  colspan="4" style="font-size:0.35cm"><center>{{$area[0]->areaindicador}}</center></td></tr>
                <tr><th style="width: 350px;font-size:0.35cm">INDICADORES</th><th style="font-size:0.25cm">INICIAL</th><th style="font-size:0.25cm">INTERMEDIA</th><th style="font-size:0.25cm">FINAL</th></tr>
                @for($i=0;$i<$max1;$i++)
                <tr> <td style="width: 350px;font-size:0.28cm">{{ $indi1[$i]->NUMEROINDICADOR }}.{{ $indi1[$i]->INDICADOR }}</td>
                    <td><center>{{ $respuesta[$i]->avance }}</center></td>
                   <td></td>
                   <td></td></tr>
                @endfor
                <tr><td  colspan="4" style="font-size:0.35cm"><center>{{$area[1]->areaindicador}}</center></td></tr>
                <tr><th style="width: 350px;font-size:0.35cm">INDICADORES</th><th style="font-size:0.25cm">INICIAL</th><th style="font-size:0.25cm">INTERMEDIA</th><th style="font-size:0.25cm">FINAL</th></tr>
				@for($i=0;$i<5;$i++)
                <tr> <td style="width: 350px;font-size:0.28cm">{{ $indi2[$i]->NUMEROINDICADOR }}.{{ $indi2[$i]->INDICADOR }}</td>
                    <td><center>{{ $resp2[$i]->avance }}</center></td>
                   <td></td>
                   <td></td></tr>
                @endfor
            </table>
        </td>
        <td style="width: 450px; ">
            <table  class="normal" style="width: 450px">
			
                <tr><th style="width: 350px;font-size:0.35cm">INDICADORES</th><th style="font-size:0.25cm">INICIAL</th><th style="font-size:0.25cm">INTERMEDIA</th><th style="font-size:0.25cm">FINAL</th></tr>
                @for($i=5;$i<$max2;$i++)
                <tr> <td style="width: 350px;font-size:0.28cm">{{ $indi2[$i]->NUMEROINDICADOR }}.{{ $indi2[$i]->INDICADOR }}</td>
                    <td><center>{{ $resp2[$i]->avance }}</center></td>
                   <td></td>
                   <td></td></tr>
                @endfor
                <tr><td  colspan="4" style="font-size:0.35cm"><center>{{$area[2]->areaindicador}}</center></td></tr>
                <tr><th style="width: 350px;font-size:0.25cm">INDICADORES</th><th style="font-size:0.25cm">INICIAL</th><th style="font-size:0.25cm">INTERMEDIA</th><th style="font-size:0.25cm">FINAL</th></tr>
				@for($i=0;$i<$max3;$i++)
                <tr> <td style="width: 350px;font-size:0.28cm">{{ $indi3[$i]->NUMEROINDICADOR }}.{{ $indi3[$i]->INDICADOR }}</td>
                    <td><center>{{ $resp3[$i]->avance }}</center></td>
                   <td></td>
                   <td></td></tr>
                @endfor
            </table>
        </td>  


</tr></table>
</body>
</html>



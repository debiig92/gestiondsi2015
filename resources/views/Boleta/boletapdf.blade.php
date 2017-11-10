<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="{{ asset('css/reporte.css')}}" rel="stylesheet">
  </head>
  <body>
  <table class="titulo">
    <tr>
      <td class="title"><img src="{{ asset('images/logoescuela.png') }}" class="title"/></td>
      <td class="nombre">
        <center><h1>Centro Escolar "Profesora Herminia Martínez Alvarenga"</h1></center>
        <center>
        <h4>Final Calle principal, Col Mireya 2, San Ramón, San Salvador</h4>
        </center>
      </td>
    </tr>
    <tr>
      <td ></td>
      <td colspan="2" class="grado"><center>Año:&nbsp;{{$anoH->anoEscolar}}&nbsp; Grado:{{$grado->grado}}</center></td>
    </tr>
    <tr>
      <td class="al"><center>Nombre:</center></td>
      <td>{{$alumno->nombre}}&nbsp;&nbsp;{{$alumno->apellidos}}</td>
    </tr>
  </table>
  <table  class="asignatura">
    <thead >
      <tr >
        <th rowspan="2" class="boleta">Asignaturas</th>
        <th colspan="4" class="boleta" >1° Trimestre</th>
        <th colspan="4" class="boleta" >2° Trimestre</th>
        <th colspan="4" class="boleta" >3° Trimestre</th>
        <th rowspan="2" class="boleta-1">Promedio final</th>
      </tr >
      <tr>
        @foreach($NotasMatematica as $nm)
        <td class="boleta">{{$nm->ponderacion}}%</td>
        @endforeach
        <td class="boleta">NF</td>
        @foreach($NotasMatematica as $nm)
        <td class="boleta">{{$nm->ponderacion}}%</td>
        @endforeach
        <td class="boleta">NF</td>
        @foreach($NotasMatematica as $nm)
        <td class="boleta">{{$nm->ponderacion}}%</td>
        @endforeach
        <td class="boleta">NF</td>
      </tr>
      <thead>
        <tbody>
          <tr>
            <td class="boleta">Matematicas</td>
            @foreach($NotasMatematica as $nm)
            <td class="boleta">{{$nm->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma3}}</td>

            @if($num>=2)
            @foreach($NotasMatematica2 as $nm)
            <td class="boleta">{{$nm->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma32}}</td>
            @endif
            @if($num==3)
            @foreach($NotasMatematica3 as $nm)
            <td class="boleta">{{$nm->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma33}}</td>
            <td class="boleta">{{($suma3+$sum32+$suma33)/3}}</td>
            @endif
            @if($num<2)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif

            @if($num<3)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
          </tr>
          <tr>
            <td class="boleta">Lenguaje</td>
            @foreach($NotasLenguaje as $nl)
            <td class="boleta">{{$nl->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma4}}</td>
            @if($num>=2)
            @foreach($NotasLenguaje2 as $nl)
            <td class="boleta">{{$nl->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma42}}</td>
            @endif
            @if($num>=3)
            @foreach($NotasLenguaje3 as $nl)
            <td class="boleta">{{$nl->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma43}}</td>
            <td class="boleta">{{($suma4+$suma42+$suma43)/3}}</td>
            @endif

            @if($num<2)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
            @if($num<3)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
          </tr>
          <tr>
            <td class="boleta">Estudios Sociales</td>
            @foreach($NotasSociales as $ns)
            <td class="boleta">{{$ns->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma5}}</td>
            @if($num>=2)
            @foreach($NotasSociales2 as $ns)
            <td class="boleta">{{$ns->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma52}}</td>
            @endif
            @if($num>=3)
            @foreach($NotasSociales3 as $ns)
            <td class="boleta">{{$ns->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma53}}</td>
            <td class="boleta">{{($suma5+$suma52+$suma53)/3}}</td>
            @endif
            @if($num<2)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
            @if($num<3)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
          </tr>
          <tr>
            <td class="boleta">Ciencias</td>
            @foreach($NotasCiencia as $nci)
            <td class="boleta">{{$nci->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma2}}</td>
            @if($num>=2)
            @foreach($NotasCiencia2 as $nci)
            <td class="boleta">{{$nci->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma22}}</td>
            @endif
            @if($num>=3)
            @foreach($NotasCiencia3 as $nci)
            <td class="boleta">{{$nci->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma23}}</td>
            <td class="boleta">{{($suma2+$suma22+$suma23)/3}}</td>
            @endif
            @if($num<2)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
            @if($num<3)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif

          </tr>
          <tr>
            <td class="boleta">Educacion Fisica</td>
            @foreach($NotasFisica as $ni)
            <td class="boleta">{{$ni->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma7}}</td>

            @if($num>=2)
            @foreach($NotasFisica2 as $ni)
            <td class="boleta">{{$ni->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma72}}</td>
            @endif

            @if($num==3)
            @foreach($NotasFisica3 as $ni)
            <td class="boleta">{{$ni->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma73}}</td>
            <td class="boleta">{{($suma7+$suma72+$suma73)/3}}</td>
            @endif

            @if($num<2)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
            @if($num<3)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
          </tr>
          <tr>
            <td class="boleta">Ingles</td>
            @foreach($NotasIngles as $ni)
            <td class="boleta">{{$ni->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma6}}</td>
            @if($num>=2)
            @foreach($NotasIngles2 as $ni)
            <td class="boleta">{{$ni->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma62}}</td>
            @endif

            @if($num==3)
            @foreach($NotasIngles3 as $ni)
            <td class="boleta">{{$ni->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma63}}</td>
            <td class="boleta">{{($suma6+$suma62+$suma63)/3}}</td>
            @endif

            @if($num<2)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
            @if($num<3)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
          </tr>
          <tr>
            <td class="boleta">Computacion</td>
            @foreach($NotasComputacion as $nc)
            <td class="boleta">{{$nc->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma1}}</td>
            @if($num>=2)
            @foreach($NotasComputacion2 as $nc)
            <td class="boleta">{{$nc->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma12}}</td>
            @endif
            @if($num==3)
            @foreach($NotasComputacion3 as $nc)
            <td class="boleta">{{$nc->nota}}</td>
            @endforeach
            <td class="boleta">{{$suma13}}</td>
            <td class="boleta">{{($suma1+$suma12+$suma13)/3}}</td>
            @endif

            @if($num<2)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
            @if($num<3)
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            <td class="boleta"></td>
            @endif
        </tr>
        <tr>
          @if(($grado->tipo_id) !=3)
          <td class="boleta">Moral y Civica</td>
          @foreach($NotasMoral as $nc)
          <td class="boleta">{{$nc->nota}}</td>
          @endforeach
          <td class="boleta">{{$suma8}}</td>
          @if($num>=2)
          @foreach($NotasMoral2 as $nc)
          <td class="boleta">{{$nc->nota}}</td>
          @endforeach
          <td class="boleta">{{$suma82}}</td>
          @endif
          @if($num==3)
          @foreach($NotasMoral3 as $nc)
          <td class="boleta">{{$nc->nota}}</td>
          @endforeach
          <td class="boleta">{{$suma83}}</td>
          <td class="boleta">{{($suma8+$suma82+$suma83)/3}}</td>
          @endif

          @if($num<2)
          <td class="boleta"></td>
          <td class="boleta"></td>
          <td class="boleta"></td>
          <td class="boleta"></td>
          @endif
          @if($num<3)
          <td class="boleta"></td>
          <td class="boleta"></td>
          <td class="boleta"></td>
          <td class="boleta"></td>
          <td class="boleta"></td>
          @endif
      </tr>
      <tr>
        <td class="boleta">Educación Artistica</td>
        @foreach($NotasArtistica as $nc)
        <td class="boleta">{{$nc->nota}}</td>
        @endforeach
        <td class="boleta">{{$suma9}}</td>
        @if($num>=2)
        @foreach($NotasArtistica2 as $nc)
        <td class="boleta">{{$nc->nota}}</td>
        @endforeach
        <td class="boleta">{{$suma92}}</td>
        @endif
        @if($num==3)
        @foreach($NotasArtistica3 as $nc)
        <td class="boleta">{{$nc->nota}}</td>
        @endforeach
        <td class="boleta">{{$suma93}}</td>
        <td class="boleta">{{($suma9+$suma92+$suma93)/3}}</td>
        @endif

        @if($num<2)
        <td class="boleta"></td>
        <td class="boleta"></td>
        <td class="boleta"></td>
        <td class="boleta"></td>
        @endif
        @if($num<3)
        <td class="boleta"></td>
        <td class="boleta"></td>
        <td class="boleta"></td>
        <td class="boleta"></td>
        <td class="boleta"></td>
        @endif
    </tr>
    @endif
        </tbody>
      </table>
      <br>
        <table class="aspectos">
          <thead>
            <tr>
              <th rowspan="2" class="asp">Trimestre</th>
              <th colspan="5" class="asp">Aspectos</th>
              <th rowspan="2" class="asp">Promedio Final</th>
            </tr>
            <tr>
              <td class="asp">1</td>
              <td class="asp">2</td>
              <td class="asp">3</td>
              <td class="asp">4</td>
              <td class="asp">5</td>
            </tr>
          </thead>
          <tbody>
            <tr >
              <td class="asp">1°</td>
              @foreach($aspectos as $a)
              <td class="asp">{{$a->CONCEPTO}}</td>
              @endforeach
              <td class="asp"></td>
            </tr>
            <tr>
              <td class="asp">2°</td>
              @if($num==2)
              @foreach($aspectos2 as $a)
              <td class="asp">{{$a->CONCEPTO}}</td>
              @endforeach
              @endif
              <td class="asp"></td>
            </tr>
            <tr>
              @if($num==2)
              <td class="asp">3°</td>
              <td class="asp"></td>
              <td class="asp"></td>
              <td class="asp"></td>
              <td class="asp"></td>
              <td class="asp"></td>
              <td class="asp"></td>
              @endif
              @if($num==3)
              @foreach($aspectos3 as $a)
              <td class="asp">{{$a->CONCEPTO}}</td>
              @endforeach
              @endif
            </tr>
          <tbody>
        </table><br>
        <table class="desAspectos">
          <tr><td class="ap" colspan="7">1.Se respeta a sí mismo (a) y a los demás</td></tr>
          <tr><td class="ap" colspan="7">2.Convive de forma armónica y solidaria</td></tr>
          <tr><td class="ap" colspan="7">3.Toma decisiones responsablemente</td></tr>
          <tr><td class="ap" colspan="7">4.Cumple sus deberes y ejerce correctamente sus derechos</td></tr>
          <tr><td class="ap" colspan="7">5.Practica valores morales y cívicos</td></tr>

        </table>
        <table class="asistencia">
          <thead>
            <tr class="boleta"><th class="boleta" colspan="11" >Asistencias</th></tr>
            <tr>
              <td class="boleta"></td>
              <td class="boleta">Enero</td>
              <td class="boleta">Febreo</td>
              <td class="boleta">Marzo</td>
              <td class="boleta">Abril</td>
              <td class="boleta">Mayo</td>
              <td class="boleta">Junio</td>
              <td class="boleta">Julio</td>
              <td class="boleta">Agosto</td>
              <td class="boleta">Septiembre</td>
              <td class="boleta">Octubre</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="boleta">Asistencias</td>
             @foreach($asistencias as $a)
              <td class="boleta">{{$a}}</td>
              @endforeach
            </tr>
            <tr>
              <td class="boleta">Inasistencias</td>
              @foreach($inasistencias as $a)
               <td class="boleta">{{$a}}</td>
               @endforeach
            </tr>
          </tbody>
        </table><br>
        <table class"firmas">
          <tr>
          <th colspan="6">Firma del Responsable</th>
          <th></th>
          <th></th>
          </tr>
          <tr>
            <td>F</td>
            <td></td>
            <td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>F</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td class="firma">Director&nbsp;{{$director->nombre}}&nbsp;&nbsp;{{$director->apellido}}</td>
            <td></td>
            <td></td>
            @foreach($docente as $d)
            <td colspan="2" class="firma">Prof.&nbsp;{{$d->nombre}}&nbsp;&nbsp;{{$d->apellido}}</td>
            @endforeach
            <td></td>
          </tr>
      </table>
</body>
</html>

<div class="users" style="background: #ffffff">
    <div style=" margin: auto;text-align: center">
        <h3>AREA DE EXPERIENCIA Y DESARROLLO DE LA EXPRESIÓN, COMUNICACIÓN Y REPRESENTACIÓN  </h3>
    </div>

    <table class="table table-striped table-bordered" >
        <thead>

        <th class="x">NIE</th>
        @for($x=1;$x<=$columnas-12;$x++)
        <th style="text-align: center ">{{$x}}</th>
        @endfor

        </thead>

        @foreach($alumnos as $alumno)
        <tbody>
        <td style="width: 500px">{{$alumno->NIE}}</td>
        @for($x=1;$x<=$columnas-12;$x++)
        <td contentEditable="true" id="act1" ></td>
        @endfor

        </tbody>

        @endforeach
    </table>
 </div>

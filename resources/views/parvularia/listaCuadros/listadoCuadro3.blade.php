<div class="users" style="background: #ffffff">
    <div style=" margin: auto;text-align: center">
        <h3>{{$area[2]->areaindicador}}</h3>
    </div>
    <table class="table table-striped table-bordered">
        <thead>

        <th class="x">NIE</th>
        @for($x=1;$x<=$columnas-12;$x++)
        <th style="text-align: center ">{{$x}}</th>
        @endfor
        </thead>

        @foreach($estudiantes as $estudiante)
        <tbody>
        <td>{{$estudiante->NIE}}</td>
        @for($x=1;$x<=$columnas-12;$x++)
        <td contentEditable="true" id="act1" ></td>
        @endfor

        </tbody>

        @endforeach
    </table>

</div>
@include('parvularia.NotadeIndicacion')
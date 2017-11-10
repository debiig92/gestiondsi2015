<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th class="encabezado-registro-notas">Id</th>
      <th class="encabezado-registro-notas">Grado</th>
        <th class="encabezado-registro-notas">Codigo</th>
      <th class="encabezado-registro-notas">Asignatura</th>
      <th class="encabezado-registro-notas">Registrar</th>
    </tr>
  </thead>
  <tbody><?php $i=0; ?>
    @foreach ($asig as $asignados)
    <?php $grado="grado".$i;
          $asignatura="asignatura".$i;
          $fila=$i;
        ?>
      <tr>
      <td><input type="text" class="form-control" style="width:50px;"id="{{$grado}}" name="{{$grado}}" value="{{$asignados->grado_id}}" readonly></td>
      <td>{{$asignados->grado}}</td>
      <td><input type="text" class="form-control" style="width:60px;" id="{{$asignatura}}" name={{$asignatura}} value="{{$asignados->ASIGNATURA_idASIGNATURA}}" readonly></td>
      <td >{{$asignados->materia}}</td>
      <td id="{{$fila}}" value="{{$fila}}"><input type="radio" id="fila" name="fila" value="{{$fila}}" required></td>
      <?php $i=$i+1; ?>
      </tr>
    @endforeach
  </tbody>
</table>

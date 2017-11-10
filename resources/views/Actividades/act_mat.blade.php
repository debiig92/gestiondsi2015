<table class="table table-bordered table-hover"  >
  <thead>
    <tr>
      <th>Id</th>
      <th>Grado</th>
      <th>Codigo</th>
      <th>Asignatura</th>
      <th>Registrar</th>
    </tr>
  </thead>
  <tbody><?php $i=0; ?>
    @foreach ($GradosAsignados as $asignados)
    <?php $grado="grado".$i;
          $asignatura="asignatura".$i;
          $fila=$i;
              ?>
      <tr>
      <td style="width:50px;"><input type="text" class="form-control" style="width:50px;"id="{{$grado}}" name="{{$grado}}" value="{{$asignados->grado_id}}" readonly></td>
      <td >{{$asignados->grado}}</td>
      <td style="width:50px;"><input type="text" class="form-control" style="width:60px;" id="{{$asignatura}}" name={{$asignatura}} value="{{$asignados->ASIGNATURA_idASIGNATURA}}" readonly></td>
      <td >{{$asignados->materia}}</td>
      <td id="{{$fila}}" value="{{$fila}}"  style="width:50px;"><input type="radio" id="fila" name="fila" value="{{$fila}}" required ></td>
      <?php $i=$i+1; ?>
      </tr>
    @endforeach
  </tbody>
</table>

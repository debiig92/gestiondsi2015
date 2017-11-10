<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th class="encabezado-registro-notas">ID</th>
      <th class="encabezado-registro-notas">NIE</th>
      <th class="encabezado-registro-notas">Nombre</th>
      <th class="encabezado-registro-notas">Nota</th>
    </tr>
  </thead>
  <tbody>
      <?php $j=0;?>
      @foreach($alumnos as $alumno)
      <tr>
        <?php $nota="nota".$j;
        $name="id".$j;
        ?>
      <td><input type="text" name="{{$name}}" id="{{$name}}" class="form-control" style="width:50px;" value="{{$alumno->id}}" readonly >
      <td>{{$alumno->NIE}}</td>
      <td>{{$alumno->nombre}}&nbsp;&nbsp;{{$alumno->apellidos}}</td>
      <td><input type="text" name="{{$nota}}" id="{{$nota}}" class="form-control" style="width:100px;" value="{{$alumno->nota}}" >
      </tr>
      <?php $j=$j+1 ?>
      @endforeach
    </tbody>
</table>

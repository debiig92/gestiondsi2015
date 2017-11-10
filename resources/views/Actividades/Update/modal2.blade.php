<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">  <img src="{{ asset('svgs/list.svg') }}" style="width:100px;margin-right:0.5em"/>Actividad</h3>
      </div>
      <path xmlns="http://www.w3.org/2000/svg" id="path330" style="fill:#f8a629;fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 3134.02,3865.42 c 0,-324.41 -262.98,-587.4 -587.38,-587.4 -324.41,0 -587.4,262.99 -587.4,587.4 0,324.39 262.99,587.38 587.4,587.38 324.4,0 587.38,-262.99 587.38,-587.38"/>
      <div class="modal-body">
        {!!Form::open(['route'=>'updateG.store','method'=>'POST']) !!}
        {!! Form::hidden('accion', 2) !!}
        <label>Id:</label><br>
        <input id="idActividad" name="idActividad" readonly class="form-control"><br>
        <label>Asignatura:</label>
         <input class="form-control"  type="text"  id="as" name="as" readonly><br>
        <label>Nombre:</label><br>
          <input type="text"  name="nombre" id="nombre" class="form-control"
            oninvalid="setCustomValidity('Ingrese una ponderacion correcta entre 1%-%')"
            oninput="validarMensaje(this);"><br>
          <label>Ponderación(%)</label><br>
          <input class="form-control"  type="number" min="0" max="100" id="ponderacion" name="ponderacion" required><br>
          <label>Actividad Padre</label><br>
           <input class="form-control"  type="text"  id="actpadre" name="actpadre" readonly>
          <br>
            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Cerrar</button>
            <input type="submit" value="Actualizar" class="btn btn-default btn-hover-green">
            <br>
          {!!Form::close()!!}
          </div>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>

<table class="table table-bordered table-hover" >
<tr>
<th><label class="control-label">Actividad Padre:</label></th>
<th>
<select class="form-control" id="act_padre" name="act_padre" required oninvalid="setCustomValidity('No puede crear Sub-Actividades sin antes hacer creado Actividades')" oninput="validarMensaje(this);">
@foreach ($actividades as $actividad)
<option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
@endforeach
</select>
</th>
<tr>
</table>

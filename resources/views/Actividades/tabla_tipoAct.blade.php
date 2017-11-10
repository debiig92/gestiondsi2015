<select class="form-control" id="tipo_act" name="tipo_act">
@foreach ($tipoactividades as $tipoactividad)
<option value="{{$tipoactividad->id}}">{{$tipoactividad->nombre}}</option>
@endforeach
</select>

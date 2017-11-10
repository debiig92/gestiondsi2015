<select class="form-control" id="grado_act" name="grado_act">
@foreach ($grados as $grado)
<option value="{{$grado->id}}">{{$grado->grado}}</option>
@endforeach
</select>

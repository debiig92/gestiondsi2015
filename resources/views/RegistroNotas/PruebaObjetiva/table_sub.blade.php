<select class="form-control" id="sub" name="sub">
@foreach ($ActividadesHijas as $sub)
<option value="{{$sub->id}}">{{$sub->nombre}}</option>
@endforeach
</select>

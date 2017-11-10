<select class="form-control" id="act_asignatura" name="act_asignatura" style="margin-left:20px; width:300px">
@foreach ($asignaturas as $asignatura)
<option value="{{$asignatura->id}}">{{$asignatura->materia}}</option>
@endforeach
</select>

<select class="form-control" id="act_asignatura" name="act_asignatura" style="width:300px;" required>
@foreach ($asignaturas as $asignatura)
<option value="{{$asignatura->id}}">{{$asignatura->materia}}</option>
@endforeach
</select>

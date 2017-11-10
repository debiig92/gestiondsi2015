<table class="table table-striped" style="background:#EFF3F6;">
    <tr class="success" >
        <th style="background:#2E353D; color:white">Asignatura</th>
        <th style="background:#2E353D; color:white">Código</th>
        <th style="background:#2E353D; color:white">Docente</th>



     <div class="form-group">
            {!! Form::label('Orientador : ') !!}
            <select class="form-control" id="docebte" name="docente" style="width:300px;">
              @foreach ($docentesO as $asignatura)
              <option value="{!!$asignatura->NIP!!}">{{$asignatura->nombre}} {{$asignatura->apellido}}</option>
              @endforeach
              </select>


     </div>
    </tr>
    @for ($i=0; $i < count($mat); $i++)
    <tr>
        <td>{{$materias[$i]}}</td>
        <td>{!!Form::text('materia[]', $mat[$i]->asignatura_id,['class'=>'form-control','readonly'=>'readonly'])!!}</td>
        <!-- PARA ASIGNAR COMPUTACION O INGLES A PARVULARIA PERO COMO NO SE LES IMPARTIRA , SI  SE VA CAMBIAR DE PARECER DESCOMENTAR E IMPLEMENTAR-->
  <!--      {{--   @if ($mat[$i]->asignatura_id=='CC')

        @elseif($mat[$i]->asignatura_id=='INN')
        <td>  <select class="form-control" id="docebte" name="docente2[]" style="width:300px;">
        @foreach ($docentesI as $asignatura)
        <option value="{{$asignatura->NIP}}">{{$asignatura->nombre}} {{$asignatura->apellido}}</option>
        @endforeach
        </select></td>
        @else--}}-->
        <td>  <select class="form-control" id="docebte" name="docente2[]" style="width:300px;">
        @foreach ($docentesO as $asignatura)
        <option value="{{$asignatura->NIP}}">{{$asignatura->nombre}} {{$asignatura->apellido}}</option>
        @endforeach
        </select></td>
  <!--     {{-- @endif --}} -->
    </tr>
    @endfor





</table>

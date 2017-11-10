<table class="table table-striped table-bordered" >
    <thead>
    <tr>
        <th style="background:#2E353D; color:white" >Numero</th>
        <th style="background:#2E353D; color:white">Indicador</th>
        <th style="background:#2E353D; color:white">Accion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($indicadores as $i)
    <tr>
        <td>{{$i->NUMEROINDICADOR}}</td>
        <td>{{$i->INDICADOR}}</td>

        <td ><a href="{{route('indicador.edit',$i->id)}}"/>Actualizar</a></td>

    </tr>
    @endforeach
    </tbody>
</table>

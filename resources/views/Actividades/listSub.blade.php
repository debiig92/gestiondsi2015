<table class="table table-bordered table-hover" id="tab_logic">
    <thead>
        <tr>
            <th class="text-center">id</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Ponderación</th>
        </tr>
    </thead>
    <tbody>
      @foreach($subV as sub)
      <tr>
        <td><input type="text"  class="form-control" style="width:50px;" value="{{$sub->id}}" readonly ></td>
        <td>{{$sub->nombre}}
        <td><input type="text"  class="form-control" style="width:50px;" value="{{$sub->id}}" readonly ></td>
      </tr>
      @endforeach
    </tbody>
</table>

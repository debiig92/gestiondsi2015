
<li class ="dropdown">
 <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
Grados <span class="caret"></span></a>
<ul class="dropdown-menu">
    @foreach($grado as $variable)
    <li><a href="#">{{$variable}}</a></li>
    @endforeach
</ul>

</li>



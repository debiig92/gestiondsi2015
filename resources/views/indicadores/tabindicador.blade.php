<div class="panel with-nav-tabs panel-primary" id="contenedor-tabs">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            @foreach($a as $user)
            <li><a href="#tab1primary" data-toggle="tab">Area {{$user->id}}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1primary">
                @include('indicadores.indicadores')
                <p>

                </p>
            </div>
            <div class="tab-pane fade" id="tab2primary">
                @include('indicadores.indicadores')

            </div>
            <div class="tab-pane fade" id="tab3primary">
                @include('indicadores.indicadores')

            </div>
        </div>
    </div>
</div>

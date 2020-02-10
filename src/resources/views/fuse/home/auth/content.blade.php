<div class="row">
    <div class="col-md-6 col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="media mb-2">
                    <img class="d-flex mr-3 rounded-circle"
                         src="{{ config('duck-funk.hotel') }}habbo-imaging/avatarimage?figure={{ core()->user()->look }}&direction=2&head_direction=3&gesture=sml&action=&size=n"
                    alt="{{ core()->user()->username }}">
                    <div class="media-body">
                        <h5 class="mt-0 font-16">{{ core()->user()->username }}</h5>
                        {{ core()->user()->motto }}
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <i class="retro retro-new_04 position-absolute"></i><p class="ml-4 mb-0"><strong>{{ core()->user()->credits }}</strong> créditos en tu monedero. </p></li>
                   @if(core()->user()->friend_requests->count() > 0)
                    <li class="list-group-item"> <i class="retro retro-new_01 position-absolute"></i><p class="ml-4 mb-0"><strong>Peticiones de amigo pendientes: </strong> {{ core()->user()->friend_requests->count() }}</p></li>
                    @endif
                    @if(core()->user()->friends->where('online', 1)->count() > 0)
                    <li class="list-group-item"> <i class="retro retro-v20_7 position-absolute"></i><p class="ml-4 mb-0"><strong>{{ core()->user()->friends->where('online', 1)->count() }} de tus amigos están conectados: </strong>
                            {{ implode(',', core()->user()->friends->where('online', 1)->pluck('username')->toArray()) }}
                        </p>
                    </li>
                    @endif
                    <li class="list-group-item"> <i class="retro retro-clock position-absolute"></i><p class="ml-4 mb-0"><strong>Último inicio de sesión: </strong> {{ core()->user()->last_login }}</p></li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link"><i class="retro retro-v22_4 position-absolute"></i><span class="ml-4 mb-0">Ajustes</span></a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>

    </div>
</div>

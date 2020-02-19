<div class="row">
    <div class="col-md-3 col-sm-5">
        <div class="card">
            <h4 class="card-header font-16 mt-0">{{ core()->user()->username }}</h4>
            <div class="card-body">
                <div class="media mb-2">
                    <img src="{{ config('duck-funk.hotel') }}habbo-imaging/avatarimage?figure={{ core()->user()->look }}&direction=2&head_direction=3&gesture=sml&action=&size=n"
                         alt="{{ core()->user()->username }}">
                    <div class="media-body">
                        <p>{{ core()->user()->motto }}</p>
                        <p><span class="badge badge-danger">{{ core()->user()->permissions->rank_name }}</span></p>
                        <img src="https://images.habbo.com/c_images/album1584/ACH_RegistrationDuration20.gif" alt="test">
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="retro retro-new_04 position-absolute"></i>
                        <p class="ml-4 mb-0"><strong>{{ core()->user()->credits }}</strong> créditos en tu monedero.
                        </p></li>
                    @if(core()->user()->friend_requests->count() > 0)
                        <li class="list-group-item"><i class="retro retro-new_01 position-absolute"></i>
                            <p class="ml-4 mb-0"><strong>Peticiones de amigo
                                    pendientes: </strong> {{ core()->user()->friend_requests->count() }}</p></li>
                    @endif
                    @if(core()->user()->friends->where('online', 1)->count() > 0)
                        <li class="list-group-item"><i class="retro retro-v20_7 position-absolute"></i>
                            <p class="ml-4 mb-0"><strong>{{ core()->user()->friends->where('online', 1)->count() }} de
                                    tus amigos están conectados: </strong>
                                {{ implode(',', core()->user()->friends->where('online', 1)->pluck('username')->toArray()) }}
                            </p>
                        </li>
                    @endif
                    <li class="list-group-item"><i class="retro retro-clock position-absolute"></i>
                        <p class="ml-4 mb-0"><strong>Último inicio de sesión: </strong> {{ core()->user()->last_login }}
                        </p></li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link"><i class="retro retro-v22_4 position-absolute"></i><span
                            class="ml-4 mb-0">Ajustes</span></a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-7">
        <div class="card">
            <h4 class="card-header font-16 mt-0">Últimas noticias</h4>

            <div class="card-body">
                <div id="carouselExampleCaption" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="https://images.habbo.com/web_images/habbo-web-articles/wpid-lpromo_gen_fan_6.png" alt="..." class="d-block img-fluid" style="border-radius: 15px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.habbo.com/web_images/habbo-web-articles/wpid-lpromo_gen_fan_6.png" alt="..." class="d-block img-fluid" style="border-radius: 15px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.habbo.com/web_images/habbo-web-articles/wpid-lpromo_gen_fan_6.png" alt="..." class="d-block img-fluid" style="border-radius: 15px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media mb-4">
                            <img class="d-flex align-self-start rounded mr-3" src="https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen_baw_1_thumb.png"
                                 alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h5 class="mt-0 font-16">Top-aligned media</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                            </div>
                        </div>

                        <div class="media mb-4">
                            <img class="d-flex align-self-start rounded mr-3" src="https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen_baw_1_thumb.png"
                                 alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h5 class="mt-0 font-16">Top-aligned media</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                            </div>
                        </div>

                        <div class="media mb-4">
                            <img class="d-flex align-self-start rounded mr-3" src="https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen_baw_1_thumb.png"
                                 alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h5 class="mt-0 font-16">Top-aligned media</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media mb-4">
                            <img class="d-flex align-self-start rounded mr-3" src="https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen_baw_1_thumb.png"
                                 alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h5 class="mt-0 font-16">Top-aligned media</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                            </div>
                        </div>

                        <div class="media mb-4">
                            <img class="d-flex align-self-start rounded mr-3" src="https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen_baw_1_thumb.png"
                                 alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h5 class="mt-0 font-16">Top-aligned media</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                            </div>
                        </div>

                        <div class="media mb-4">
                            <img class="d-flex align-self-start rounded mr-3" src="https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen_baw_1_thumb.png"
                                 alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h5 class="mt-0 font-16">Top-aligned media</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-12">
        <div class="card text-white bg-info">
            <div class="card-header">
                <h5 class="font-16 my-0"><i class="mdi mdi-alert-circle-outline mr-3"></i>Info Card</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title font-16 mt-0">card title</h5>
                <p class="card-text text-white-50">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>

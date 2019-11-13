@extends('duck-funk-core::layouts.master-without-nav')

@section('css')
@endsection

@section('content')
    @php
        $ban = resolve('expulsion');
        $user_session = resolve('user_session');
        $banExpire = \Carbon\Carbon::createFromTimestamp($ban->ban_expire);
    @endphp
    <div class="pt-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card maintenance-box shadow-none">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h3>{{ $user_session }}, has sido expulsado</h3>
                                <p>Tu sesión en el hotel ha finalizado. Puedes saber más acerca de tu expulsión a continuación.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mb-4 mb-lg-0">
                        <img src="{{ asset('vendor/duck-funk-core/images/banned.png') }}"
                             class="img-fluid mx-auto d-block" alt="">
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <div class="card maintenance-box shadow-none">
                        <div class="card-body p-4">
                            <div class="float-left mr-4">
                                <i class="retro-mid retro-mid-alert_triangle"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="text-uppercase mt-0">¿Por qué he sido expulsado?</h6>
                                <p class="text-muted mb-0">Has sido expulsado por {{ $ban->ban_reason }}.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card maintenance-box shadow-none">
                        <div class="card-body p-4">
                            <div class="float-left mr-4">
                                <i class="retro retro-clock"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="text-uppercase mt-0">¿Cuándo acabará?</h6>
                                <p class="text-muted mb-0">Dentro de {{ $banExpire->longAbsoluteDiffForHumans() }},
                                    el {{ $banExpire->format('j \d\e M \d\e Y') }} a las {{ $banExpire->format('H:s') }}
                                    .</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

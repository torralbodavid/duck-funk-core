@extends('duck-funk-core::layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">{{ auth()->user() }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Veltrix</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Extra Pages</a></li>
            <li class="breadcrumb-item active">Blank page</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title font-16 mt-0">Avatares de {{ auth()->user()->name }}</h4>
                    <hr>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-first" role="tabpanel"
                             aria-labelledby="nav-first-tab">
                            <div class="p-2 mt-2">
                                <ul class="list-unstyled latest-message-list mb-0">
                                    @if($avatars)
                                        @foreach($avatars as $avatar)
                                            <li class="message-list-item">
                                                <div class="media">
                                                    <img class="mr-3 rounded-circle"
                                                         src="https://www.habbo.com/habbo-imaging/avatarimage?figure={{ $avatar->look }}&direction=3&head_direction=4&gesture=sml&action=&size=n&headonly=1"
                                                         alt="{{ $avatar->username }}">
                                                    <div class="media-body">
                                                        <p class="float-right font-12 text-muted">{{ $avatar->getLastLogin() }}</p>
                                                        <h6 class="mt-0">{{ $avatar->username }}</h6>
                                                        <button type="button" class="btn btn-success btn-icon">
                                                                <span class="btn-icon-label"><i
                                                                        class="mdi mdi-login mr-2"></i></span> Acceder
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border border-primary text-primary">
                <div class="card-header bg-white border-primary">
                    <h5 class="font-16 my-0"><i class="mdi mdi-login-variant mr-3"></i>Tus avatares ({{ count($avatars) }})</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-16 mt-0">{{ auth()->user()->name }}, ¡diviértete!</h5>
                    <p class="card-text">Puedes jugar a {{ config('duck-funk.name') }} seleccionando el avatar con el que quieras acceder al hotel desde la lista de tu izquierda.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
@endsection

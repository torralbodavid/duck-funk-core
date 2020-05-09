@extends('duck-funk-core::fuse.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">{{ core()->user() }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Veltrix</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Extra Pages</a></li>
            <li class="breadcrumb-item active">Blank page</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                @foreach($ranks as $rank)
                                    <div class="card text-white bg-primary">
                                        <div class="card-header">
                                            <h5 class="font-16 my-0"><i class="retro retro-owner_icon"></i> {{ $rank->title }}</h5>
                                        </div>
                                        <div class="card-body">
                                            @foreach($rank->users as $staff)
                                                <div class="media mb-4">
                                                    <img class="d-flex mr-3 rounded-circle" src="{{ $staff->figureImage(1, 'n', 3, 2) }}" alt="{{ $staff->username }}">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 font-16"><i class="retro {{ $staff->online ? 'retro-habbo_online_anim' : 'retro-habbo_offline' }}"></i> {{ $staff->username }}</h5>
                                                        {{ $staff->motto }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <h4 class="card-header font-16 mt-0">Staff del Hotel</h4>
                                    <div class="card-body">
                                        <h4 class="card-title font-16 mt-0">Estos son los staff del hotel</h4>
                                        <p class="card-text">Lorem ipsum dolor.</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <h4 class="card-header font-16 mt-0">¿Quieres ser uno de ellos?</h4>
                                    <div class="card-body">
                                        <h4 class="card-title font-16 mt-0">Lorem ipsum dolor</h4>
                                        <p class="card-text">Lorem ipsum dolor sit.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
@endsection

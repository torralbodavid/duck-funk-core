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
                    @guest
                        @include('duck-funk-core::fuse.home.guest.content')
                    @endguest
                    @auth
                        @include('duck-funk-core::fuse.home.auth.content')
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
@endsection

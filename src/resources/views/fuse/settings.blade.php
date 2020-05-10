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
                    <h4 class="mt-0 header-title">Ajustes de la cuenta</h4>
                    <p class="text-muted mb-4">Desde aquí podras hacer los cambios a tu cuenta.</p>

                    <form id="avatar_settings" method="POST" action="{{ $page->route }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email"
                                       value="{{ core()->user()->mail }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Contraseña actual</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="current_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Contraseña nueva</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirm" class="col-sm-2 col-form-label">Confirma nueva contraseña</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                        </div>

                        @if($errors->any())
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 float-right">
                                    <div class="alert alert-danger" role="alert">
                                        {{ trans($errors->first()) }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 float-right">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="float-right">
                            <input class="btn btn-success" type="submit" value="Salvar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <x-core-captcha form="avatar_settings"/>
@endsection

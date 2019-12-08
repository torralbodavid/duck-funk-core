@extends('duck-funk-core::layouts.master-without-nav')

@section('css')
@endsection

@section('content')
    <body class="bg-primary">
    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-white"><i class="fas fa-user-lock h2"></i></a>
    </div>

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern shadow-none">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <h2>{{ config('duck-funk.name') }}</h2>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-18 text-center">{{ __('Confirm Password') }}</h4>

                                <div class="alert alert-info fade show mb-0" role="alert">
                                    <i class="mdi mdi-alert-circle-outline mr-2"></i>
                                    {{ __('Please confirm your password before continuing.') }}

                                    <i class="mdi mdi-alert-circle-outline mr-2"></i>
                                    {{ __('We won\'t ask for your password again for a few hours.') }}
                                </div>

                                <br>

                                <form method="POST" action="{{ route('password.confirm') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" placeholder="********">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Confirm Password') }}</button>
                                        </div>
                                    </div>

                                    @error('password')
                                    <div class="alert alert-danger fade show mb-0" role="alert">
                                        <i class="mdi mdi-alert-circle-outline mr-2"></i>
                                        {{ $message }}
                                    </div>
                                    <br>
                                    @enderror
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center text-white-50">
                        <div class="alert alert-secondary" role="alert">
                            <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

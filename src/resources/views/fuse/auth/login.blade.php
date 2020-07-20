@extends('duck-funk-core::fuse.layouts.without-login')

@section('content')
    <div class="min-h-screen bg-white flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm">
                <div>
                    <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg"
                         alt="Workflow">
                    <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
                        Inicia sesión ahora en {{ config('duck-funk.name') }}
                    </h2>
                    <p class="mt-2 text-sm leading-5 text-gray-600 max-w">
                        O
                        <a href="#"
                           class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            regístrate gratis
                        </a>
                    </p>
                </div>

                <div class="mt-8">

                    @if ($errors->any())
                        <div class="rounded-md bg-red-50 p-4 mb-8">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm leading-5 font-medium text-red-800">
                                        {{ $errors->first() }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div>
                        <div>
                            <p class="text-sm leading-5 font-medium text-gray-700">
                                Inicia sesión con
                            </p>

                            <div class="mt-1 grid ">
                                <div>
                                    <span class="w-full inline-flex rounded-md shadow-sm">
                  <button type="button"
                          class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition duration-150 ease-in-out"
                          aria-label="Sign in with Facebook">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                            d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z"
                            clip-rule="evenodd"/>
                    </svg>
                  </button>
                </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm leading-5">
              <span class="px-2 bg-white text-gray-500">
                O continua con
              </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <form id="login" method="POST" action="{{ route('login') }}">
                            @csrf
                            @honeypot
                            <div>
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('E-Mail Address') }}
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="mail" name="mail" value="{{ old('mail') }}" autocomplete="mail" autofocus type="mail" required
                                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('Password') }}
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="password" name="password" type="password" required autocomplete="current-password"
                                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-between">
                                <div class="flex items-center">
                                    <input name="remember" id="remember"
                                           {{ old('remember') ? 'checked' : '' }} type="checkbox"
                                           class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                    <label for="remember" class="ml-2 block text-sm leading-5 text-gray-900">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <div class="text-sm leading-5">
                                        <a href="{{ route('password.request') }}"
                                           class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-6">
              <span class="block w-full rounded-md shadow-sm">
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                  {{ __('Login') }}
                </button>
              </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                 src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                 alt="">
        </div>
    </div>
    <x-core-captcha form="login"/>
@endsection

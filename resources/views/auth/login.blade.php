@extends('layouts.app')

@section('content')
    <div class="custom-container pt-4">
        <div class="flex flex-wrap justify-center">
            <div class="px-4 md:w-2/3">
                <div class="relative flex flex-col min-w-0 break-words border border-gray-300 rounded border-1">
                    <div class="px-6 py-3 mb-0 text-gray-900 bg-gray-200 border-gray-300 border-b-1">{{ __('Login') }}
                    </div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="flex flex-wrap mb-3">
                                <label for="email"
                                    class="pt-2 pb-2 pl-4 pr-4 mb-0 leading-normal md:w-1/3 text-md-end">{{ __('Email Address') }}</label>

                                <div class="pl-4 pr-4 md:w-1/2">
                                    <input id="email" type="email"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal  text-gray-800 border border-gray-200 rounded @error('email') bg-red-700 @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-3">
                                <label for="password"
                                    class="pt-2 pb-2 pl-4 pr-4 mb-0 leading-normal md:w-1/3 text-md-end">{{ __('Wachtwoord') }}</label>

                                <div class="pl-4 pr-4 md:w-1/2">
                                    <input id="password" type="password"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal  text-gray-800 border border-gray-200 rounded @error('password') bg-red-700 @enderror"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-3">
                                <div class="pl-4 pr-4 md:w-1/2 md:mx-1/3">
                                    <div class="relative block mb-2">
                                        <input class="absolute mt-1 " type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="pl-6 mb-0 text-gray-700" for="remember">
                                            {{ __('Ingelogd blijven') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-0">
                                <div class="px-4 md:w-2/3 md:mx-1/3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-secondary" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Wachtwoord Vergeten?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

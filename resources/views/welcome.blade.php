<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-devie-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loginStyles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
</head>

<body>
    <img class="wave" src="{{ asset('assets/img/wavered.png') }}" alt="">
    <div class="contenedor">
        <div class="img">
            <img src="{{ asset('assets/img/camping1.svg') }}">
        </div>
        <div class="contenido-login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img src="{{ asset('assets/img/campin.png') }}">
                <h2>CLUBES</h2>
                <div class="input-div dni">
                    <div class="1">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="div">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="1">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="div">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                    </div>
                </div>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Crear una cuenta</a>
                @endif
                <x-button class="btn">
                    {{ __('Log in') }}
                </x-button>
            </form>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- FontAwesome --}}
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">
        <script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles 
        tailwind-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- A tag underline removal  --}}
        <link rel="stylesheet" href="{{ asset('assets/css/underline.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @if (is_null(Auth::user()->director))
                @if (is_null(Auth::user()->member))
                    @include('layouts.navigation')
                @else
                    @include('layouts.membernav')
                @endif
            @else
                @if (Auth::user()->director->rol < 6)
                    @include('layouts.navigation')    
                @else
                    @include('layouts.directornav')
                @endif
            @endif
            
            
            

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

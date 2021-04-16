<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AVN</title>
    @include('libraries')
</head>
    <body class="hold-transition sidebar-mini">
      {{-- check if is director --}}
      @if (Auth::user()->directorinfo != null)

        {{-- this is director of category --}}
        @if (Auth::user()->directorinfo->rol > 2)
          @include('usernav')          
        @endif  

        {{-- This is a director --}}
        @if (Auth::user()->directorinfo->rol < 3)
          @include('directornav')    
        @endif

      @else
        {{-- this is lowest tier a member --}}
        @include('miembronav')
      @endif
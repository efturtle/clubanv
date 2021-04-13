<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AVN</title>
    @include('libraries')
</head>
    <body class="hold-transition sidebar-mini">
      @if (Auth::user()->directorinfo->id !=0)
        @if (Auth::user()->directorinfo->rol > 2)
          @include('usernav')          
        @endif
        @if (Auth::user()->directorinfo->rol < 3)
          @include('directornav')    
        @endif
      @endif
      
      
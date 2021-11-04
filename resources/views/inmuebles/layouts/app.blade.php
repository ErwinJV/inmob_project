<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title class="capitalize">@yield('title')</title>

        <!-- Fonts -->
      

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('css') 
         
        @livewireStyles
        
       
    

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    
    <body>
       
       <x-nav />
      
        @yield('content')
        
       
        
        
        
        @yield('js')
        
        @livewireScripts
        
         <script src="{{asset('js/all.min.js')}}"></script>
    
    </body>
    
</html>

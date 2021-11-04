@extends('inmuebles.layouts.app')

@section('title', 'Inmob Project - '.$inmueble->title)

@section('css')

   <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

@endsection


@section('content')
  
 @include('inmuebles.partials.inmob-detail')

@endsection

@section('js')
 
   <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
   <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
   
   <script>
   
      $(document).ready(function (){
       
       
       $(".owl-carousel").owlCarousel({
          
          items:1,
          margin:10,
          nav:true,
          
       
       })
      
      
      })
   
   
   </script>
   
  

@endsection

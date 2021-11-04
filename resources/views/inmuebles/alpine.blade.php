@extends('inmuebles.layouts.app')

@section('title', 'Inicio')

@section('css')

  <style>
   
   .hidden{
   
      display:none;
   }
  
  </style>

@endsection

@section('content')

 <h1 class="text-2xl">Inicializar variables y elementos dinamicos</h1>

 <div class = "bg-blue-100 bg-opacity-75" x-data="data()" x-init="start()" @click.away="close()">
  
   <button :disabled="open" @click="isOpen()">Menu</button>
   
   <nav class="hidden" :class="{'hidden': !open }"  >
    
    <ul>
    
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
    
    </ul>
   
   </nav>
   
  
 
 </div>
 
 <h1 class="text-2xl ">Sincronizar inputs con x-model</h1>
 
 <div x-data="{mensaje: null}">
 
     <input type = "text" x-model="mensaje">
     
     <button @click="$refs.msj.innerText=mensaje">Enviar</button>
     
     <p x-ref="msj"></p>
 </div>
 
 
 <h1 class="text-2xl ">Condicionales</h1>
 
 <div x-data="info()">
 
 <ul>
  
  <template x-for="product in Object.values(products)" >
   
    <li>
      <span x-text="product.stock"></span> -
      <span x-text="product.name"></span>
    
     <template x-if="product.stock == 0">
       <span>(Sin stock)</span>
     </template>
    
    
    </li>
  
  </template>
 
 </ul>
 
 
 </div>
 
  <h1 class="text-2xl ">Eventos</h1>
  
  <div x-data="{ screen : true }" @resize.window="screen = window.outerWidth > 768 ? true : false">
  
  <p x-show="screen">
    Este mensaje solo se mostrara desde una panatalla grande
  </p>
  
 <!-- <input type = "text" x-model="mnsj" @keydown.ctrl.a="console.log( mnsj )"> -->
  
  
<!-- 
 <form action="" @submit.prevent="console.log(mnsj)">
  
       <input type="text" x-model="mnsj">
      
      
       <button @click.away="console.log('haz hecho click fuera del boton')">Enviar</button>
      
  </form> -->
  </div>
  
  
   <h1 class="text-2xl ">Metodos magicos</h1>
   
   <div x-data>
   
   <input type="text" @input="console.log($event.target.value)">
   
    <!-- <button @click="$refs.nombre.innerHTML='Texto cambiado'">
      Hazme click
     </button>
     
     <p x-ref="nombre">Un texto</p> -->
   
   </div>
   
   
   <div x-data="{texto:null}">
   
    <input type="text" x-model="texto" @input="$dispatch('custom-event', texto)">
   
   </div>
   
   <div x-data="{texto:null}">
   
     <input type="text" x-model="texto" @custom-event.window="texto = $event.detail">
   
   </div>
   
    <h1 class="text-2xl text-pink-700 ">Comunicacion entre Alpine.js y Livewire</h1>
    
    @livewire('alpine')

 


@endsection

@section('js')
 
 <script>
    
    function info () {
       return {
       
        products: {
         
        1:{
             id: 1,
             name: 'Camisa',
             stock: 5
             
          },
          
          2:{
             id: 2,
             name: 'Pantalon',
             stock: 12
             
          },
          
         3:{
             id: 3,
             name: 'Casaca',
             stock: 0
             
          },
          
       4:{
             id: 4,
             name: 'Boxer',
             stock: 21
             
          }
         
       }
    }
    
    }
    
     function hazmeClick () {
      
     
     
     }
    
    
    
    
    function data () {
       
      
       
       
      return {
       
         open: null,
         start () {
           
           this.open = false
           
         },
         isOpen () {
         
            this.open = !this.open
         },
         close () {
         
             this.open = false
         }
         
      }
       
    }
 
 </script>
 
 
@endsection

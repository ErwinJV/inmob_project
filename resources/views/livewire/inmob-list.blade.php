<section wire:init="loadStates"  class="bg-white py-8 min-h-screen">

 <div  class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

 {{--Filtros de busqueda--}}
 
 <div class="bg-blue-600  w-full min-h-24  rounded-lg py-2 md:py-0 shadow-lg  ">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-1 md:py-4">
    <div class="flex items-center justify-between md:justify-start">
      <!-- Filter Trigger -->
      
      <label class="text-white md:hidden  rounded-lg   p-1 cursor-pointer flex justify-center items-center">
        
         <i @click="$dispatch('open-filters')" class="fas fa-filter ml-2 text-white"></i>
      </label>
      
      <!-- ./ Filter Trigger -->

     

      <div class="flex items-center space-x-4">
        <div class="relative hidden md:block">
          <input wire:model="sector" type="search" class="pl-10 pr-2 h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none" placeholder="Ingrese direccion...">
          <svg class="h-6 w-6 text-gray-300 ml-2 mt-2 stroke-current absolute top-0 left-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        
        <div class="relative hidden md:block">
          <select wire:model="status" class="pl-10 pr-auto h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none">
           <option value = 0 selected >Todos</option>
        
            @foreach($estados as $key => $estado )
            
             <option value= "{{$estado}}">{{$key}}</option>
             
            @endforeach
            
          </select>
          <svg class="h-6 w-6 text-gray-300 ml-2 mt-2 stroke-current absolute top-0 left-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>

       
      </div>
      
       @livewire('show-map')
       
    </div>
    
   

    <!-- Filter Mobile -->
    <div x-data={open:false}  class="relative hidden md:hidden" :class="{'hidden': !open}" @open-filters.window="open = !open" >
      <input wire:model="sector" type="search" class="mt-1 w-full pl-10 pr-2 h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none" placeholder="Search">

      <svg class="h-6 w-6 text-gray-300 ml-2 mt-3 stroke-current absolute top-0 left-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </div>
    
    <div x-data={open:false}   class="relative hidden md:hidden" :class="{'hidden': !open}" @open-filters.window="open = !open" >
      <select wire:model="status" type="search" class="mt-1 w-full pl-10 pr-2 h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none" >
        <option value = 0 selected >Todos</option>
        
            @foreach($estados as $key => $estado )
            
             <option value= "{{$estado}}">{{$key}}</option>
             
            @endforeach
    
      </select>
      <svg class="h-6 w-6 text-gray-300 ml-2 mt-3 stroke-current absolute top-0 left-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </div>
    <!-- ./ Filter Mobile -->

  </div>
</div>
     
 {{--Preloader--}}
    
 <div wire:loading wire:target="sector,status" class="w-full h-80 ">
     
     <img class="mx-auto my-32 w-80 h-64" src="{{Storage::url('landin_page/preloader.gif')}}">
     
 </div>
    

  {{--Listado de Inmuebles--}}
           
   
     @if(count($inmuebles))     
         
        @foreach($inmuebles as $inmueble) 
            
            <div wire:loading.remove wire:target="sector,status"  class="animate__animated animate__fadeIn w-full md:w-1/3 xl:w-1/4 p-6 flex mt-3 flex-col  ">
                 
                <a href="{{route('inmuebles.detail', $inmueble)}}" target="_blank">
                    <img class="hover:grow hover:shadow-lg rounded-lg" src="{{Storage::url($inmueble->images[0]->url)}}">
                    <div class="pt-3 flex items-center justify-between">
                        <p class="text-1/2xl w-full">{{$inmueble->title}}</p>
                        
                        
                        <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                        </svg>
                    </div>
                    <p class="pt-1 font-bold text-gray-900">{{$inmueble->locality}}</p>
                    <p class="pt-1 text-gray-900">${{$inmueble->price}}</p>
                    
                </a>
            </div>
           

           @endforeach

       
        
        
         @if ($inmuebles->hasPages())

              <div class="px-6 py-3">
                          
                 {{$inmuebles->links()}}
         
               </div>
                        
        @endif 
         

    
      @else 
      
         
        @if(session()->has('message'))
        
        {!! session('message') !!}
        
        @endif
        
        
                
     @endif
     
      
     
     
    
     
     
    </div> 
     
 </section>
 


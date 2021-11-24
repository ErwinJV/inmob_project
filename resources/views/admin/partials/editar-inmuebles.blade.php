<div class="mx-3">    
     
       <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Titulo</label>
            <input wire:model="inmueble.title" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Apartamento en Residencias Juan de Tal" required="">
               
               @error('inmueble.title')
                      <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
               @enderror
        </div>
       
        <div class="mb-6"  wire:ignore >
            <label class="text-xl font-medium text-gray-900 block mb-2">Descripcion</label>
            
            <textarea  id="descEdit" class=" text-gray-900 rounded-lg " rows=6 >
               
            </textarea>
            
        </div>
        
        @error('inmueble.desc')
          <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
             <strong class="font-bold">{{$message}}</strong>  
          </div>            
        @enderror
        
        <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Tipo de Inmueble</label>
            
            @foreach($categories as $category)
           
            @if($category->id == $inmueble->inmob_category_id)
                
                <label  class="text-base font-medium text-gray-900 block mb-2 capitalize">
                 <input wire:model="inmueble.inmob_category_id" type="radio"  class="mr-2 p-2" name="tipo" value="{{$category->id}}" selected >
                 {{$category->name}} 
                 </label>
             
              @else
                 
                 <label  class="text-base font-medium text-gray-900 block mb-2 capitalize">
                 <input wire:model="inmueble.inmob_category_id" type="radio"  class="mr-2 p-2" name="tipo" value="{{$category->id}}"  >
                 {{$category->name}}
                 </label>
             
              @endif
           
           
            @endforeach
           
           @error('inmueble.inmob_category_id')
                      <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
           @enderror
        </div>
        
          <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Status</label>
            
            @foreach($statusContent as $key => $value)
            
              @if($value == $inmueble->status)
            
                <label  class="text-base font-medium text-gray-900 block mb-2">
                 <input wire:model="inmueble.status" type="radio" class="mr-2 p-2" name="status" value="{{$value}}" selected >
                  {{$key}}
                 </label>
             @else 
               <label  class="text-base font-medium text-gray-900 block mb-2">
                 <input wire:model="inmueble.status" type="radio" class="mr-2 p-2" name="status" value="{{$value}}"  >
                  {{$key}}
                 </label>
               
             @endif
           @endforeach  
            
           @error('inmueble.status')
                      <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
           @enderror
           
        </div>
        
        <div class="mb-6">
          
          <label  class="text-xl font-medium text-gray-900 block mb-2">Contenido del Inmueble</label>
          
           <div class="flex w-full mb-3">
             
             <i class="fas fa-bath self-center text-xl"></i>
             <select wire:model="inmueble.bath" class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2" >
               <option class="mr-2" selected></option>
              @foreach($maxBaths as $value)
              
                @if($value == $inmueble->bath)
                
                 <option class="mr-2" value= "{{$value}}" selected>{{$value}}</option>
               @else
                 <option class="mr-2" value= "{{$value}}" >{{$value}}</option>
               
               @endif
              @endforeach
            
             </select>
             @error('inmueble.bath')
                      <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
             @enderror
           </div>
           
           <div class="flex w-full mb-3">
             
             <i class="fas fa-bed self-center "></i>
             <select wire:model="inmueble.hab" class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2" >
               <option class="mr-2" selected></option>
              
              @foreach($maxHabs as $value)
              
                @if($value == $inmueble->hab)
                
                 <option class="mr-2" value= "{{$value}}" selected>{{$value}}</option>
               @else
                 <option class="mr-2" value= "{{$value}}" >{{$value}}</option>
               
               @endif
              @endforeach
            
             </select>
             @error('inmueble.hab')
                  <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>    
             @enderror
           </div>
           <div class="flex w-full mb-3">
             
             <i class="fas fa-car self-center text-xl "></i>
             <select wire:model="inmueble.est" class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2" >
              <option class="mr-2" selected></option>
             @foreach($maxEstacionamientos as $value)
              
                @if($value == $inmueble->est)
                
                 <option class="mr-2" value= "{{$value}}" selected>{{$value}}</option>
               @else
                 <option class="mr-2" value= "{{$value}}" >{{$value}}</option>
               
               @endif
              @endforeach
            
             </select>
            @error('inmueble.est')
                   <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
            @enderror
           </div>
           
           <div class="flex w-full mb-3">
             
             <i class="fas fa-crop self-center text-xl "></i>
             <input wire:model="inmueble.size" type="number"  min=0 class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 inline  p-2" >
              
            
              @error('inmueble.area')
                     <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
              @enderror
           
           </div>
        
        
        </div>
        
        
   
    <div class="mb-6">
             <label  class="text-xl font-medium text-gray-900 block mb-2">Precio</label>
             
              <div class="flex flex-row">
                  <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker"><i class="fas fa-dollar-sign text-green-900"></i></span>
                  <input wire:model="inmueble.price" type="number"   class="bg-gray-50 border border-gray-300 text-green-900 font-bold sm:text-sm rounded-lg focus:ring-green-900 focus:border-green-900  inline p-2.5">
                   @error('inmueble.price')
                      <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
                   @enderror
              </div>
        </div>
        
        
        <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Localidad</label>
            <input wire:model="inmueble.locality" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Apartamento en Residencias Juan de Tal" required="">
               
               @error('inmueble.locality')
                     <span class="inline-block  py-2 px-1 bg-red-700 text-white my-2 font-bold">{{$message}}</span>
               @enderror
        </div>
        
        @include('admin.partials.edit-images')
     
  </div>   

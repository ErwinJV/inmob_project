     
  <div class="mx-3">    
     
       <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Titulo</label>
            <input wire:model="title" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Apartamento en Residencias Juan de Tal" required="">
               
               @error('title')
                     <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
               @enderror
        </div>
       
        <div class="mb-6" wire:ignore >
            <label  class="text-xl font-medium text-gray-900 block mb-2">Descripcion</label>
            <textarea wire:model="description" id = "desc"   class="text-gray-900 rounded-lg " rows= 6  >
            </textarea>
            
        </div>
        
         @error('description')
              <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                 <strong class="font-bold">{{$message}}</strong>  
              </div>       
          @enderror
        
        <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Tipo de Inmueble</label>
            
            @foreach($categories as $category)
           
            <label  class="text-base font-medium text-gray-900 block mb-2 capitalize">
             <input wire:model="category" type="radio" class="mr-2 p-2" name="tipo" value="{{$category->id}}" >
             {{$category->name}}
             </label>
             
            @endforeach
           
           @error('category')
                     <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
           @enderror
        </div>
        
          <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Status</label>
            
            @foreach($statusContent as $key => $value)
            
            <label  class="text-base font-medium text-gray-900 block mb-2">
             <input wire:model="status" type="radio" class="mr-2 p-2" name="status" value="{{$value}}" >
              {{$key}}
             </label>
          
           @endforeach  
            
           @error('status')
                     <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>>
           @enderror
           
        </div>
        
        <div class="mb-6">
          
          <label  class="text-xl font-medium text-gray-900 block mb-2">Contenido del Inmueble</label>
          
           <div class="flex w-full mb-3">
             
             <i class="fas fa-bath self-center text-xl"></i>
             <select wire:model="bath" class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2" >
               <option class="mr-2" selected></option>
              @foreach($maxBaths as $value)
              
                 <option class="mr-2" value= "{{$value}}">{{$value}}</option>
               
              @endforeach
            
             </select>
             @error('bath')
                    <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
             @enderror
           </div>
           
           <div class="flex w-full mb-3">
             
             <i class="fas fa-bed self-center "></i>
             <select wire:model="hab" class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2" >
               <option class="mr-2" selected></option>
              
              @foreach($maxHabs as $value)
              
                 <option class="mr-2" value= "{{$value}}">{{$value}}</option>
               
              @endforeach
            
             </select>
             @error('hab')
                    <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
             @enderror
           </div>
           <div class="flex w-full mb-3">
             
             <i class="fas fa-car self-center text-xl "></i>
             <select wire:model="estacionamientos" class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2" >
              <option class="mr-2" selected></option>
              @foreach($maxEstacionamientos as $value)
              
                 <option class="mr-2" value= "{{$value}}">{{$value}}</option>
               
              @endforeach
            
             </select>
            @error('estacionamientos')
                    <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
            @enderror
           </div>
           
           <div class="flex w-full mb-3">
             
             <i class="fas fa-crop self-center text-xl "></i>
             <input wire:model="area" type="number" min=0 class = "ml-4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 inline  p-2" >
              
            
              @error('area')<div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div><span class="inline-block  py-2 px-1 bg-red-700 text-white my-2 font-bold">{{$message}}</span>
              @enderror
           
           </div>
        
        
        </div>
        
        
   
    <div class="mb-6">
             <label for="price" class="text-xl font-medium text-gray-900 block mb-2">Precio</label>
             
              <div class="flex flex-row">
                  <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker"><i class="fas fa-dollar-sign text-green-900"></i></span>
                  <input wire:model="price" type="number"   class="bg-gray-50 border border-gray-300 text-green-900 font-bold sm:text-sm rounded-lg focus:ring-green-900 focus:border-green-900  inline p-2.5">
                   @error('price')
                    <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
                   @enderror
              </div>
        </div>
        
        
        <div class="mb-6">
            <label  class="text-xl font-medium text-gray-900 block mb-2">Localidad</label>
            <input wire:model="locality" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Apartamento en Residencias Juan de Tal" required="">
               
               @error('locality')
                    <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
               @enderror
        </div>
        
         @include('admin.partials.upload-images')
     
  </div>   

 


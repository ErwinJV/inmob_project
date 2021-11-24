<div  class="mb-6 flex flex-col w-full justify-center items-center ">
           <label
              class="
                w-64
                mb-4
                flex flex-col
                items-center
                px-4
                py-6
                bg-white
                rounded-md
                shadow-md
                tracking-wide
                uppercase
                border border-blue
                cursor-pointer
                hover:bg-purple-600 hover:text-white
                text-purple-600
                ease-linear
                transition-all
                duration-150
              "
                >
                  <i class="fas fa-cloud-upload-alt fa-3x"></i>
                  <span class="mt-2 text-base leading-normal">Seleccione imagen</span>
                  <input  wire:model="items"  type="file" class="hidden"   multiple />
                   
                   
                   
               </label> 
               
               @error('items.*')
                     <div class="bg-red-100 m-2 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">  
                          <strong class="font-bold">{{$message}}</strong>  
                    </div>
               @enderror
               
           
              
               <div  id="preview-images" class="w-full h-auto p-4 border-dashed grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4  border-4 border-blue-700 rounded-lg overflow-y-auto ">
                
                @if($photos)
                 
                     @foreach($photos as $llave => $photo)
                     
                     <div class="thumbnail  relative  m-4 rounded-lg" data-id="{{$llave}}" >
                         
                         <img  class="object-cover object-center w-full h-full rounded-lg shadow-2xl" src="{{$photo->temporaryUrl()}}">
                         <button wire:click="deleteImage({{$llave}})" class="absolute top-0 right-0 flex bg-black text-white  rounded-full w-auto h-auto p-2 shadow-xl"><i class="fas fa-trash self-center"></i></button>
                      
                     </div>
                     
                     @endforeach
             
               @endif  
               
               </div> 
              
                    
                   
        </div>
   

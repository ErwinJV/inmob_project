<div >
 
 
 
  
  
  
<div class="flex flex-col mt-5">

  <div class="w-full flex justify-between my-4  ">
  <x-jet-input wire:model="search" class="mt-5 h-7 ml-4 shadow-xl border border-black p-4" maxlenght="30" placeholder="Buscar..."/>
  @livewire('ingresar-inmueble')
  
  </div>
  
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs  font-medium text-gray-500 uppercase tracking-wider">
                Titulo
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Categoria
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Publicado
              </th>
             
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Ver</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Editar</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Eliminar</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
           
           @if(count($inmuebles)) 
             @foreach($inmuebles as $item)
            
                
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                       @if(count($item->images))
                       
                    
                        <img loading="lazy" class="h-10 w-10 rounded-full" src="{{Storage::url($item->images[0]->url)}}" alt="">
                       @endif
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          
                        </div>
                        <div class="text-sm text-gray-500">
                          {{$item->title}}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm capitalize  text-gray-900">{{$item->inmobCategory->name}}</div>
                   
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active    
                    </span>
                  </td>
                  
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a target = "_blank" href="{{route('inmuebles.detail', $item)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded shadow-xl" >
                      <i class="fas fa-eye"></i>
                   </a>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button wire:click="edit('{{$item->slug}}')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded shadow-xl" >
                      <i class="fas fa-edit"></i>
                   </button>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                   <button wire:click="$emit('alert-delete', '{{$item->slug}}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded shadow-xl" >
                      <i class="fas fa-trash"></i>
                   </button>
                  </td>
                </tr>
           @endforeach
           
           
           
         
            <!-- More people... -->
          </tbody>
        </table>
          
          @if($inmuebles->hasPages())
           
           <div class="mt-auto">
            {{$inmuebles->links()}}
           </div> 
           
            
           @endif
        
      @endif
      </div>
    </div>
  </div>
</div>

{{--Modal para actualizar Inmuebles--}}
  
  <x-jet-dialog-modal wire:model="open_edit" >
     
     <x-slot name="title" class="overflow-y-auto">
      Ingresar Inmueble   
     </x-slot>
     
     <x-slot name="content"  >
       
       <div class="h-80 mx-5 overflow-y-auto overflow-x-hidden">
       
       @if($inmueble)
       
        @include('admin.partials.editar-inmuebles')
      
       @endif
       </div>
       
     </x-slot>
     
     <x-slot name="footer">
       
   <button wire:click="$set('open_edit', false)" @click="$dispatch('reset-view-image')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" >
        Cerrar
   </button>
     </x-slot>
      
     
    </x-jet-dialog-modal>
    
     @push('js')
      <script defer>
                  
      
      
       Livewire.on('edit', function () {
                
                    ClassicEditor
                              
                              .create(document.querySelector('#descEdit'))
                               
                              
                              
                              .then(function(editor){
                              
                                 let desc = document.getElementById('descEdit')
                                 
                                 console.log(desc)
                                 
                                 editor.model.document.on('change:data', () => {
                                    
                                  @this.set('inmueble.desc', editor.getData())
                                    
                                 })
                              })
                              .catch( error => {
                                  
                                  console.log(error)
                                 
                              })
                       
                  
                 })
                  
         </script>
     @endpush
    
   
</div>



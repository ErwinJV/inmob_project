<div class="flex self-center h-full items-center mr-4 mt-3">
    <button wire:click="$set('open', true)" class=" bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 shadow-xl rounded">
     <i class="fas fa-plus text-white"></i> Nuevo
    </button>
    
    <x-jet-dialog-modal wire:model="open" >
     
     <x-slot name="title" class="overflow-y-auto">
      Ingresar Inmueble
     </x-slot>
     
     <x-slot name="content"  >
       
       <div class="h-80 mx-5 overflow-y-auto overflow-x-hidden">
        
        @include('admin.partials.ingresar-inmuebles')
        
       </div>
       
     </x-slot>
     
     <x-slot name="footer">
       
   <button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" >
        Guardar
   </button>
     </x-slot>
    
    </x-jet-dialog-modal>
   
    <script defer>
     

     
     ClassicEditor
              .create(document.querySelector('#desc'))
              .then(function(editor){
              
                 editor.model.document.on('change:data', () => {
                    
                    @this.set('description', editor.getData())
                    
                 })
              })
              .catch( error => {
                  
                  console.log(error)
                 
              })
    
    </script>
    
</div>

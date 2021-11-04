<div class="ml-auto">
   <!-- Map Trigger -->
      <label wire:click="$set('open', true)" class="text-white  rounded-lg ml-auto bg-blue-800 hover:bg-blue-700 p-2 cursor-pointer flex justify-center items-center">
        Ver mapa<i  @click="$dispatch('')" class="fas fa-map ml-2 animate-pulse shadow-lg text-white"></i>
      </label>
      <!-- ./ Map Trigger -->
      
      <!--Modal -->
      
      <x-jet-dialog-modal wire:model="open" class="w-full h-10">
      
      <x-slot name="title">
       Seleccione el inmueble:
      </x-slot>
      
      <x-slot name="content">
       <div id="myMap" class=" h-80 overflow-y-auto">
      
       </div>
      </x-slot>
      
      <x-slot name="footer">
      
      </x-slot>
      
      </x-jet-dialog-modal>
      
      
    <!-- ./ Modal -->
</div>

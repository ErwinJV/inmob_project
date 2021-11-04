<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inmueble;

class InmobList extends Component
{
    use WithPagination;
    
    public $status;
    public $sector;
    public $category;
    public $readyToLoad = false;
    
    
   
    
    public function mount($category)
    {
      $this->category = $category;
    
    }
    
    public function loadStates()
    {
     
     $this->readyToLoad = true;
    
    }
    
   
    

    public function render()
    {
       
      $estados = ['Todos' => 0, 'Venta' => 1, 'Alquiler' => 2];   
     
        //Verificamos que el componente este listo
         
         if($this->readyToLoad){
              
               //Decidimos que consulta hacer dependiendo del valor de status
                   if($this->status != 0){ 
                   
                      $inmuebles = Inmueble::where('inmob_category_id', $this->category->id)
                                        ->where('locality','like', '%' . $this->sector . '%')
                                        ->where('status', $this->status)
                                        ->latest('id')
                                        ->paginate(8);
                    } else {
                        
                        $inmuebles = Inmueble::where('inmob_category_id', $this->category->id)
                                        ->where('locality','like', '%' . $this->sector . '%')
                                        ->latest('id')
                                        ->paginate(8);
                      }
                 //Si el resultado de la consulta es 0, almacenamos un mensaje de sesion
                      
                  if(!count($inmuebles)){
                  
                      session()->flash('message',
                      
                      '<div class="rounded-b text-blue-900 my-32 mx-auto px-4 py-3 shadow-md" role="alert">
                          <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                              
                              <p class="font-bold">Lo sentimos!</p>
                              <p class="text-sm">No hay resultados para su busqueda.</p>
                            </div>
                          </div>
                        </div>' );
                  
                  }
          //Si el componente no esta listo, el valor de inmuebles sera un array vacio   
         
         } else{
         
            $inmuebles = [];   
         
         }
            
            
        //Renderizamos el componente y le pasamos la consulta almacenada y la variable estados
       
        return view('livewire.inmob-list', compact('inmuebles','estados'));   
  }
       
    
}

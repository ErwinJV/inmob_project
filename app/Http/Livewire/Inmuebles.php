<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\{Inmueble,InmobCategory,Image};
use Illuminate\Support\Facades\Storage; 

class Inmuebles extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    public $search, $inmueble = [], $items = [], $i = [];
    
    public $open_edit = false;
    
    protected $listeners = ['render' => 'render', 'orderImagesEdit', 'delete']; 
    
    protected $rules = [
      
      'inmueble.title' => 'required|min:25|max:30',
      'inmueble.desc' => 'required',
      'inmueble.status' => 'required',
      'inmueble.inmob_category_id' => 'required',
      'inmueble.locality' => 'required',
      'inmueble.bath' => 'required',
      'inmueble.hab' => 'required',
      'inmueble.est' => 'required',
      'inmueble.area' => 'required',
      'inmueble.size' => 'required',
      'inmueble.price' => 'required',
      'inmueble.images.*' => 'required|image|max:1024'
      
    
     ];
     
    
     public function updatingSearch()
    {
    
       $this->resetPage();
    
    }
    
    
    public function edit(Inmueble $inmueble)
    {
      
      $this->inmueble = $inmueble;
      $this->open_edit = true;
      $this->emit('preview-edit');
      $this->emit('edit');
    
    
    }
    
    public function updatedInmuebleTitle()
    {
       
       $this->validate([
          
           'inmueble.title' => 'required|min:25|max:30'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
     public function updatedInmuebleDesc()
    {
       
       $this->validate([
          
           'inmueble.desc' => 'required|min:150|max:300'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
    public function updatedInmuebleStatus()
    {
       
       $this->validate([
          
           'inmueble.status' => 'required'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
    public function updatedInmuebleInmob_category_id()
    {
       
       $this->validate([
          
           'inmueble.inmob_category_id' => 'required'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
    public function updatedInmuebleLocality()
    {
       
       $this->validate([
          
           'inmueble.locality' => 'required|max:30'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
     
    public function updatedInmuebleArea()
    {
       
       $this->validate([
          
           'inmueble.area' => 'required'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
    public function updatedInmuebleBath()
    {
       
       $this->validate([
          
           'inmueble.bath' => 'required'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
    public function updatedInmuebleHab()
    {
       
       $this->validate([
          
           'inmueble.hab' => 'required'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
     public function updatedInmuebleEst()
    {
       
       $this->validate([
          
           'inmueble.est' => 'required'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
    public function updatedInmueblePrice()
    {
       
       $this->validate([
          
           'inmueble.price' => 'required'
       
       ]);
       
       $this->inmueble->save();
       $this->emit('render');
       
       
      
    }
    
    public function updatingItems()
    {
             
            $this->validate([
               'items.*' => 'image|max:1024',
           
            ]);
           

            foreach($this->items as $item){
            
              
           
              $url = $item->store('public/inmuebles');
                
              $this->inmueble->images()->create([
                'url' =>  str_replace('public/', '', $url),
                'user_id' => auth()->user()->id
               
               ]);
              
           
           }
         
          $id = $this->inmueble->id;
          $this->inmueble = Inmueble::find($id);
    }
    
    public function deleteImage($id)
    {
    
    
       $i = Image::find($id);     
       $i->delete();
       $id = $this->inmueble->id;
       $this->inmueble = Inmueble::find($id);
        
        
        
    }
    

    
    public function orderImagesEdit($order)
    {
      
       $clon = [];
       
       foreach($order as $key => $value){
            
            $clon[$key] = $this->inmueble->images[$value];
            
            $image = Image::find($this->inmueble->images[$key]->id);
            $image->delete(); 
            
            
                
         }
          
       foreach($clon as $value){
                
              $this->inmueble->images()->create([
                'url' =>  $value->url,
                'user_id' => auth()->user()->id
               
               ]);
              
            
                
         }
           
        $id = $this->inmueble->id;
        $this->inmueble = Inmueble::find($id); 
    }
    
    
    public function delete(Inmueble $inmueble)
    {
      
      $inmueble->delete();
      $this->emit('render');
    
    }
   
    public function render()
    {
        //Parametros de entradas
        $maxBaths = [1, 2, 3, 4, 5, 6,7,8,9,10];
        $maxHabs = [1, 2, 3, 4, 
                    5, 6,7,8,9,10,
                    11,12,13,14,15];
       
        $maxEstacionamientos = [1, 2, 3, 4, 5, 6,7,8,
                                9,10,11,12,13,14,15,
                                16,17,18,19,20,21,22,
                                23,24,25,26,27,28,29,30]; 
       
        $statusContent = ['En Alquiler' => '1', 'En Venta' => '2']; 
        $categories = InmobCategory::all();
        $inmuebles = Inmueble::where('user_id', auth()->user()->id )
                                     ->where('title', 'like', '%' .$this->search. '%')
                                     ->orWhere('locality', 'like', '%' .$this->search. '%')
                                     ->latest('id')
                                     ->paginate(8);
        
        return view('livewire.inmuebles', compact('inmuebles', 'categories','maxBaths',
                                                  'maxEstacionamientos','maxHabs','statusContent'));
    }
}

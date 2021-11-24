<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\{Inmueble,InmobCategory};

use Illuminate\Support\Str;


class IngresarInmueble extends Component
{  
    use WithFileUploads;
    
    protected $listeners = ['orderImages'];
    
    public $open = false;
    
  
   //Variables de la tabla inmueble
    public $title;
    public $description;
    public $status;
    public $category;
    public $locality;
    public $lat;
    public $long;
    public $bath;
    public $hab;
    public $estacionamientos;
    public $area;
    public $price;
     
  //Variables para la subida y previsualizacion de las imagenes
    public $items = [];
    public $photos = [];
    
    
    
    
   
    protected $rules = [
      
      'title' => 'required|max:40',
      'description' => 'required',
      'status' => 'required',
      'category' => 'required',
      'locality' => 'required',
      'bath' => 'required',
      'hab' => 'required',
      'estacionamientos' => 'required',
      'area' => 'required',
      'price' => 'required',
      'photos.*' => 'required|image|max:1024'
      
    
     ];
     
     
    public function updatingOpen()
    {
         
         $this->reset(['title','description','status','category','price','locality',
                      'bath','hab','estacionamientos','area','photos','items']);
       
    }
     
    public function updatedTitle()
    {
       $this->validate([
               'title' => 'required|max:40|min:25'
           
            ]);
        
        
    }
    
     public function updatedDescription()
    {
       $this->validate([
                'description' => 'required|min:40'
           
            ]);
       
    }
   
    
   
    public function updatedLocality()
    {
       $this->validate([
               'locality' => 'required|max:30'
           
            ]);
       
       
     
    }
    
   
   
    public function updatedItems()
    {
             
            $this->validate([
               'items.*' => 'image|max:1024',
           
            ]);
           

            foreach($this->items as $item){
            
              
           
              array_push($this->photos, $item);
              
           
           }
           
    }
    
    public function deleteImage($llave)
    {
    
        foreach($this->photos as $key => $photo) {
        
           if($key == $llave){
           
               unset($this->photos[$llave]);
           }
            
           
        }
    
    }
    

    
    public function orderImages($order)
    {
      
       $clon = [];
       
       foreach($order as $key => $value){
            
            $clon[$key] = $this->photos[$value];
                
                
         }
          
        $this->photos = $clon;
         
    }
    
    
    
    public function save()
    {
      
      $this->validate();
      
      $slug = Str::slug($this->title);
      
      $inmueble  = Inmueble::create([
        
        'title' => $this->title,
        'slug'  => $slug,
        'desc' => $this->description,
        'status' => $this->status,
        'price' => $this->price,
//        'long' => $this->long,
//        'alt' => $this->lat,
        'locality' => $this->locality,
        'bath' => $this->bath,
        'hab' => $this->hab,
        'est' => $this->estacionamientos,
        'size' => $this->area,
        'inmob_category_id' => $this->category,
        'user_id' => auth()->user()->id
        
        
        
        
      
      ]);
       
       foreach($this->photos as $photo){
             
          $url = $photo->store('public/inmuebles');
            
          $inmueble->images()->create([
            'url' =>  str_replace('public/', '', $url),
            'user_id' => auth()->user()->id
         ]);
               
        }
        
        $this->reset(['open','title','description','status','category','price','locality',
                      'bath','hab','estacionamientos','area','photos','items']);
                      
        $this->emit('render');
        $this->emit('alert', 'Nuevo registro exitoso!');
    }
   
    public function render()
    {
        
        //Parametros de entradas
        $maxBaths = [1, 2, 3, 4, 5, 6,7,8,9,10];
        $maxHabs = [1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15];
        $maxEstacionamientos = [1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,
                                16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]; 
       
        $statusContent = ['En Alquiler' => '1', 'En Venta' => '2']; 
        $categories = InmobCategory::all();
       
        return view('livewire.ingresar-inmueble', compact('categories', 'statusContent','maxBaths',
                                                          'maxHabs','maxEstacionamientos'));
    }
    
    
    
}

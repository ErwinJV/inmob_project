<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowMap extends Component
{
   
   public $open = false;
   
    public function render()
    {
        return view('livewire.show-map');
    }
}

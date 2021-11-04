<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\InmobCategory;

class Nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = InmobCategory::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = $this->categories;
        
        return view('components.nav', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{InmobCategory, Inmueble};



class InmuebleController extends Controller
{
    public function index($category,$status = null,$sector = null)
    {
    
       return view('inmuebles.index', compact('category', 'status','sector'));
       
    
    }
    
    public function show()
    {
      
      return view('inmuebles.show');
    
    }
    
    public function category(InmobCategory $category)
    {
    
          return view('inmuebles.category', compact('category'));
    
    }
    
    public function detail(Inmueble $inmueble)
    {
        
        return view('inmuebles.detail', compact('inmueble'));
     
    }
}

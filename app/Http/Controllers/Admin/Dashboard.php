<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
    
        return view('dashboard');
    
    }
    
    public function inmuebles()
    {
    
        return view('admin.inmuebles');
    
    }
}

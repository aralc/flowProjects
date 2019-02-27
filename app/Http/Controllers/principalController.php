<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class principalController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function inicio()
    {
        if(view()->Exists('principal'))
        {
            return view('principal');
        }
        else 
        {
            return "Error 404 - not found";
        }
    }
    
}

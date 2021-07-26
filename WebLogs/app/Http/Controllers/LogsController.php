<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(){
        return view("logs/create");
    }

    public function store(){
        
        $data = request()->validate([
                'Description' => 'required',
                'severity' => ' required'
        ]);
        
        //dd($data);

        \App\Models\Log::create($data);
    }

 
}

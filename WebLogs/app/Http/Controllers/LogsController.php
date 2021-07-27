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
                'severity' => ' required',
                'owner' => ' required',
                'forigenId' => ' required'
        ]);
        
        //dd($data);

        \App\Models\Log::create($data);
    }

    public function show($id){

        $logs = Log::where("severity", $id)->get();
    
        //dd($logs);

        return view("home")->with("logs", $logs);


    }


}

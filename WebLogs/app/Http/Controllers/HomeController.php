<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

        $logs = Log::all()->sortByDesc("created_at");
        
        

        return view("home")->with("logs", $logs);
    }


}

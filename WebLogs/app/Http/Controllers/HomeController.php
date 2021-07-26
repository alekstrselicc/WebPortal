<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view("home")->with("logs", Log::all());
        //return Log::all();
        //return view("home");
    }


}

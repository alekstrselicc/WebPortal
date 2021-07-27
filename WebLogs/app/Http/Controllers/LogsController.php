<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Exports\LogsExport;
use Excel;

use function Symfony\Component\String\b;

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

    public function exportExcelFile(){
        return Excel::download(new LogsExport, 'logs.xlsx');
    }

   


}

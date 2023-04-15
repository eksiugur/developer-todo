<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $developers = Developer::all();
        $datas["developerTasks"] = Developer::getPlan($developers->toArray());
        return view("home",$datas);
    }
}

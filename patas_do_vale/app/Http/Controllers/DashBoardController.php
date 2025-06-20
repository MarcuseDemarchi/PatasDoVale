<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Especies;

class DashBoardController extends Controller
{
    public function index(){
        $animais = Animal::all();
        $especies = Especies::all();
        return view('dashboard', compact('animais','especies'));
    }
}
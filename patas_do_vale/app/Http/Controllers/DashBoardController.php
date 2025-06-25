<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Especies;

class DashBoardController extends Controller
{
    public function index(Request $request){
        $filtro = $request->get('adotado', 'todos');

        $animaisQuery = Animal::query();

        if ($filtro == 'adotados') {
            $animaisQuery->whereIn('anicodigo', function($query) {
                $query->select('anicodigo')->from('tbdoacaoanimal');
            });
        } elseif ($filtro == 'nao_adotados') {
            $animaisQuery->whereNotIn('anicodigo', function($query) {
                $query->select('anicodigo')->from('tbdoacaoanimal');
            });
        }

        $animais = $animaisQuery->get();
        $especies = Especies::all();        
        $animaisAdotados = \App\Models\DoacaoAnimal::pluck('anicodigo')->toArray();

        return view('dashboard', compact('animais', 'especies', 'filtro', 'animaisAdotados'));                         
    }
}
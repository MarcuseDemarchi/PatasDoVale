<?php

namespace App\Http\Controllers;

use App\Models\DoacaoAnimal;
use App\Models\Pessoa;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoacaoAnimalController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->get('busca');
        $doacoes = \App\Models\DoacaoAnimal::with(['pessoa', 'animal']);

        if ($busca) {
            $doacoes->whereHas('pessoa', function($q) use ($busca) {
                $q->where('pesnome', 'like', '%' . $busca . '%');
            });
        }

        $doacoes = $doacoes->get();
        $pessoas = \App\Models\Pessoa::all();
        $animaisDisponiveis = \App\Models\Animal::whereNotIn('anicodigo', function($query) {
            $query->select('anicodigo')->from('tbdoacaoanimal');
        })->get();

    return view('adocoes.index', compact('doacoes', 'pessoas', 'animaisDisponiveis', 'busca'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pescodigo' => 'required|exists:tbpessoa,pescodigo',
            'anicodigo' => 'required|exists:tbanimais,anicodigo|unique:tbdoacaoanimal,anicodigo',
            'doaobservacao' => 'nullable|string|max:255',
        ]);

        DoacaoAnimal::create([
            'pescodigo' => $request->pescodigo,
            'anicodigo' => $request->anicodigo,
            'doadata' => now(),
            'doaobservacao' => $request->doaobservacao,
        ]);

        return redirect()->route('adocoes.index')->with('success', 'Adoção cadastrada com sucesso!');
    }

    public function destroy($id)
    {
        DoacaoAnimal::findOrFail($id)->delete();
        return redirect()->route('adocoes.index')->with('success', 'Adoção removida!');
    }
}
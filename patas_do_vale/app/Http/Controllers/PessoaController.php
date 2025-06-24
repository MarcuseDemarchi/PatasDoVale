<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Models\Estado;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::with('cidade')->get();
        $estados = Estado::all();
        return view('pessoas.index', compact('pessoas','estados'));
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesnome' => 'required|string|max:255',
            'pesdatanascimento' => 'required|date',
            'cidcodigo' => 'required|integer',
        ]);

        Pessoa::create($request->all());

        return redirect()->route('pessoas.index')->with('success', 'Pessoa cadastrada com sucesso.');
    }

    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $request->validate([
            'pesnome' => 'required|string|max:255',
            'pesdatanascimento' => 'required|date',
            'cidcodigo' => 'required|integer',
        ]);

        $pessoa->update($request->all());

        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso.');
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa excluída com sucesso.');
    }
}
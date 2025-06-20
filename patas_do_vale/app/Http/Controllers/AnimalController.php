<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {        
        $animais = Animal::all();
        return view('dashboard', compact('animais'));
    }

    public function show($id)
    {
        $animal = Animal::with('especie')->findOrFail($id);
        return view('animais.show', compact('animal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aninome' => 'required|max:255',
            'anipeso' => 'required|numeric',
            'aniespecie' => 'required|integer',
            'aniporte' => 'required|integer',
        ]);

        Animal::create([
            'anipelido' => $request->aninome,
            'aniespecie' => $request->aniespecie,
            'anipeso' => $request->anipeso,
            'aniporte' => $request->aniporte,
        ]);

        return redirect()->route('dashboard')->with('success', 'Animal cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('dashboard')->with('success', 'Animal removido com sucesso!');
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $especies = Especie::all();

        return view('animais.edit', compact('animal', 'especies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aninome' => 'required|max:255',
            'anipeso' => 'required|numeric',
            'aniespecie' => 'required|integer',
            'aniporte' => 'required|integer',
        ]);

        $animal = Animal::findOrFail($id);
        $animal->update([
            'anipelido' => $request->aninome,
            'aniespecie' => $request->aniespecie,
            'anipeso' => $request->anipeso,
            'aniporte' => $request->aniporte,
        ]);

        return redirect()->route('dashboard')->with('success', 'Animal atualizado com sucesso!');
    }
}

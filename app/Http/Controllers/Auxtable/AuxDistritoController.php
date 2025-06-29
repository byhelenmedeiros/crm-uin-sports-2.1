<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxDistrito;
use Illuminate\Http\Request;

class AuxDistritoController extends Controller
{
    public function index()
    {
        $items = AuxDistrito::get();
        return view('auxtables.distritos.index', compact('items'));
    }

    public function create()
    {
        // Não usado se fizer CRUD inline na tabela
        return view('auxtables.distritos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $distrito = AuxDistrito::create($validated);

        // Se for AJAX, devolve JSON para inserir inline
        if ($request->wantsJson()) {
            return response()->json($distrito, 201);
        }

        return redirect()->route('aux.distritos.index')
                         ->with('success', 'Distrito criado com sucesso.');
    }

    public function edit(AuxDistrito $distrito)
    {
        // Não usado se CRUD for inline
        return view('auxtables.distritos.edit', compact('distrito'));
    }

    public function update(Request $request, AuxDistrito $distrito)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $distrito->update($validated);

        if ($request->wantsJson()) {
            return response()->json($distrito);
        }

        return redirect()->route('aux.distritos.index')
                         ->with('success', 'Distrito atualizado com sucesso.');
    }

    public function destroy(AuxDistrito $distrito)
    {
        $distrito->delete();

        return redirect()->route('aux.distritos.index')
                         ->with('success', 'Distrito removido com sucesso.');
    }
}

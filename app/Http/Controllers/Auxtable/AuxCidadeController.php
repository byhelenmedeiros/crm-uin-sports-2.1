<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxtable\AuxCidade;
use Illuminate\Support\Facades\Log;

class AuxCidadeController extends Controller
{
       // 1) lista tudo e manda pro index.blade.php
    public function index()
    {
        $items = AuxCidade::all();
        return view('auxtables.cidades.index', compact('items'));
    }

    // 2) cria via criação inline (POST /aux/cidades)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxCidade::create($validated);

        return redirect()->route('aux.cidades.index')
                         ->with('success', 'Cidade criada com sucesso.');
    }

    // 3) atualiza via edição inline (PUT /aux/cidades/{id})
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $cidade = AuxCidade::findOrFail($id);
        $cidade->update($validated);

        return redirect()->route('aux.cidades.index')
                         ->with('success', 'Cidade atualizada com sucesso.');
    }

    // 4) exclui um item
    public function destroy($id)
    {
        $cidade = AuxCidade::findOrFail($id);
        $cidade->delete();

        Log::info("Cidade removida: {$id}");

        return redirect()->route('aux.cidades.index')
                         ->with('success', 'Cidade removida.');
    }

    // 5) exclusão em massa (POST /aux/cidades/mass-destroy)
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxCidade::destroy($ids);

        return redirect()->route('aux.cidades.index')
                         ->with('success', 'Cidades removidas em massa.');
    }
}

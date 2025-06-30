<?php

namespace App\Http\Controllers\Auxtable;

use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxPreco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuxPrecoController extends Controller
{
    // 1) lista tudo e manda pro index.blade.php
    public function index()
    {
        $items = AuxPreco::all();
        return view('auxtables.preco.index', compact('items'));
    }

    // 2) cria via criação inline (POST /aux/preco)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxPreco::create($validated);

        return redirect()
            ->route('auxtables.preco.index')
            ->with('success', 'Preço criado com sucesso.');
    }

    // 3) atualiza via edição inline (PUT /aux/preco/{id})
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $preco = AuxPreco::findOrFail($id);
        $preco->update($validated);

        return redirect()
            ->route('auxtables.preco.index')
            ->with('success', 'Preço atualizado com sucesso.');
    }

    // 4) exclui um item (DELETE /aux/preco/{id})
    public function destroy($id)
    {
        $preco = AuxPreco::findOrFail($id);
        $preco->delete();

        Log::info("Preço removido: {$id}");

        return redirect()
            ->route('auxtables.preco.index')
            ->with('success', 'Preço removido com sucesso.');
    }

    // 5) exclusão em massa (POST /aux/preco/mass-destroy)
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxPreco::destroy($ids);

        return redirect()
            ->route('aux.preco.index')
            ->with('success', 'Preços removidos em massa.');
    }
}

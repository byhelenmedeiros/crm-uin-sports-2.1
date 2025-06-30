<?php

namespace App\Http\Controllers\Auxtable;

use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxPreco;
use Illuminate\Http\Request;

class AuxPrecoController extends Controller
{
    public function index()
    {
        $items = AuxPreco::get();
        return view('auxtables.preco.index', compact('items'));
    }

    public function create()
    {
        return view('auxtables.preco.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        AuxPreco::create($validated);
        return redirect()
            ->route('aux.preco.index')
            ->with('success', 'Registro criado com sucesso.');
    }

    public function edit(AuxPreco $item)
    {
        return view('auxtables.preco.edit', compact('item'));
    }

    public function update(Request $request, AuxPreco $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $item->update($validated);
        return redirect()
            ->route('aux.preco.index')
            ->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy(AuxPreco $item)
    {
        $item->delete();
        return redirect()
            ->route('aux.preco.index')
            ->with('success', 'Registro removido.');
    }
}

<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use App\Models\Aux\AuxCorClube1;
use Illuminate\Http\Request;

class AuxCorClube1Controller extends Controller
{
    public function index()
    {
        $items = AuxCorClube1::get();
        return view('auxtables.cor-clube-1.index', compact('items'));
    }

    public function create()
    {
        return view('auxtables.cor-clube-1.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxCorClube1::create($validated);
        return redirect()->route('aux.cor-clube-1.index')->with('success', 'Registro criado com sucesso.');
    }

    public function edit(AuxCorClube1 $item)
    {
        return view('auxtables.cor-clube-1.edit', compact('item'));
    }

    public function update(Request $request, AuxCorClube1 $item)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $item->update($validated);
        return redirect()->route('aux.cor-clube-1.index')->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy(AuxCorClube1 $item)
    {
        $item->delete();
        return redirect()->route('aux.cor-clube-1.index')->with('success', 'Registro removido.');
    }
}

<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use App\Models\Aux\AuxCorClube2;
use Illuminate\Http\Request;

class AuxCorClube2Controller extends Controller
{
    public function index()
    {
        $items = AuxCorClube2::get();
        return view('auxtables.cor-clube-2.index', compact('items'));
    }

    public function create()
    {
        return view('auxtables.cor-clube-2.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxCorClube2::create($validated);
        return redirect()->route('aux.cor-clube-2.index')->with('success', 'Registro criado com sucesso.');
    }

    public function edit(AuxCorClube2 $item)
    {
        return view('auxtables.cor-clube-2.edit', compact('item'));
    }

    public function update(Request $request, AuxCorClube2 $item)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $item->update($validated);
        return redirect()->route('auxtables.cor-clube-2.index')->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy(AuxCorClube2 $item)
    {
        $item->delete();
        return redirect()->route('auxtables.cor-clube-2.index')->with('success', 'Registro removido.');
    }
}

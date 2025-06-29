<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxCorClube3;
use Illuminate\Http\Request;

class AuxCorClube3Controller extends Controller
{
    public function index()
    {
        $items = AuxCorClube3::get();
        return view('auxtables.cor-clube-3.index', compact('items'));
    }

    public function create()
    {
        return view('auxtables.cor-clube-3.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxCorClube3::create($validated);
        return redirect()->route('aux.cor-clube-3.index')->with('success', 'Registro criado com sucesso.');
    }

    public function edit(AuxCorClube3 $item)
    {
        return view('auxtables.cor-clube-3.edit', compact('item'));
    }

    public function update(Request $request, AuxCorClube3 $item)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $item->update($validated);
        return redirect()->route('aux.cor-clube-3.index')->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy(AuxCorClube3 $item)
    {
        $item->delete();
        return redirect()->route('aux.cor-clube-3.index')->with('success', 'Registro removido.');
    }
}

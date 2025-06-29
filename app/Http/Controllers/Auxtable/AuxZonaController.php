<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use App\Models\Aux\AuxZona;
use App\Models\Aux\AuxZonaComercial;
use Illuminate\Http\Request;

class AuxZonaController extends Controller
{
    public function index()
    {
        $items = AuxZona::with('parent')->get();
        return view('auxtables.zona.index', compact('items'));
    }

    public function create()
    {
        $parents = AuxZonaComercial::all();
        return view('auxtables.zona.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
            'parent_id'   => 'nullable|exists:aux_zona_comercials,id',
        ]);

        AuxZona::create($validated);
        return redirect()->route('auxtables.zonas.index')->with('success', 'Registro criado com sucesso.');
    }

    public function edit(AuxZona $item)
    {
        $parents = AuxZonaComercial::all();
        return view('auxtables.zona.edit', compact('item', 'parents'));
    }

    public function update(Request $request, AuxZona $item)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
            'parent_id'   => 'nullable|exists:aux_zona_comercials,id',
        ]);

        $item->update($validated);
        return redirect()->route('auxtables.zonas.index')->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy(AuxZona $item)
    {
        $item->delete();
        return redirect()->route('auxtables.zonas.index')->with('success', 'Registro removido.');
    }
}

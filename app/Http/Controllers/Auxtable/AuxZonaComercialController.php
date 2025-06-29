<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxZonaComercial;
use Illuminate\Http\Request;

class AuxZonaComercialController extends Controller
{
    public function index()
    {
        $items = AuxZonaComercial::get();
        return view('auxtables.zona-comercial.index', compact('items'));
    }

    public function create()
    {
        return view('auxtables.zona-comercial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxZonaComercial::create($validated);
        return redirect()->route('auxtables.zona-comercials.index')->with('success', 'Registro criado com sucesso.');
    }

    public function edit(AuxZonaComercial $item)
    {
        return view('auxtables.zona-comercial.edit', compact('item'));
    }

    public function update(Request $request, AuxZonaComercial $item)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $item->update($validated);
        return redirect()->route('auxtables.zona-comercials.index')->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy(AuxZonaComercial $item)
    {
        $item->delete();
        return redirect()->route('auxtables.zona-comercials.index')->with('success', 'Registro removido.');
    }
}

<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxVendedor;
use App\Models\Auxtable\AuxZona;
use Illuminate\Http\Request;

class AuxVendedorController extends Controller
{
    public function index()
    {
        $items = AuxVendedor::with('parent')->get();
        return view('auxtables.vendedor.index', compact('items'));
    }

    public function create()
    {
        $parents = AuxZona::all();
        return view('auxtables.vendedor.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
            'parent_id'   => 'nullable|exists:aux_zonas,id',
        ]);

        AuxVendedor::create($validated);
        return redirect()->route('auxtables.vendedores.index')->with('success', 'Registro criado com sucesso.');
    }

    public function edit(AuxVendedor $item)
    {
        $parents = AuxZona::all();
        return view('auxtables.vendedor.edit', compact('item', 'parents'));
    }

    public function update(Request $request, AuxVendedor $item)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
            'parent_id'   => 'nullable|exists:aux_zonas,id',
        ]);

        $item->update($validated);
        return redirect()->route('auxtables.vendedores.index')->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy(AuxVendedor $item)
    {
        $item->delete();
        return redirect()->route('auxtables.vendedores.index')->with('success', 'Registro removido.');
    }
}

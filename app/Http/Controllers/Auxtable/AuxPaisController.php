<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aux\AuxPais;

class AuxPaisController extends Controller
{
     public function index()
    {
        $items = AuxPais::all();
        return view('auxtables.pais.index', compact('items'));
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxPais::create($validated);

        return redirect()->route('aux.pais.index')
                         ->with('success', 'País criado com sucesso.');
    }

     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $pais = AuxPais::findOrFail($id);
        $pais->update($validated);

        return redirect()->route('aux.pais.index')
                         ->with('success', 'País atualizado com sucesso.');
    }

     public function destroy($id)
    {
        $pais = AuxPais::findOrFail($id);
        $pais->delete();

        return redirect()->route('aux.pais.index')
                         ->with('success', 'País removido.');
    }

     public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxPais::destroy($ids);

        return redirect()->route('aux.pais.index')
                         ->with('success', 'Países removidos em massa.');
    }
}

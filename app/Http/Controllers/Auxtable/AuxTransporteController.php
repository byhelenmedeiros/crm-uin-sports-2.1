<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use App\Models\Aux\AuxTransporte;
use Illuminate\Http\Request;

class AuxTransporteController extends Controller
{
     public function index()
    {
        $items = AuxTransporte::all();
        return view('auxtables.transportes.index', compact('items'));  
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxTransporte::create($validated);

        return redirect()
            ->route('aux.transportes.index')     
            ->with('success', 'Transporte criado com sucesso.');
    }

     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $transporte = AuxTransporte::findOrFail($id);
        $transporte->update($validated);

        return redirect()
            ->route('aux.transportes.index')
            ->with('success', 'Transporte atualizado com sucesso.');
    }

     public function destroy($id)
    {
        AuxTransporte::findOrFail($id)->delete();

        return redirect()
            ->route('aux.transportes.index')
            ->with('success', 'Transporte removido.');
    }

     public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxTransporte::destroy($ids);

        return redirect()
            ->route('aux.transportes.index')
            ->with('success', 'Transportes removidos em massa.');
    }
}

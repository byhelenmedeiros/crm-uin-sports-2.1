<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aux\AuxPadrao;

class AuxPadraoController extends Controller
{
    public function index()
    {
        $items = AuxPadrao::all();
        return view('auxtables.padroes.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxPadrao::create($validated);

        return redirect()
            ->route('aux.padroes.index')
            ->with('success', 'Padrão criado com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $padrao = AuxPadrao::findOrFail($id);
        $padrao->update($validated);

        return redirect()
            ->route('aux.padroes.index')
            ->with('success', 'Padrão atualizado com sucesso.');
    }

    // 4) Exclusão individual
    public function destroy($id)
    {
        AuxPadrao::findOrFail($id)->delete();

        return redirect()
            ->route('aux.padroes.index')
            ->with('success', 'Padrão removido.');
    }

    // 5) Exclusão em massa
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxPadrao::destroy($ids);

        return redirect()
            ->route('aux.padroes.index')
            ->with('success', 'Padrões removidos em massa.');
    }
}

<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxtable\AuxModalidade;

class AuxModalidadeController extends Controller
{
    /**
     * 1) Listar todas as modalidades
     */
    public function index()
    {
        $items = AuxModalidade::all();
        return view('auxtables.modalidades.index', compact('items'));
    }

    /**
     * 2) Criar nova modalidade (inline-create)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxModalidade::create($validated);

        return redirect()
            ->route('aux.modalidades.index')
            ->with('success', 'Modalidade criada com sucesso.');
    }

    /**
     * 3) Atualizar modalidade (inline-edit)
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $item = AuxModalidade::findOrFail($id);
        $item->update($validated);

        return redirect()
            ->route('aux.modalidades.index')
            ->with('success', 'Modalidade atualizada com sucesso.');
    }

    /**
     * 4) Excluir uma modalidade
     */
    public function destroy($id)
    {
        AuxModalidade::findOrFail($id)->delete();

        return redirect()
            ->route('aux.modalidades.index')
            ->with('success', 'Modalidade removida.');
    }

    /**
     * 5) Exclusão em massa (massDestroy)
     */
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxModalidade::destroy($ids);

        return redirect()
            ->route('aux.modalidades.index')
            ->with('success', 'Modalidades removidas em massa.');
    }
}

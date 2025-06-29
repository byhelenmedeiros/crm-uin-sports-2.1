<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxtable\AuxEscalao;

class AuxEscalaoController extends Controller
{
    // 1) Lista todos os escalões
    public function index()
     {
        // traz só id e name para performance
        $items = AuxEscalao::select('id','name')
            ->orderBy('name')
            ->get();

        // repassa para a view tanto como "items" (sua listagem atual)
        // quanto como "escaloes" (para popular o <select> em modalidades)
        return view('auxtables.escaloes.index', [
            'items'     => $items,
            'escaloes'  => $items,
        ]);
    }

    // 2) Cria um novo escalão via inline-create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxEscalao::create($validated);

        return redirect()
            ->route('aux.escaloes.index')
            ->with('success', 'Escalão criado com sucesso.');
    }

    // 3) Atualiza um escalão via inline-edit
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $escalao = AuxEscalao::findOrFail($id);
        $escalao->update($validated);

        return redirect()
            ->route('aux.escaloes.index')
            ->with('success', 'Escalão atualizado com sucesso.');
    }

    // 4) Exclui um único escalão
    public function destroy($id)
    {
        $escalao = AuxEscalao::findOrFail($id);
        $escalao->delete();

        return redirect()
            ->route('aux.escaloes.index')
            ->with('success', 'Escalão removido.');
    }

    // 5) Exclusão em massa (massDestroy)
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxEscalao::destroy($ids);

        return redirect()
            ->route('aux.escaloes.index')
            ->with('success', 'Escalões removidos em massa.');
    }
}

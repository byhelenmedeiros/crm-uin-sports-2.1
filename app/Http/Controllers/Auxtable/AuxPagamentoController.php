<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxPagamento;
use Illuminate\Http\Request;

class AuxPagamentoController extends Controller
{
     public function index()
    {
        $items = AuxPagamento::all();
        return view('auxtables.pagamentos.index', compact('items'));         
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxPagamento::create($validated);

        return redirect()
            ->route('aux.pagamentos.index')               
            ->with('success', 'Meio de pagamento criado com sucesso.');
    }

     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $pagamento = AuxPagamento::findOrFail($id);
        $pagamento->update($validated);

        return redirect()
            ->route('aux.pagamentos.index')
            ->with('success', 'Meio de pagamento atualizado com sucesso.');
    }

    // 4) Exclusão individual (destroy)
    public function destroy($id)
    {
        AuxPagamento::findOrFail($id)->delete();

        return redirect()
            ->route('aux.pagamentos.index')
            ->with('success', 'Meio de pagamento removido.');
    }

    // 5) Exclusão em massa (massDestroy)
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxPagamento::destroy($ids);

        return redirect()
            ->route('aux.pagamentos.index')
            ->with('success', 'Meios de pagamento removidos em massa.');
    }
}

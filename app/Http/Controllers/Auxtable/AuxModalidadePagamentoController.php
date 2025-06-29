<?php

namespace App\Http\Controllers\Auxtable;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxtable\AuxModalidadePagamento;

class AuxModalidadePagamentoController extends Controller
{
    /**
     * Lista todas as modalidades de pagamento.
     */
    public function index()
    {
        $items = AuxModalidadePagamento::all();
        return view('auxtables.modalidade_pagamento.index', compact('items'));
    }

    /**
     * Armazena uma nova modalidade de pagamento.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        AuxModalidadePagamento::create($validated);

        return redirect()
            ->route('aux.modalidadepagamento.index')   
            ->with('success', 'Modalidade de pagamento criada com sucesso.');
    }

    /**
     * Atualiza uma modalidade de pagamento existente.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $item = AuxModalidadePagamento::findOrFail($id);
        $item->update($validated);

        return redirect()
            ->route('aux.modalidadepagamento.index')   
            ->with('success', 'Modalidade de pagamento atualizada com sucesso.');
    }

    /**
     * Remove uma modalidade de pagamento.
     */
    public function destroy($id)
    {
        AuxModalidadePagamento::findOrFail($id)->delete();

        return redirect()
            ->route('aux.modalidadepagamento.index')   
            ->with('success', 'Modalidade de pagamento removida.');
    }

    /**
     * Exclusão em massa de modalidades de pagamento.
     */
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxModalidadePagamento::destroy($ids);

        return redirect()
            ->route('aux.modalidadepagamento.index')   
            ->with('success', 'Modalidades de pagamento removidas em massa.');
    }
}

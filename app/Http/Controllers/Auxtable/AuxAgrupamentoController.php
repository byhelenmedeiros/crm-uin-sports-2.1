<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use App\Models\Aux\AuxAgrupamento;
use App\Models\Aux\AuxGrupoCliente;
use Illuminate\Http\Request;

class AuxAgrupamentoController extends Controller
{
    public function index()
    {
        $items = AuxAgrupamento::with('grupo')->get();
        $grupos = AuxGrupoCliente::where('active',1)->pluck('name','id');
        return view('auxtables.agrupamentos.index', compact('items','grupos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aux_grupo_cliente_id' => 'required|exists:aux_grupo_clientes,id',
            'external_id'          => 'nullable|string|max:255',
            'name'                 => 'required|string|max:255',
            'active'               => 'boolean',
        ]);

        AuxAgrupamento::create([
            'aux_grupo_cliente_id' => $data['aux_grupo_cliente_id'],
            'external_id'          => $data['external_id'] ?? null,
            'name'                 => $data['name'],
            'active'               => $data['active'] ?? false,
        ]);

        return redirect()
            ->route('aux.grupo-agrupamentos.index')
            ->with('success','Agrupamento criado com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'aux_grupo_cliente_id' => 'required|exists:aux_grupo_clientes,id',
            'external_id'          => 'nullable|string|max:255',
            'name'                 => 'required|string|max:255',
            'active'               => 'boolean',
        ]);

        $agr = AuxAgrupamento::findOrFail($id);
        $agr->update($data);

        return redirect()
            ->route('aux.grupo-agrupamentos.index')
            ->with('success','Agrupamento atualizado com sucesso.');
    }

    public function destroy($id)
    {
        AuxAgrupamento::findOrFail($id)->delete();

        return redirect()
            ->route('aux.grupo-agrupamentos.index')
            ->with('success','Agrupamento removido com sucesso.');
    }

    public function massDestroy(Request $request)
    {
        AuxAgrupamento::destroy($request->input('ids', []));
        return redirect()
            ->route('aux.grupo-agrupamentos.index')
            ->with('success','Agrupamentos removidos em massa.');
    }
}

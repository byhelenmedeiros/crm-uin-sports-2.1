<?php

namespace App\Http\Controllers\Auxtable;

use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxGrupoCliente;
use Illuminate\Http\Request;

class AuxGrupoClienteController extends Controller
{
    /**
     * Exibe a lista de grupos, já “achatada” para a data-table:
     * cada linha terá o grupo pai e, se houver, um de seus filhos.
     */
  public function index()
{
    $pais = AuxGrupoCliente::with('children')
        ->whereNull('parent_id')
        ->orderBy('external_id')
        ->get();

    $rows = $pais->flatMap(function (AuxGrupoCliente $pai) {
        if ($pai->children->isEmpty()) {
            return [[
                'id'               => $pai->id,
                'external_id'      => $pai->external_id,
                'name'             => $pai->name,
                'agrup_external_id'=> null,
                'agrup_name'       => null,
                'active'           => $pai->active,
            ]];
        }

        return $pai->children->map(fn($filho) => [
            'id'               => $pai->id,
            'external_id'      => $pai->external_id,
            'name'             => $pai->name,
            'agrup_external_id'=> $filho->external_id,
            'agrup_name'       => $filho->name,
            'active'           => $pai->active,
        ]);
    });

    // Converte cada array em stdClass
    $grupos = $rows->map(fn($row) => (object) $row);

    return view('auxtables.grupo-clientes.index', compact('grupos'));
}



    /**
     * Cria um novo grupo (pai) e, opcionalmente, um agrupamento (filho).
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'external_id'       => 'nullable|string|max:255',
            'name'              => 'required|string|max:255',
            'agrup_external_id' => 'nullable|string|max:255',
            'agrup_name'        => 'nullable|string|max:255',
            'active'            => 'boolean',
        ]);

        // 1) Cria o Grupo pai
        $pai = AuxGrupoCliente::create([
            'external_id' => $data['external_id'] ?? null,
            'name'        => $data['name'],
            'active'      => $data['active'] ?? false,
            // parent_id fica NULL por padrão para um grupo topo
        ]);

        // 2) Se vier dados de agrupamento, cria um filho
        if (! empty($data['agrup_name'])) {
            $pai->children()->create([
                'external_id' => $data['agrup_external_id'] ?? null,
                'name'        => $data['agrup_name'],
                'active'      => true,
                // parent_id é preenchido automaticamente pelo relacionamento
            ]);
        }

        return redirect()
            ->route('aux.grupo-clientes.index')
            ->with('success', 'Grupo e agrupamento (se preenchido) criados com sucesso.');
    }


    /**
     * Atualiza apenas um grupo pai (não toca em agrupamentos).
     */
    public function update(Request $request, AuxGrupoCliente $grupo)
    {
        $data = $request->validate([
            'external_id' => 'nullable|string|max:255',
            'name'        => 'required|string|max:255',
            'active'      => 'boolean',
        ]);

        $grupo->update($data);

        return redirect()
            ->route('aux.grupo-clientes.index')
            ->with('success', 'Grupo atualizado com sucesso.');
    }


    /**
     * Remove um grupo (pai) e, por cascata, todos os filhos.
     */
    public function destroy(AuxGrupoCliente $grupo)
    {
        $grupo->delete();

        return redirect()
            ->route('aux.grupo-clientes.index')
            ->with('success', 'Grupo removido com sucesso.');
    }


    /**
     * Exclusão em massa de grupos.
     */
    public function massDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        AuxGrupoCliente::destroy($ids);

        return redirect()
            ->route('aux.grupo-clientes.index')
            ->with('success', 'Grupos removidos em massa.');
    }
}

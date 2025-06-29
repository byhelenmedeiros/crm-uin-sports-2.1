<?php


namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
 use App\Models\Aux\AuxGrupoCliente;
use Illuminate\Http\Request;

class AuxGrupoClienteController extends Controller
{
    /**
     * Exibe a lista de grupos, já carregando os agrupamentos filhos.
     */
public function index()
{
    $grupos = AuxGrupoCliente::with('agrupamentos')->get();
    return view('auxtables.grupo-clientes.index', [
        'grupos' => $grupos,
    ]);
}


    /**
     * Cria um novo grupo.
     */
  public function store(Request $request)
{
    $data = $request->validate([
        'external_id'         => 'nullable|string|max:255',
        'name'                => 'required|string|max:255',
        'agrup_external_id'   => 'nullable|string|max:255', // novo
        'agrup_name'          => 'nullable|string|max:255', // novo
        'active'              => 'boolean',
    ]);

    // 1) Cria o Grupo
    $grupo = AuxGrupoCliente::create([
        'external_id' => $data['external_id'] ?? null,
        'name'        => $data['name'],
        'active'      => $data['active'] ?? false,
    ]);

    // 2) Se vier nome de agrupamento, cria o filho
    if (! empty($data['agrup_name'])) {
        $grupo->agrupamentos()->create([
            'external_id'          => $data['agrup_external_id'] ?? null,
            'name'                 => $data['agrup_name'],
            'aux_grupo_cliente_id' => $grupo->id,
            'active'               => true,
        ]);
    }

    return redirect()
        ->route('aux.grupo-clientes.index')
        ->with('success','Grupo e agrupamento (se preenchido) criados com sucesso.');
}


    /**
     * Atualiza um grupo existente.
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
     * Remove um grupo.
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

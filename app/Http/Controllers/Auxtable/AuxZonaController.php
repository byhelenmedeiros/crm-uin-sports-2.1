<?php

namespace App\Http\Controllers\Auxtable;

use App\Http\Controllers\Controller;
use App\Models\Auxtable\AuxZona;
use Illuminate\Http\Request;

class AuxZonaController extends Controller
{
    /**
     * Mostra todas as Zonas (nível 1), carregando até 2 níveis de filhos.
     */
    public function index()
    {
        $zones = AuxZona::with('children.children')
            ->zones()                     // scopeZones()
            ->orderBy('external_id')
            ->get();

        return view('auxtable.zonas.index', compact('zones'));
    }

    /**
     * Formulário de criação.
     */
 public function create()
{
    // busca só as Zonas (type = 'zone') com os filhos de dois níveis já prontos
     $zones = AuxZona::with('children.children')
             ->where('type','zone')
             ->orderBy('external_id')
             ->get();

    dd($zones);  
    return view('auxtable.zonas.index', compact('zones'));
}
    /**
     * Armazena nova zona/comercial/vendor.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'external_id' => 'required|string|max:50',
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:aux_zona,id',
            'type'        => 'required|in:zone,comercial,vendor',
            'active'      => 'boolean',
        ]);

        AuxZona::create($data + [
            'active' => $data['active'] ?? true,
        ]);

        return redirect()
            ->route('auxtable.zonas.index')
            ->with('success', 'Registro criado com sucesso.');
    }

    /**
     * Formulário de edição.
     */
    public function edit(AuxZona $zona)
    {
        // Para o select de parent, trouxemos só níveis acima possíveis:
        $parents = match($zona->type) {
            'zone'       => [],         // nível 1 não tem parent
            'comercial'  => AuxZona::zones()->get(),
            'vendor'     => AuxZona::commercials()->get(),
            default      => [],
        };

        return view('auxtable.zonas.edit', compact('zona','parents'));
    }

    /**
     * Atualiza dados.
     */
    public function update(Request $request, AuxZona $zona)
    {
        $data = $request->validate([
            'external_id' => 'required|string|max:50',
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:aux_zona,id',
            'active'      => 'boolean',
        ]);

        $zona->update($data);

        return redirect()
            ->route('auxtable.zonas.index')
            ->with('success', 'Registro atualizado com sucesso.');
    }

    /**
     * Remove zona e cascata de filhos.
     */
    public function destroy(AuxZona $zona)
    {
        $zona->delete();

        return redirect()
            ->route('auxtable.zonas.index')
            ->with('success', 'Registro removido com sucesso.');
    }
}

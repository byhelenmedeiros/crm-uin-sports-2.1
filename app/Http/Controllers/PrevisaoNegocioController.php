<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PrevisaoNegocio;
use Illuminate\Http\Request;

class PrevisaoNegocioController extends Controller
{
    public function store(Request $request, Client $client)
    {
        $data = $request->validate([
            'previsoes'   => 'required|array',
            'previsoes.*.ano'   => 'required|integer|min:2000|max:2100',
            'previsoes.*.valor' => 'required|numeric|min:0',
        ]);

        foreach ($data['previsoes'] as $p) {
            $client->previsoes()->updateOrCreate(
                ['crm_client_id' => $client->id, 'ano' => $p['ano']],
                ['valor' => $p['valor']]
            );
        }

        return back()->with('success','Previsões salvas.');
    }

    public function destroy(Request $request, Client $client)
    {
        $request->validate(['anos' => 'array']);
        PrevisaoNegocio::where('crm_client_id', $client->id)
            ->whereIn('ano', $request->input('anos'))
            ->delete();

        return back()->with('success','Previsões removidas.');
    }
}

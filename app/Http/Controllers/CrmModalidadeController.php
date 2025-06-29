<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CrmModalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrmModalidadeController extends Controller
{
    /**
     * Exibe todas as modalidades de um cliente.
     */
    public function index(Client $client)
    {
        $modalidades = $client->modalidades()
            ->orderBy('id')
            ->get();

        return view('clients.modalidades.index', compact('client', 'modalidades'));
    }

    /**
     * Formulário para criar novas modalidades (em série).
     */
    public function create(Client $client)
    {
        // instancia vazia para reaproveitar o mesmo partial
        $modalidade = new CrmModalidade();
        return view('clients.modalidades.create', compact('client', 'modalidade'));
    }

    /**
     * Armazena várias modalidades de uma só vez, cada uma com upload de documentos.
     */
    public function store(Request $request, Client $client)
    {
        // valida o JSON e os arquivos enviados para cada índice
        $payload = $request->validate([
            'modalidades_json'       => 'required|json',
            'modalidades_files'      => 'array',
            'modalidades_files.*.*'  => 'file|mimes:pdf,jpg,jpeg|max:5120',
        ]);

        $modalidades = json_decode($payload['modalidades_json'], true);

        foreach ($modalidades as $i => $mod) {
            // valida campos de cada modalidade
            $data = validator($mod, [
                'name'                    => 'required|string|max:255',
                'associacao'              => 'nullable|string|max:255',
                'numero_atletas'          => 'nullable|integer|min:0',
                'escaloes'                => 'nullable|string|max:255',
                'marca_inicio'            => 'nullable|date',
                'marca_fim'               => 'nullable|date|after_or_equal:marca_inicio',
                'marca_renegociacao'      => 'nullable|date|after_or_equal:marca_fim',
                'contrato_inicio'         => 'nullable|date',
                'contrato_fim'            => 'nullable|date|after_or_equal:contrato_inicio',
                'contrato_renegociacao'   => 'nullable|date|after_or_equal:contrato_fim',
                'responsavel_nome_1'      => 'nullable|string|max:255',
                'responsavel_cargo_1'     => 'nullable|string|max:255',
                'responsavel_email_1'     => 'nullable|email|max:255',
                'responsavel_telemovel_1' => 'nullable|string|max:50',
                'responsavel_nome_2'      => 'nullable|string|max:255',
                'responsavel_cargo_2'     => 'nullable|string|max:255',
                'responsavel_email_2'     => 'nullable|email|max:255',
                'responsavel_telemovel_2' => 'nullable|string|max:50',
                'recebe_email_orcamentos' => 'boolean',
                'recebe_email_encomendas' => 'boolean',
                'recebe_email_faturas'    => 'boolean',
                'recebe_email_campanhas'  => 'boolean',
                'pack_medio'              => 'nullable|numeric|min:0',
                'pack_frequencia_inicio'  => 'nullable|date',
                'previsao_ano1'           => 'nullable|integer',
                'previsao_ano2'           => 'nullable|integer',
                'notas_modalidade'        => 'nullable|string',
            ])->validate();

            // processa uploads de documentos para essa modalidade
            $paths = [];
            if ($request->hasFile("modalidades_files.$i")) {
                foreach ($request->file("modalidades_files.$i") as $file) {
                    $paths[] = $file->store('modalidades_docs', 'public');
                }
            }
            $data['documentos']    = $paths;
            $data['external_id']   = (string) Str::uuid();
            $data['crm_client_id'] = $client->id;

            CrmModalidade::create($data);
        }

        return redirect()
            ->route('clients.modalidades.index', $client)
            ->with('success', 'Modalidades adicionadas com sucesso.');
    }

    /**
     * Exibe detalhes de uma modalidade.
     */
    public function show(Client $client, CrmModalidade $modalidade)
    {
        return view('clients.modalidades.show', compact('client', 'modalidade'));
    }

    /**
     * Formulário de edição de uma única modalidade.
     */
    public function edit(Client $client, CrmModalidade $modalidade)
    {
        return view('clients.modalidades.edit', compact('client', 'modalidade'));
    }

    /**
     * Atualiza uma modalidade existente, incluindo anexos novos.
     */
    public function update(Request $request, Client $client, CrmModalidade $modalidade)
    {
        // valida campos e possível lista de caminhos/documentos já existentes
        $data = $request->validate([
            'name'                    => 'required|string|max:255',
            'associacao'              => 'nullable|string|max:255',
            'numero_atletas'          => 'nullable|integer|min:0',
            'escaloes'                => 'nullable|string|max:255',
            'marca_inicio'            => 'nullable|date',
            'marca_fim'               => 'nullable|date|after_or_equal:marca_inicio',
            'marca_renegociacao'      => 'nullable|date|after_or_equal:marca_fim',
            'contrato_inicio'         => 'nullable|date',
            'contrato_fim'            => 'nullable|date|after_or_equal:contrato_inicio',
            'contrato_renegociacao'   => 'nullable|date|after_or_equal:contrato_fim',
            'responsavel_nome_1'      => 'nullable|string|max:255',
            'responsavel_cargo_1'     => 'nullable|string|max:255',
            'responsavel_email_1'     => 'nullable|email|max:255',
            'responsavel_telemovel_1' => 'nullable|string|max:50',
            'responsavel_nome_2'      => 'nullable|string|max:255',
            'responsavel_cargo_2'     => 'nullable|string|max:255',
            'responsavel_email_2'     => 'nullable|email|max:255',
            'responsavel_telemovel_2' => 'nullable|string|max:50',
            'recebe_email_orcamentos' => 'boolean',
            'recebe_email_encomendas' => 'boolean',
            'recebe_email_faturas'    => 'boolean',
            'recebe_email_campanhas'  => 'boolean',
            'pack_medio'              => 'nullable|numeric|min:0',
            'pack_frequencia_inicio'  => 'nullable|date',
            'previsao_ano1'           => 'nullable|integer',
            'previsao_ano2'           => 'nullable|integer',
            'notas_modalidade'        => 'nullable|string',
            'documentos'              => 'nullable|array',
            'new_files'               => 'array',
            'new_files.*'             => 'file|mimes:pdf,jpg,jpeg|max:5120',
        ]);

        // mescla novos uploads ao array existente
        $paths = $modalidade->documentos ?? [];
        if ($request->hasFile('new_files')) {
            foreach ($request->file('new_files') as $file) {
                $paths[] = $file->store('modalidades_docs', 'public');
            }
        }
        $data['documentos'] = $paths;

        $modalidade->update($data);

        return redirect()
            ->route('clients.modalidades.index', $client)
            ->with('success', 'Modalidade atualizada com sucesso.');
    }

    /**
     * Remove uma modalidade.
     */
    public function destroy(Client $client, CrmModalidade $modalidade)
    {
        $modalidade->delete();

        return redirect()
            ->route('clients.modalidades.index', $client)
            ->with('success', 'Modalidade removida.');
    }
}

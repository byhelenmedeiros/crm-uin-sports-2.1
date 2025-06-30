<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Auxtable\AuxTransporte;
use App\Models\Client;
use App\Models\ClientGroup;
use App\Models\ComercialZone;
use App\Models\CrmAddressType;
use App\Models\CrmAddress;
use App\Models\Pagamento;
use App\Models\Preco;
use App\Models\Zone;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Client::class);

        $clients = Client::orderBy('name')->get();

        // Apenas as colunas que queremos na tabela
        $columns = [
            'external_id'     => 'ID Externo',
            'name'            => 'Nome',
            'nif'             => 'NIF',
            'cliente_desde'   => 'Cliente Desde',
            'id'              => 'ID',
            'responsavel_nome' => 'Responsável',
        ];

        return view('clients.index', compact('clients', 'columns'));
    }


    public function create()
    {
        Log::info("ClientController@create chamada pelo user id: " . auth()->id());

        $this->authorize('create', Client::class);

        // tipos de endereço, grupos, zonas e vendedores
        $addressTypes = CrmAddressType::all(['id', 'name']);
       //$clientGroups = ClientGroup::with('children')
         //              ->whereNull('parent_id')
           //            ->orderBy('external_id')
             //          ->get(['id','name','external_id','parent_id']);

          $zones            = Zone::all();
        $comercial_zones  = ComercialZone::all();
        $vendors          = Vendor::all();

        return view('clients.create', compact( 'addressTypes', 'zones', 'comercial_zones', 'vendors'));

        // transportes completos e mapeamento external_id => name
        $aux_transportes          = AuxTransporte::all(['id', 'external_id', 'name']);
        $transportesPorExternalId = AuxTransporte::pluck('name', 'external_id');

        // pagamentos e preços
        //   $pagamentos = Pagamento::pluck('name','id');
        //  $precos     = Preco   ::pluck('name','id');

        return view('clients.create', compact(
            'addressTypes',
            'clientGroups',
            'zones',
            'vendors',
            'aux_transportes',
            'transportesPorExternalId',
            //   'pagamentos',
            // 'precos'
        ));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // todos os dados já validados pelo FormRequest
            $data = $request->validated();

            // cria o cliente
            $client = Client::create([
                'external_id'             => $data['external_id'] ?? null,
                'transporte_id'           => $data['transporte_id'] ?? null,
                'pagamento_id'            => $data['pagamento_id'] ?? null,
                'preco_id'                => $data['preco_id'] ?? null,
                'desconto_linha'          => $data['desconto_linha'] ?? 0,
                'desconto_global'         => $data['desconto_global'] ?? 0,
                'name'                    => $data['name'],
                'nif'                     => $data['nif'] ?? null,
                'url'                     => $data['url'] ?? null,
                'telefone4'               => $data['telefone4'] ?? null,
                'client_group_id'         => $data['client_group_id'] ?? null,
                'zone_id'                 => $data['zone_id'] ?? null,
                'vendor_id'               => $data['vendor_id'] ?? null,
                'responsavel_nome'        => $data['responsavel_nome'] ?? null,
                'recebe_email_orcamentos' => $data['recebe_email_orcamentos'] ?? 'n',
                'recebe_email_encomendas' => $data['recebe_email_encomendas'] ?? 'n',
                'recebe_email_faturas'    => $data['recebe_email_faturas'] ?? 'n',
                'recebe_email_campanhas'  => $data['recebe_email_campanhas'] ?? 'n',
                'data_aniversario'        => $data['data_aniversario'] ?? null,
                'cliente_desde'           => $data['cliente_desde'] ?? null,
                'limite_credito'          => $data['limite_credito'] ?? 0,
                'notas_gerais'            => $data['notas_gerais'] ?? null,
                'user_created_id'         => auth()->id(),
                'user_updated_id'         => auth()->id(),
                'nome_presidente'          => $data['nome_presidente'] ?? null,
                'presidente_data_inicio'   => $data['presidente_data_inicio'] ?? null,
                'presidente_data_fim'      => $data['presidente_data_fim'] ?? null,
                'email_presidente'         => $data['email_presidente'] ?? null,
                'telemovel_presidente'     => $data['telemovel_presidente'] ?? null,


            ]);

            // cria os endereços
          if (!empty($request->input('addresses'))) {
            foreach ($request->input('addresses') as $addr) {
                $client->addresses()->create([
                    'address_type_id'   => $addr['address_type_id'],
                    'external_id'       => $addr['external_id']       ?? null,
                    'address'           => $addr['address']           ?? null,
                    'line2'             => $addr['line2']             ?? null,
                    'line3'             => $addr['line3']             ?? null,
                    'code'              => $addr['code']              ?? null,
                    'country_id'        => $addr['country_id']        ?? null,
                    'state_id'          => $addr['state_id']          ?? null,
                    'city_id'           => $addr['city_id']           ?? null,
                    'primary'           => $addr['primary'] ?? 0,      // se usar esse campo
                    'user_created_id'   => auth()->id(),
                    'user_updated_id'   => auth()->id(),
                ]);
            }

            // cria modalidades e calcula total de atletas
            if (!empty($data['modalidades'])) {
                $totalAtletas = 0;
                foreach ($data['modalidades'] as $m) {
                    $client->modalidades()->create([
                        'modalidade_nome' => $m['modalidade_nome'],
                        'numero_atletas'  => $m['numero_atletas'],
                    ]);
                    $totalAtletas += $m['numero_atletas'];
                }
                $client->update(['numero_total_atletas' => $totalAtletas]);
            }

            DB::commit();

            return redirect()
                ->route('clients.index')
                ->with('success', 'Cliente criado com sucesso!');
        }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Erro ao criar cliente: ' . $e->getMessage());
            return redirect()->back()->withErrors('Erro ao criar cliente');
        }
    }

    public function show($id)
    {
        $client = Client::with([
            'addresses.addressType',
            //'clientGroup',
            'groupSubdivision',

        ])->findOrFail($id);

        $client->load([
            'addresses.addressType',
        //    'clientGroup',
          //  'groupSubdivision',
            'zone',
            'vendor',
            'modalidades',
            'createdBy',
            'updatedBy',
            'deletedBy',
            'restoredBy',
            'owner',
            'assigned',


        ]);

        return view('clients.show.showall', compact('client'));
    }

    public function details($id)
    {
        $client = Client::with('addresses.addressType')->findOrFail($id);
        return view('clients.details', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::with('addresses.addressType')->findOrFail($id);

        // reaproveita mesmos dados de selects do create()
        $zones                    = Zone::orderBy('external_id')->get(['id', 'external_id', 'name']);
        $vendors                  = Vendor::orderBy('external_id')->get(['id', 'external_id', 'name']);
        $aux_transportes          = AuxTransporte::all(['id', 'external_id', 'name']);
        $transportesPorExternalId = AuxTransporte::pluck('name', 'external_id');
        // $pagamentos               = AuxPagamento::pluck('name','id');
        // $precos                   = AuxPreco   ::pluck('name','id');
        

        return view('clients.edit', compact(
            'client',
            'zones',
            'vendors',
            'aux_transportes',
            'transportesPorExternalId',
            'pagamentos',
            'precos'
        ));
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}

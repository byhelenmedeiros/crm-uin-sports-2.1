{{-- Dados Complementares --}}

<div x-show="activeTab==='dados_complementares'" class="space-y-4">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    //presidente nome
    <div>
      <label class="label"><span class="label-text text-sm">Nome Presidente</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->nome_presidente }}</div>
    </div>

    {{-- Data Presidente Início --}}
    <div>
      <label class="label"><span class="label-text text-sm">Data Presidente Início</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ optional($client->data_presidente_inicio)->format('d/m/Y') }}
      </div>
    </div>

    {{-- Data Presidente Fim --}}
    <div>
      <label class="label"><span class="label-text text-sm">Data Presidente Fim</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ optional($client->data_presidente_fim)->format('d/m/Y') }}
      </div>
    </div>

    @foreach([
      'orcamentos' => 'Orçamentos',
      'encomendas' => 'Encomendas',
      'faturas'    => 'Faturas',
      'campanhas'  => 'Campanhas',
    ] as $key => $label)
      <div>
        <label class="label"><span class="label-text text-sm">Recebe {{ $label }}</span></label>
        <div class="select select-sm w-full bg-gray-100">
          {{ $client->{'recebe_email_'.$key} === 's' ? 'Sim' : 'Não' }}
        </div>
      </div>
    @endforeach
  </div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    {{-- Padrão --}}
    <div>
      <label class="label"><span class="label-text text-sm">Padrão</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->padrao_clube }}</div>
    </div>

    {{-- Cores do Clube --}}
    @for($i = 1; $i <= 3; $i++)
      <div>
        <label class="label"><span class="label-text text-sm">Cor Clube {{ $i }}</span></label>
        <div class="input input-sm w-full bg-gray-100">{{ $client->{'cor_clube_'.$i} }}</div>
      </div>
    @endfor
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Cliente Desde --}}
    <div>
      <label class="label"><span class="label-text text-sm">Cliente Desde</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ optional($client->cliente_desde)->format('d/m/Y') }}
      </div>
    </div>
    {{-- Limite de Crédito --}}
    <div>
      <label class="label"><span class="label-text text-sm">Limite de Crédito</span></label>
      <div class="input input-sm w-full bg-gray-100">
        €{{ number_format($client->limite_credito,2,',','.') }}
      </div>
    </div>
  </div>

  {{-- Notas Gerais --}}
  <div>
    <label class="label"><span class="label-text text-sm">Notas Gerais</span></label>
    <div class="textarea textarea-sm w-full bg-gray-100 whitespace-pre-line">
      {{ $client->notas_gerais }}
    </div>
  </div>
</div>

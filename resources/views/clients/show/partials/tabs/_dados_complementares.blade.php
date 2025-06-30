{{-- Dados Complementares --}}
<div x-show="activeTab==='dados_complementares'" class="space-y-4">
  {{-- Presidente e Mandato --}}
  <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
    @foreach([
      'nome_presidente'           => 'Nome Presidente',
      'data_presidente_inicio'    => 'Data Presidente Início',
      'data_presidente_fim'       => 'Data Presidente Fim',
      'email_presidente'          => 'Email Presidente',
      'telemovel_presidente'      => 'Telefone Presidente',
      'marca_clube_inicio'        => 'Marca Clube Início',
      'marca_clube_fim'           => 'Marca Clube Fim',
      'marca_clube_renegociacao'  => 'Marca Clube Renegociação',
      'contrato_clube_inicio'     => 'Contrato Clube Início',
      'contrato_clube_fim'        => 'Contrato Clube Fim',
      'contrato_clube_renegociacao'=> 'Contrato Clube Renegociação',
    ] as $field => $label)
      <div class="form-control w-full">
        <label class="label"><span class="label-text text-sm">{{ $label }}</span></label>
        @if(str_starts_with($field, 'data_') || str_contains($field, '_inicio') || str_contains($field, '_fim'))
          <input type="date"
                 class="input input-sm input-bordered w-full bg-gray-100"
                 value="{{ optional($client->{$field})->format('Y-m-d') }}"
                 readonly>
        @else
          <input type="text"
                 class="input input-sm input-bordered w-full bg-gray-100"
                 value="{{ $client->{$field} ?? '—' }}"
                 readonly>
        @endif
      </div>
    @endforeach
  </div>

  {{-- Recebe E-mails --}}
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach([
      'orcamentos' => 'Orçamentos',
      'encomendas' => 'Encomendas',
      'faturas'    => 'Faturas',
      'campanhas'  => 'Campanhas',
    ] as $key => $label)
      <div class="form-control w-full">
        <label class="label"><span class="label-text text-sm">Recebe {{ $label }}</span></label>
        <input type="text"
               class="input input-sm input-bordered w-full bg-gray-100"
               value="{{ $client->{'recebe_email_' . $key} === '1' ? 'Sim' : 'Não' }}"
               readonly>
      </div>
    @endforeach
  </div>

  {{-- Padrão e Cores --}}
  <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Padrão</span></label>
      <input type="text"
             class="input input-sm input-bordered w-full bg-gray-100"
             value="{{ optional($client->padrao)->name ?? '—' }}"
             readonly>
    </div>

    @for($i = 1; $i <= 3; $i++)
      <div class="form-control w-full">
        <label class="label"><span class="label-text text-sm">Cor Clube {{ $i }}</span></label>
        <input type="text"
               class="input input-sm input-bordered w-full bg-gray-100"
               value="{{ optional($client->{'corClube' . $i})->name ?? '—' }}"
               readonly>
      </div>
    @endfor
  </div>

  {{-- Cliente Desde e Limite de Crédito --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Cliente Desde</span></label>
      <input type="date"
             class="input input-sm input-bordered w-full bg-gray-100"
             value="{{ optional($client->cliente_desde)->format('Y-m-d') }}"
             readonly>
    </div>
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Limite de Crédito</span></label>
      <input type="text"
             class="input input-sm input-bordered w-full bg-gray-100"
             value="€{{ number_format($client->limite_credito, 2, ',', '.') }}"
             readonly>
    </div>
  </div>

  {{-- Notas Gerais --}}
  <div class="form-control w-full">
    <label class="label"><span class="label-text text-sm">Notas Gerais</span></label>
    <textarea class="textarea textarea-sm w-full bg-gray-100 whitespace-pre-line" rows="4" readonly>
      {{ $client->notas_gerais }}
    </textarea>
  </div>
</div>

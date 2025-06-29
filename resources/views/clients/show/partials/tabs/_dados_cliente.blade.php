{{-- Dados do Cliente --}}
<div x-show="activeTab==='dados_cliente'" class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    {{-- Número Externo --}}
    <div>
      <label class="label"><span class="label-text text-sm">Número</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->external_id }}</div>
    </div>

    {{-- NIF --}}
    <div>
      <label class="label"><span class="label-text text-sm">NIF</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->nif }}</div>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Nome --}}
    <div>
      <label class="label"><span class="label-text text-sm">Nome</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->name }}</div>
    </div>
    {{-- Telefone --}}
    <div>
      <label class="label"><span class="label-text text-sm">Telefone</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->telefone4 }}</div>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
    {{-- Transporte --}}
    <div>
      <label class="label"><span class="label-text text-sm">Transporte</span></label>
      <div class="select select-sm w-full bg-gray-100">
        {{ optional($client->transporte)->external_id ?? $client->transporte_id }} – {{ optional($client->transporte)->name ?? '—' }}
      </div>
    </div>

    {{-- Pagamento --}}
    <div>
      <label class="label"><span class="label-text text-sm">Pagamento</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->pagamento }}</div>
    </div>

    {{-- Modalidade de Pagamento --}}
    <div>
      <label class="label"><span class="label-text text-sm">Modalidade de Pagamento</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ optional($client->modalidadePagamento)->name ?? '—' }}
      </div>
    </div>
    {{-- Preço --}}
    <div>
      <label class="label"><span class="label-text text-sm">Preço</span></label>
      <div class="input input-sm w-full bg-gray-100">€{{ number_format($client->preco,2,',','.') }}</div>
    </div>

    {{-- Desconto Linha --}}
    <div>
      <label class="label"><span class="label-text text-sm">Desconto Linha (%)</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->desconto_linha }}</div>
    </div>

    {{-- Desconto Global --}}
    <div>
      <label class="label"><span class="label-text text-sm">Desconto Global (%)</span></label>
      <div class="input input-sm w-full bg-gray-100">{{ $client->desconto_global }}</div>
    </div>

    {{-- Website --}}
    <div>
      <label class="label"><span class="label-text text-sm">Website</span></label>
      <div class="input input-sm w-full bg-gray-100">
        @if($client->url)
          <a href="{{ $client->url }}" target="_blank" class="text-blue-600">{{ $client->url }}</a>
        @else
          —
        @endif
      </div>
    </div>
  </div>
</div>

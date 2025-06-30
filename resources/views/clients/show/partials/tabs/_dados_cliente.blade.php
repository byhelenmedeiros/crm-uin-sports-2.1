{{-- Dados do Cliente --}}
<div x-show="activeTab==='dados_cliente'" class="space-y-4">
  {{-- Linhas principais: Número, NIF, Nome, Telefone --}}
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach([
      'external_id' => 'Número',
      'nif'         => 'NIF',
      'name'        => 'Nome',
      'telefone4'   => 'Telefone',
    ] as $field => $label)
      <div class="form-control w-full">
        <label class="label"><span class="label-text text-sm">{{ $label }}</span></label>
        <input
          type="text"
          class="input input-sm input-bordered w-full bg-gray-100"
          value="{{ $client->{$field} ?? '' }}"
          readonly
        />
      </div>
    @endforeach
  </div>

  {{-- Relações e valores monetários/desconto/url --}}
  <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
    {{-- Transporte --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Transporte</span></label>
      <input
        type="text"
        class="input input-sm input-bordered w-full bg-gray-100"
        value="{{ optional($client->transporte)->external_id ?? $client->transporte_id }} – {{ optional($client->transporte)->name ?? '—' }}"
        readonly
      />
    </div>

    {{-- Pagamento --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Pagamento</span></label>
      <input
        type="text"
        class="input input-sm input-bordered w-full bg-gray-100"
        value="{{ $client->pagamento ?? '' }}"
        readonly
      />
    </div>

    {{-- Modalidade de Pagamento --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Modalidade de Pagamento</span></label>
      <input
        type="text"
        class="input input-sm input-bordered w-full bg-gray-100"
        value="{{ optional($client->modalidadePagamento)->name ?? '' }}"
        readonly
      />
    </div>

    {{-- Preço --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Preço</span></label>
      <input
        type="text"
        class="input input-sm input-bordered w-full bg-gray-100"
        value="€{{ number_format($client->preco, 2, ',', '.') }}"
        readonly
      />
    </div>

    {{-- Descontos --}}
    @foreach([
      'desconto_linha'  => 'Desconto Linha (%)',
      'desconto_global' => 'Desconto Global (%)',
    ] as $field => $label)
      <div class="form-control w-full">
        <label class="label"><span class="label-text text-sm">{{ $label }}</span></label>
        <input
          type="text"
          class="input input-sm input-bordered w-full bg-gray-100"
          value="{{ $client->{$field} ?? '' }}"
          readonly
        />
      </div>
    @endforeach

    {{-- Website --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Website</span></label>
      @if($client->url)
        <a href="{{ $client->url }}" target="_blank" class="input input-sm w-full bg-gray-100 text-blue-600 underline">
          {{ $client->url }}
        </a>
      @else
        <input
          type="text"
          class="input input-sm input-bordered w-full bg-gray-100"
          value="—"
          readonly
        />
      @endif
    </div>
  </div>
</div>

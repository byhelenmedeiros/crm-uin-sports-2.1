<section class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    {{-- Número --}}
    <div class="form-control w-full">
      <label for="external_id" class="label"><span class="label-text text-sm">Número</span></label>
      <input
        type="text"
        name="external_id"
        id="external_id"
        value="{{ old('external_id') }}"
        class="input input-xs input-bordered w-full"
      />
      @error('external_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- NIF --}}
    <div class="form-control w-full">
      <label for="nif" class="label"><span class="label-text text-sm">NIF</span></label>
      <input
        type="number"
        name="nif"
        id="nif"
        value="{{ old('nif') }}"
        class="input input-xs input-bordered w-full"
      />
      @error('nif') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    {{-- Nome --}}
    <div class="form-control w-full">
      <label for="name" class="label"><span class="label-text text-sm">Nome</span></label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name') }}"
        class="input input-xs input-bordered w-full"
      />
      @error('name') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- Telefone 4 --}}
    <div class="form-control w-full">
      <label for="telefone4" class="label"><span class="label-text text-sm">Telefone</span></label>
      <input
        type="tel"
        name="telefone4"
        id="telefone4"
        value="{{ old('telefone4') }}"
        class="input input-xs input-bordered w-full"
      />
      @error('telefone4') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
    {{-- Transporte --}}
<div class="form-control w-full">
  <label for="transporte_id" class="label">
    <span class="label-text text-sm">Transporte</span>
  </label>
  <select name="transporte_id"
          id="transporte_id"
          class="select select-xs select-bordered w-full">
    <option value="">—</option>
    @foreach($aux_transportes as $t)
      <option value="{{ $t->id }}"
        @selected(old('transporte_id') == $t->id)>
        {{-- concatena external_id e name --}}
        {{ $t->external_id }} – {{ $t->name }}
      </option>
    @endforeach
  </select>
  @error('transporte_id')
    <span class="text-error text-xs">{{ $message }}</span>
  @enderror
</div>

   {{-- Pagamento --}}
<div class="form-control w-full">
  <label for="pagamento" class="label">
    <span class="label-text text-sm">Pagamento</span>
  </label>
  <select
    name="pagamento"
    id="pagamento"
    class="select select-xs select-bordered w-full"
  >
    <option value="">Selecione</option>
    @foreach($auxPagamento as $pag)
      <option value="{{ $pag->id }}" {{ old('pagamento') == $pag->id ? 'selected' : '' }}>
        {{ $pag->name }}
      </option>
    @endforeach
  </select>
  @error('pagamento')
    <span class="text-error text-xs">{{ $message }}</span>
  @enderror
</div>

  {{-- Modalidade_pagamento--}}
<div class="form-control w-full">
  <label for="modalidade_pagamento_id" class="label">
    <span class="label-text text-sm">Modalidade de Pagamento</span>
  </label>
  <select
    name="modalidade_pagamento_id"
    id="modalidade_pagamento_id"
    class="select select-xs select-bordered w-full"
  >
    <option value="">Selecione</option>
    @foreach($auxModalidadePagamento as $pag)
      <option value="{{ $pag->id }}" {{ old('modalidade_pagamento_id') == $pag->id ? 'selected' : '' }}>
        {{ $pag->name }}
      </option>
    @endforeach
  </select>
  @error('modalidade_pagamento_id')
    <span class="text-error text-xs">{{ $message }}</span>
  @enderror
</div>


    {{-- Preço --}}
  <div class="form-control w-full">
  <label for="preco" class="label">
    <span class="label-text text-sm">Preço</span>
  </label>
  <input
    type="text"
    name="preco"
    id="preco"
    value="{{ old('preco') }}"
    class="input input-xs input-bordered w-full"
  />
  @error('preco')
    <span class="text-error text-xs">{{ $message }}</span>
  @enderror
</div>

    {{-- Desconto Linha --}}
    <div class="form-control w-full">
      <label for="desconto_linha" class="label"><span class="label-text text-sm">Desconto Linha (%)</span></label>
      <input
        type="number"
        name="desconto_linha"
        id="desconto_linha"
        step="0.01"
        value="{{ old('desconto_linha') }}"
        class="input input-xs input-bordered w-full"
      />
      @error('desconto_linha') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- Desconto Global --}}
    <div class="form-control w-full">
      <label for="desconto_global" class="label"><span class="label-text text-sm">Desconto Global (%)</span></label>
      <input
        type="number"
        name="desconto_global"
        id="desconto_global"
        step="0.01"
        value="{{ old('desconto_global') }}"
        class="input input-xs input-bordered w-full"
      />
      @error('desconto_global') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- Website --}}
    <div class="form-control w-full">
      <label for="url" class="label"><span class="label-text text-sm">Website</span></label>
      <input
        type="url"
        name="url"
        id="url"
        value="{{ old('url') }}"
        class="input input-xs input-bordered w-full"
      />
      @error('url') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
  </div>
</section>

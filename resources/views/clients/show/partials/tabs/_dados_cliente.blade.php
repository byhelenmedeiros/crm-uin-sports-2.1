<section
  x-show="activeTab==='dados_cliente'"
  x-data="{ editing: false }"
  class="space-y-4"
>
  <form
    action="{{ route('clients.update', $client) }}"
    method="POST"
    @submit="editing = false"
    class="space-y-4"
  >
    @csrf
    @method('PUT')

    <div class="flex justify-end">
      <button
        type="button"
        x-show="!editing"
        @click="editing = true"
        class="btn btn-sm btn-outline"
      >Editar Tudo</button>

      <div x-show="editing" class="space-x-2">
        <button type="submit" class="btn btn-sm btn-success">Salvar Tudo</button>
        <button
          type="button"
          @click="editing = false; $el.closest('form').reset()"
          class="btn btn-sm btn-error"
        >Cancelar</button>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <!-- External ID, NIF, Name, Telefone as before -->
      @foreach([
        'external_id' => 'Número',
        'nif'         => 'NIF',
        'name'        => 'Nome',
        'telefone4'   => 'Telefone',
      ] as $field => $label)
        <div class="form-control w-full">
          <label for="{{ $field }}" class="label"><span class="label-text text-sm">{{ $label }}</span></label>
          <input
            name="{{ $field }}"
            id="{{ $field }}"
            type="{{ $field==='nif' ? 'number' : 'text' }}"
            value="{{ old($field, $client->{$field}) }}"
            :readonly="!editing"
            :class="editing? 'bg-white':'bg-gray-100'"
            class="input input-xs input-bordered w-full"
          />
          @error($field) <span class="text-error text-xs">{{ $message }}</span> @enderror
        </div>
      @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
      {{-- Transporte --}}
      <div class="form-control w-full">
        <label for="transporte_id" class="label"><span class="label-text text-sm">Transporte</span></label>
        <template x-if="!editing">
          <input
            type="text"
            readonly
            class="input input-xs input-bordered w-full bg-gray-100"
            value="{{ optional($client->transporte)->external_id ?? $client->transporte_id }} – {{ optional($client->transporte)->name ?? '—' }}"
          />
        </template>
        <template x-if="editing">
          <select
            name="transporte_id"
            id="transporte_id"
            class="select select-xs select-bordered w-full"
          >
            <option value="">—</option>
            @foreach($auxTransportes as $t)
              <option value="{{ $t->id }}"
                {{ old('transporte_id', $client->transporte_id) == $t->id ? 'selected' : '' }}
              >{{ $t->external_id }} – {{ $t->name }}</option>
            @endforeach
          </select>
        </template>
        @error('transporte_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
      </div>

      {{-- Pagamento --}}
      <div class="form-control w-full">
        <label for="pagamento" class="label"><span class="label-text text-sm">Pagamento</span></label>
        <template x-if="!editing">
          <input
            type="text"
            readonly
            class="input input-xs input-bordered w-full bg-gray-100"
            value="{{ optional($client->pagamentoObj)->name ?? $client->pagamento ?? '' }}"
          />
        </template>
        <template x-if="editing">
          <select
            name="pagamento"
            id="pagamento"
            class="select select-xs select-bordered w-full"
          >
            <option value="">Selecione</option>
            @foreach($auxPagamento as $pag)
              <option value="{{ $pag->id }}"
                {{ old('pagamento', $client->pagamento) == $pag->id ? 'selected' : '' }}
              >{{ $pag->name }}</option>
            @endforeach
          </select>
        </template>
        @error('pagamento') <span class="text-error text-xs">{{ $message }}</span> @enderror
      </div>

      {{-- Modalidade de Pagamento --}}
      <div class="form-control w-full">
        <label for="modalidade_pagamento_id" class="label"><span class="label-text text-sm">Modalidade de Pagamento</span></label>
        <template x-if="!editing">
          <input
            type="text"
            readonly
            class="input input-xs input-bordered w-full bg-gray-100"
            value="{{ optional($client->modalidadePagamento)->name ?? '' }}"
          />
        </template>
        <template x-if="editing">
          <select
            name="modalidade_pagamento_id"
            id="modalidade_pagamento_id"
            class="select select-xs select-bordered w-full"
          >
            <option value="">Selecione</option>
            @foreach($auxModalidadePagamento as $mod)
              <option value="{{ $mod->id }}"
                {{ old('modalidade_pagamento_id', $client->modalidade_pagamento_id) == $mod->id ? 'selected' : '' }}
              >{{ $mod->name }}</option>
            @endforeach
          </select>
        </template>
        @error('modalidade_pagamento_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
      </div>

      {{-- Preço, Descontos, URL --}}
      @foreach([
        'preco'            => ['type'=>'text','label'=>'Preço'],
        'desconto_linha'   => ['type'=>'number','label'=>'Desconto Linha (%)','step'=>'0.01'],
        'desconto_global'  => ['type'=>'number','label'=>'Desconto Global (%)','step'=>'0.01'],
        'url'              => ['type'=>'url','label'=>'Website'],
      ] as $field => $opts)
        <div class="form-control w-full">
          <label for="{{ $field }}" class="label"><span class="label-text text-sm">{{ $opts['label'] }}</span></label>
          <input
            name="{{ $field }}"
            id="{{ $field }}"
            type="{{ $opts['type'] }}"
            @if($field==='url')
              value="{{ old($field, $client->url) }}"
            @else
              value="{{ old($field, $client->{$field}) }}"
            @endif
            :readonly="!editing"
            :class="editing?'bg-white':'bg-gray-100'"
            step="{{ $opts['step'] ?? '' }}"
            class="input input-xs input-bordered w-full"
          />
          @error($field) <span class="text-error text-xs">{{ $message }}</span> @enderror
        </div>
      @endforeach
    </div>
  </form>
</section>

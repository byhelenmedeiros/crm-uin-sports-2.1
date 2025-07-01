<section class="w-full bg-base-100 rounded-xl shadow p-4">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">{{ $title }}</h1>
  </div>

  {{-- Formulário de criação oculto --}}
  <form id="create-form" method="POST" action="{{ route($routePrefix . '.store') }}" class="hidden">
    @csrf
  </form>

  <table class="table table-zebra w-full border rounded-lg">
    <thead>
      <tr>
        <th><input type="checkbox" id="select-all" class="checkbox checkbox-sm" /></th>
        <th class="py-2">ID</th>
        @foreach($columns as $col)
          <th class="py-2">{{ $col['label'] }}</th>
        @endforeach
        <th class="py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
     {{-- Linha de criação full-width --}}
<tr>
  {{-- colspan = checkbox + ID + N colunas + Ações --}}
  <td colspan="{{ 2 + count($columns) + 1 }}" class="p-0">
    <div class="flex items-center gap-2 bg-base-200 p-3 rounded-lg w-full">
      {{-- Espaço reservado para checkbox + ID --}}
      <div class="w-6"></div>
      <div class="w-6 text-center font-medium">—</div>

      {{-- Inputs inline, dividindo igualmente --}}
      @foreach($columns as $col)
        @if(in_array($col['field'], ['external_id','name','agrup_external_id','agrup_name']))
          <div class="form-control flex-1">
            <input
              type="text"
              name="{{ $col['field'] }}"
              form="create-form"
              placeholder="{{ $col['label'] }}"
              class="input input-bordered input-sm w-full"
              @if(in_array($col['field'], ['name','agrup_name'])) required @endif
            />
          </div>
        @endif
      @endforeach

      {{-- Botão Salvar com ícone FontAwesome --}}
      <button
        type="submit"
        form="create-form"
        class="btn btn-success btn-sm flex items-center gap-1"
      >
        <i class="fa-solid fa-save"></i>
        Salvar
      </button>
    </div>
  </td>
</tr>


      {{-- Linhas de dados --}}
      @foreach($items as $item)
        {{-- Form de update oculto --}}
        <form id="update-form-{{ $item->id }}" method="POST"
              action="{{ route($routePrefix . '.update', $item->id) }}"
              class="hidden">
          @csrf
          @method('PUT')
        </form>

        <tr x-data="{ editing: false }">
          {{-- Modo View --}}
          <template x-if="!editing">
            <tr>
              <td class="py-2">
                <input type="checkbox" class="checkbox checkbox-sm row-checkbox"
                       name="ids[]" value="{{ $item->id }}"
                       form="mass-delete-form" />
              </td>
              <td class="py-2">{{ $item->id }}</td>
              @foreach($columns as $col)
                <td class="py-2">{{ data_get($item, $col['field'], '—') }}</td>
              @endforeach
              <td class="py-2 space-x-1">
                <button @click="editing = true"
                        class="btn btn-xs btn-outline">Editar</button>
                <form method="POST"
                      action="{{ route($routePrefix . '.destroy', $item->id) }}"
                      class="inline-block"
                      onsubmit="return confirm('Excluir #{{ $item->id }}?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-xs btn-error">✕</button>
                </form>
              </td>
            </tr>
          </template>

          {{-- Modo Edit --}}
          <template x-if="editing">
            <tr>
              <td class="py-2"></td>
              <td class="py-2">{{ $item->id }}</td>
              @foreach($columns as $col)
                @if(in_array($col['field'], ['external_id','name','agrup_external_id','agrup_name']))
                  <td class="py-2">
                    <input
                      type="text"
                      name="{{ $col['field'] }}"
                      form="update-form-{{ $item->id }}"
                      value="{{ data_get($item, $col['field'], '') }}"
                      placeholder="{{ $col['label'] }}"
                      class="input input-bordered input-sm w-full"
                      @if(in_array($col['field'], ['name','agrup_name'])) required @endif
                    />
                  </td>
                @else
                  <td class="py-2">{{ data_get($item, $col['field'], '—') }}</td>
                @endif
              @endforeach
              <td class="py-2 space-x-1">
                <button type="submit"
                        form="update-form-{{ $item->id }}"
                        class="btn btn-xs btn-success">
                  ✓
                </button>
                <button type="button"
                        @click="editing = false"
                        class="btn btn-xs btn-ghost">
                  ✕
                </button>
              </td>
            </tr>
          </template>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- Exclusão em massa --}}
  <form id="mass-delete-form" method="POST"
        action="{{ route($routePrefix . '.massDestroy') }}" class="hidden">
    @csrf
  </form>

  <div class="mt-4 text-right">
    <button type="submit" form="mass-delete-form"
            class="btn btn-sm btn-error"
            onclick="return confirm('Excluir selecionados?')">
      Excluir selecionados
    </button>
  </div>
</section>

@push('scripts')
<script>
  document.getElementById('select-all')
    .addEventListener('change', function() {
      document.querySelectorAll('.row-checkbox')
        .forEach(cb => cb.checked = this.checked);
    });
</script>
@endpush

@props([
  'items',
  'title',
  'routePrefix',
  'columns',
   'parents',
])

<section class="w-full bg-base-100 rounded-xl shadow p-2">
  <div class="flex justify-between items-center mb-2">
    <h1 class="text-lg font-semibold">{{ $title }}</h1>

    

  </div>

  {{-- Criação inline --}}
  <form id="create-form" method="POST" action="{{ route($routePrefix . '.store') }}" style="display: none;">
    @csrf
  </form>

  <table class="table table-zebra table-compact w-full border rounded-lg">
    <thead>
      <tr>
        <th><input type="checkbox" id="select-all"></th>
        <th class="py-1">ID</th>
        @foreach($columns as $col)
          <th class="py-1">{{ $col['label'] }}</th>
        @endforeach
        <th class="py-1">Ações</th>
      </tr>
    </thead>
    <tbody>
                                    {{-- Linha de criação --}}
     {{-- Linha de criação inline --}}
      <tr>
        <td></td>
        <td class="py-1">—</td>

  @foreach($columns as $col)
  @if(in_array($col['field'], [
       'external_id',
       'name',
       'agrup_external_id',
       'agrup_name',
    ]))
    <td class="py-1">
      <input
        type="text"
        name="{{ $col['field'] }}"
        form="create-form"
        class="input input-sm w-full"
        placeholder="{{ $col['label'] }}"
        @if(in_array($col['field'], ['name','agrup_name'])) required @endif
      >
    </td>
  @else
    <td class="py-1">—</td>
  @endif
@endforeach


        <td class="py-1">
          <button type="submit" form="create-form" class="btn btn-sm btn-success">
            Salvar
          </button>
        </td>
      </tr>
      @foreach($items as $item)
        {{-- Linha de visualização --}}
        <tr id="view-{{ $item->id }}">
          <td class="py-1">
            <input
              type="checkbox"
              class="row-checkbox"
              name="ids[]"
              value="{{ $item->id }}"
              form="mass-delete-form"
            >
          </td>
          <td class="py-1">{{ $item->id }}</td>

         @foreach($columns as $col)
    @if($col['field']==='name_parent_id')
    <td class="py-1">{{ $item->name_parent_id ?? '—' }}</td>
  @else
       <td class="py-1">{{ data_get($item, $col['field'], '—') }}</td>

  @endif
@endforeach

          <td class="flex gap-1 py-1">
            <button type="button" class="btn btn-xs" onclick="window.startEdit({{ $item->id }})">Editar</button>
            <form
              method="POST"
              action="{{ route($routePrefix . '.destroy', $item->id) }}"
              onsubmit="return confirm('Confirma exclusão do registro #{{ $item->id }}?')"
            >
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-xs btn-error">Excluir</button>
            </form>
          </td>
        </tr>

        {{-- Formulário de edição inline --}}
        <form
          id="edit-form-{{ $item->id }}"
          method="POST"
          action="{{ route($routePrefix . '.update', $item->id) }}"
          style="display:none;"
        >
          @csrf
          @method('PUT')
        </form>
      @endforeach
    </tbody>
  </table>

  {{-- Formulário para massDestroy --}}
  <form
    id="mass-delete-form"
    method="POST"
    action="{{ route($routePrefix . '.massDestroy') }}"
    style="display: none;"
  >
    @csrf
  </form>

  <div class="mt-2 text-right">
    <button
      type="submit"
      form="mass-delete-form"
      class="btn btn-sm btn-error"
      onclick="return confirm('Excluir todos os selecionados?')"
    >
      Excluir selecionados
    </button>
  </div>


  
</section>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('select-all').addEventListener('change', function() {
      document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = this.checked);
    });
  });
  
  window.startEdit = function(id) {
    document.getElementById(`view-${id}`).classList.add('hidden');
    document.getElementById(`edit-${id}`).classList.remove('hidden');
  };
  
  window.cancelEdit = function(id) {
    document.getElementById(`edit-${id}`).classList.add('hidden');
    document.getElementById(`view-${id}`).classList.remove('hidden');
  };
</script>
@endpush

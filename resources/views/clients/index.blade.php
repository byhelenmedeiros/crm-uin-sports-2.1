@extends('layouts.app')

@section('title', 'Lista de Clientes')
@section('content')
<div class="mx-auto space-y-4" x-data="clientIndex()" x-init="fetch()">

  {{-- 1) Campo de busca com placeholder instrutivo --}}
  <div class="flex items-center space-x-2 mb-2">
    <input
      x-model.debounce.500="search"
      @keydown.enter.prevent="fetch()"
      type="text"
      placeholder="Buscar por Número, Nome ou NIF…"
      class="input input-sm input-bordered w-full max-w-xs text-sm"
      autofocus
    />
    <button
      @click="fetch()"
      class="btn btn-sm btn-secondary text-sm"
    >Buscar</button>
    <button
      x-show="search"
      @click="clearSearch()"
      class="btn btn-sm btn-ghost text-sm"
      title="Limpar filtro"
    >&times;</button>
  </div>

  {{-- 2) Aviso de filtro ativo --}}
  <div
    x-show="search"
    class="p-2 bg-blue-100 text-blue-800 text-sm"
    x-text="`Exibindo resultados para: “${search}”`"
  ></div>

  {{-- 3) Tabela de resultados --}}
  <div class="overflow-x-auto bg-transparent">
    <table class="table-auto w-full text-left text-sm">
      <thead class="bg-gray-200">
        <tr>
          <th class="px-3 py-2">Número do Cliente</th>
          <th class="px-3 py-2">Nome</th>
          <th class="px-3 py-2">NIF</th>
          <th class="px-3 py-2 text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <template x-if="items.data.length">
          <template x-for="(client, idx) in items.data" :key="client.id">
            <tr :class="idx % 2 === 0 ? 'bg-white' : 'bg-gray-100'">
              <td class="px-3 py-1" x-text="client.external_id"></td>
              <td class="px-3 py-1" x-text="client.name"></td>
              <td class="px-3 py-1" x-text="client.nif ?? '—'"></td>
              <td class="px-3 py-1 text-center space-x-2">
                <a
                  :href="`/clients/${client.id}`"
                  class="btn btn-xs btn-primary text-xs"
                >Ver</a>
                <button
                  @click="destroy(client.id)"
                  class="btn btn-xs btn-error text-xs"
                >Excluir</button>
              </td>
            </tr>
          </template>
        </template>
        <tr x-show="!items.data.length">
          <td colspan="4" class="px-3 py-4 text-center text-gray-500">
            Nenhum cliente encontrado.
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  {{-- 4) Paginação --}}
  <div class="mt-4 flex justify-center space-x-2">
    <button
      class="btn btn-xs text-xs"
      :disabled="!items.prev_page_url"
      @click="fetch(items.prev_page_url)"
    >&laquo; Anterior</button>
    <span class="text-xs leading-loose">
      Página <span x-text="items.current_page"></span> de <span x-text="items.last_page"></span>
    </span>
    <button
      class="btn btn-xs text-xs"
      :disabled="!items.next_page_url"
      @click="fetch(items.next_page_url)"
    >Próxima &raquo;</button>
  </div>

</div>

<script>
function clientIndex() {
  return {
    search: @js($search),
    items: { data: [], current_page:1, last_page:1, prev_page_url:null, next_page_url:null },

    // busca/recarga a página (URL opcional p/ paginar)
    fetch(url = null) {
      const params = new URLSearchParams();
      if (this.search) params.set('search', this.search);
      const endpoint = url || `{{ route('clients.index') }}?${params.toString()}`;
      fetch(endpoint, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
        .then(r => r.json())
        .then(json => this.items = json);
    },

    // exclui e recarrega
    destroy(id) {
      if (!confirm('Excluir este cliente?')) return;
      fetch(`/clients/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'X-Requested-With': 'XMLHttpRequest'
        }
      }).then(() => this.fetch());
    },

    clearSearch() {
      this.search = '';
      this.fetch();
    }
  }
}
</script>
@endsection

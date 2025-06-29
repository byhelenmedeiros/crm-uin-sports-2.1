<div class="p-4" x-data="{ selectedGroup:'', selectedSub:'' }">
  <div class="grid grid-cols-4 md:grid-cols-4 gap-1">

    {{-- Grupo de Cliente --}}
    <div class="form-control w-full">
      <label class="label">
        <span class="label-text text-sm">Grupo de Cliente</span>
      </label>
      <select name="client_group_id"
              x-model="selectedGroup"
              class="select select-sm select-bordered w-full">
        <option value="">Selecione o grupo de cliente</option>
        @foreach($auxGrupoClientes as $g)
          <option value="{{ $g->id }}">
            {{ $g->external_id }} – {{ $g->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Subdivisão --}}
    <div class="form-control w-full">
      <label class="label">
        <span class="label-text text-sm">Agrupamento</span>
      </label>
      <select name="group_subdivision_id"
              x-model="selectedSub"
              class="select select-sm select-bordered w-full">
        <option value="">Selecione o agrupamento</option>
        @foreach($auxGrupoClientes as $g)
          @foreach($g->children as $s)
            <option
              value="{{ $s->id }}"
              x-show="selectedGroup == {{ $g->id }}">
              {{ $s->external_id }} – {{ $s->name }}
            </option>
          @endforeach
        @endforeach
      </select>
    </div>

  </div>

  
</div>

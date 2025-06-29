{{-- Grupos de Cliente --}}
<div x-show="activeTab==='grupos'" class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Grupo de Cliente --}}
    <div>
      <label class="label"><span class="label-text text-sm">Grupo de Cliente</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ optional($client->clientGroup)->external_id }} – {{ optional($client->clientGroup)->name }}
      </div>
    </div>

    {{-- Agrupamento/Subdivisão --}}
    <div>
      <label class="label"><span class="label-text text-sm">Agrupamento</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ optional($client->groupSubdivision)->external_id }} – {{ optional($client->groupSubdivision)->name }}
      </div>
    </div>
  </div>
</div>

<div class="p-4"
     x-data="groupComponent({{ $clientGroups->toJson() }})"
     x-init="">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Grupo de Cliente --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Grupo de Cliente</span></label>
      <select name="client_group_id"
              x-model="selectedGroup"
              @change="loadSubs()"
              class="select select-sm select-bordered w-full">
        <option value="">— Seleciona —</option>
        <template x-for="g in groups" :key="g.id">
          <option :value="g.id" x-text="`${g.external_id} – ${g.name}`"></option>
        </template>
      </select>
    </div>

    {{-- Subdivisão --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Subdivisão</span></label>
      <select name="group_subdivision_id"
              x-model="selectedSub"
              class="select select-sm select-bordered w-full">
        <option value="">—</option>
        <template x-for="s in subs" :key="s.id">
          <option :value="s.id" x-text="`${s.external_id} – ${s.name}`"></option>
        </template>
      </select>
    </div>
  </div>

  {{-- Log visível --}}
  <div x-show="log" class="mt-4 p-2 bg-yellow-100 text-yellow-800 rounded">
    <span x-text="log"></span>
  </div>
</div>

<script>
function groupComponent(initialGroups) {
  return {
    groups: initialGroups,
    subs: [],
    selectedGroup: '',
    selectedSub: '',
    log: '',

    loadSubs() {
      if (!this.selectedGroup) {
        this.subs = [];
        this.selectedSub = '';
        this.log = 'Nenhuma subdivisão para mostrar.';
        return;
      }
      this.log = 'Carregando subdivisões…';
      fetch(`/api/aux-grupo-clientes/${this.selectedGroup}/subdivisions`)
        .then(res => { if (!res.ok) throw new Error('Falha ao carregar'); return res.json(); })
        .then(data => {
          this.subs = data;
          this.selectedSub = '';
          this.log = data.length
            ? `Encontradas ${data.length} subdivisão(ões).`
            : 'Este grupo não possui subdivisões.';
        })
        .catch(err => {
          this.subs = [];
          this.selectedSub = '';
          this.log = `Erro: ${err.message}`;
        });
    }
  }
}
</script>

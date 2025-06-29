<section
  x-data="{
    modalidades: [],
    active: 0,
    init() {
      let saved = localStorage.getItem('modalidades')
      this.modalidades = saved ? JSON.parse(saved) : []
      if (!this.modalidades.length) this.add()
      this.$watch('modalidades', v => localStorage.setItem('modalidades', JSON.stringify(v)), { deep: true })
    },
    add() {
      this.modalidades.push({
        external_id: '',
        name: '',
        associacao: '',
        numero_atletas: '',
        escaloes: '',
        marca_inicio: '',
        marca_fim: '',
        marca_renegociacao: '',
        contrato_inicio: '',
        contrato_fim: '',
        contrato_renegociacao: '',
        responsavel_nome_1: '',
        responsavel_cargo_1: '',
        responsavel_email_1: '',
        responsavel_telemovel_1: '',
        responsavel_nome_2: '',
        responsavel_cargo_2: '',
        responsavel_email_2: '',
        responsavel_telemovel_2: '',
        recebe_email_orcamentos: '1',
        recebe_email_encomendas: '1',
        recebe_email_faturas: '1',
        recebe_email_campanhas: '1',
        pack_medio: '',
        pack_frequencia_inicio: '',
        previsao_ano1: '',
        previsao_ano2: '',
        notas_modalidade: '',
        documentos: []
         
        
      })
      this.active = this.modalidades.length - 1
    },
    remove(i) {
      this.modalidades.splice(i, 1)
      if (this.active >= this.modalidades.length) this.active = this.modalidades.length - 1
      if (!this.modalidades.length) this.add()
    }
  }"
  x-init="init()"
  class="space-y-2 max-h-screen overflow-y-auto"
>
  {{-- Abas compactas --}}
  <div class="flex space-x-1 overflow-x-auto py-1">
    <template x-for="(_,i) in modalidades" :key="i">
      <button
        type="button"
        @click="active = i"
        :class="active === i ? 'btn btn-xs btn-primary' : 'btn btn-xs btn-outline'"
      >
        #<span x-text="i+1"></span>
      </button>
    </template>
    <button type="button" @click="add()" class="btn btn-xs btn-secondary">+</button>
  </div>

 <form method="POST"
        action="{{ isset($client)
                 ? route('clients.modalidades.store', $client)
                  : route('clients.store') }}">    @csrf

    <template x-for="(m,i) in modalidades" :key="i">
      <div
        x-show="active === i"
        class="collapse collapse-arrow border rounded p-2 space-y-2"
        :class="active === i ? 'collapse-open' : ''"
      >
        <input type="checkbox" class="peer" x-model="active" :true-value="i" :false-value="-1" hidden />

        <div class="grid grid-cols-6 md:grid-cols-6 gap-2">
          <div class="form-control">
            <label class="label"><span class="label-text text-xs">External ID</span></label>
            <input type="text" x-model="m.external_id" :name="`modalidades[${i}][external_id]`"
                   class="input input-xs input-bordered w-full"/>
          </div>
         <div class="form-control">
  <label class="label"><span class="label-text text-xs">Modalidade</span></label>
  <select
    x-model="m.aux_modalidade_id"
    :name="`modalidades[${i}][aux_modalidade_id]`"
    class="select select-xs select-bordered w-full"
    required
  >
    <option value="">— selecione —</option>
    @foreach($auxModalidades as $am)
      <option value="{{ $am->id }}">{{ $am->name }}</option>
    @endforeach
  </select>
</div>

          <!-- Associação -->
          <div class="form-control">
            <label class="label"><span class="label-text text-xs">Associação</span></label>
            <input type="text" x-model="m.associacao" :name="`modalidades[${i}][associacao]`"
                   class="input input-xs input-bordered w-full"/>
          </div>
          <!-- Nº Atletas -->
          <div class="form-control">
            <label class="label"><span class="label-text text-xs">Nº Atletas</span></label>
            <input type="number" min="0" x-model.number="m.numero_atletas"
                   :name="`modalidades[${i}][numero_atletas]`" class="input input-xs input-bordered w-full"/>
          </div>
       
<div class="form-control">
  <label class="label"><span class="label-text text-xs">Escalões</span></label>
  <select
    x-model="m.escaloes"
    :name="`modalidades[${i}][escaloes]`"
    class="select select-xs select-bordered w-full"
  >
    <option value="">— selecione —</option>
    @foreach($escaloes as $esc)
      <option value="{{ $esc->id }}">{{ $esc->name }}</option>
    @endforeach
  </select>
</div> </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
          <template x-for="(lbl,key) in { marca_inicio:'Início', marca_fim:'Fim', marca_renegociacao:'Reneg.' }" :key="key">
            <div class="form-control">
              <label class="label"><span class="label-text text-xs" x-text="lbl"></span></label>
              <input type="date" x-model="m[key]" :name="`modalidades[${i}][${key}]`"
                     class="input input-xs input-bordered w-full"/>
            </div>
          </template>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
          <template x-for="(lbl,key) in { contrato_inicio:'Início', contrato_fim:'Fim', contrato_renegociacao:'Reneg.' }" :key="key">
            <div class="form-control">
              <label class="label"><span class="label-text text-xs" x-text="lbl"></span></label>
              <input type="date" x-model="m[key]" :name="`modalidades[${i}][${key}]`"
                     class="input input-xs input-bordered w-full"/>
            </div>
          </template>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
          <template x-for="(lbl,key) in { orcamentos:'Orç.', encomendas:'Enc.', faturas:'Fat.', campanhas:'Camp.' }" :key="key">
            <div class="form-control">
              <label class="label"><span class="label-text text-xs" x-text="lbl"></span></label>
              <select x-model="m[`recebe_email_${key}`]" :name="`modalidades[${i}][recebe_email_${key}]`"
                      class="select select-xs select-bordered w-full">
                <option value="1">Sim</option>
                <option value="0">Não</option>
              </select>
            </div>
          </template>
        </div>

        <div class="grid grid-cols-6 md:grid-cols-6 gap-2">
          <div class="form-control">
            <label class="label"><span class="label-text text-xs">Pack Médio (€)</span></label>
            <input type="number" step="0.01" x-model="m.pack_medio"
                   :name="`modalidades[${i}][pack_medio]`" class="input input-xs input-bordered w-full"/>
          </div>
          <div class="form-control">
            <label class="label"><span class="label-text text-xs">Pack Início</span></label>
            <input type="date" x-model="m.pack_frequencia_inicio"
                   :name="`modalidades[${i}][pack_frequencia_inicio]`" class="input input-xs input-bordered w-full"/>
          </div>
        </div>
       {{-- Previsões de Volume de Negócio --}}
<section
  x-data="{
    nextIndex: {{ count(old('previsoes', $client->previsoes ?? [])) }},
    add() {
      const tpl = document.getElementById('tpl-previsao').innerHTML;
      const html = tpl.replace(/__INDEX__/g, this.nextIndex);
      document.getElementById('tb-previsoes').insertAdjacentHTML('beforeend', html);
      this.nextIndex++;
    },
    remove(i) {
      document.getElementById('row-' + i)?.remove();
    }
  }"
  class="space-y-2"
>
  <table class="table-auto w-full text-sm">
    <thead>
      <tr>
        <th>Ano</th>
        <th>Valor</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="tb-previsoes">
      {{-- 1) reutiliza old() se houver --}}
      @if(old('previsoes'))
        @foreach(old('previsoes') as $i => $p)
          <tr id="row-{{ $i }}">
            <td>
              <input
                type="number"
                name="previsoes[{{ $i }}][ano]"
                value="{{ $p['ano'] }}"
                class="input input-xs w-20"
              />
            </td>
            <td>
              <input
                type="number"
                name="previsoes[{{ $i }}][valor]"
                value="{{ $p['valor'] }}"
                step="0.01"
                class="input input-xs w-24"
              />
            </td>
            <td>
              <button type="button" @click="remove({{ $i }})" class="btn btn-ghost btn-xs">×</button>
            </td>
          </tr>
        @endforeach

      {{-- 2) senão, lista as existentes do cliente --}}
      @elseif(isset($client) && $client->previsoes->count())
        @foreach($client->previsoes as $i => $p)
          <tr id="row-{{ $i }}">
            <td>
              <input
                type="number"
                name="previsoes[{{ $i }}][ano]"
                value="{{ $p->ano }}"
                class="input input-xs w-20"
              />
            </td>
            <td>
              <input
                type="number"
                name="previsoes[{{ $i }}][valor]"
                value="{{ $p->valor }}"
                step="0.01"
                class="input input-xs w-24"
              />
            </td>
            <td>
              <button type="button" @click="remove({{ $i }})" class="btn btn-ghost btn-xs">×</button>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>

  <button type="button" @click="add()" class="btn btn-sm btn-secondary mt-2">+ Ano</button>

  {{-- Template oculto para nova linha --}}
  <template id="tpl-previsao">
    <tr id="row-__INDEX__">
      <td>
        <input
          type="number"
          name="previsoes[__INDEX__][ano]"
          class="input input-xs w-20"
        />
      </td>
      <td>
        <input
          type="number"
          name="previsoes[__INDEX__][valor]"
          step="0.01"
          class="input input-xs w-24"
        />
      </td>
      <td>
        <button type="button" @click="remove(__INDEX__)" class="btn btn-ghost btn-xs">×</button>
      </td>
    </tr>
  </template>
</section>


       <!-- Upload Documentos PDF/JPG -->
<div class="form-control">
  <label class="label"><span class="label-text text-xs">Documentos (PDF/JPG)</span></label>
  <input
    type="file"
    multiple
    accept=".pdf,.jpg,.jpeg"
    class="file-input file-input-xs file-input-bordered w-full"
    name="modalidades_files[{{ $loop->index ?? '${i}' }}][]"
  />
</div>


        <div class="flex justify-between items-center">
          <button type="button" @click="remove(i)" class="btn btn-ghost btn-xs text-error">Remover</button>
          <span class="text-xs">Modalidade <strong x-text="i+1"></strong></span>
        </div>
      </div>
    </template>

    <input type="hidden" name="modalidades_json" :value="JSON.stringify(modalidades)" />

    <div class="pt-2">
      <button type="submit" class="btn btn-sm btn-primary w-full">Confirmar Todas</button>
    </div>
  </form>
</section>

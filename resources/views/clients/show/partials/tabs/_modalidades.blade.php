 
<section
  x-data="{
    modalidades: {!! $client->modalidades->map(fn($m) => [
      'id'                      => $m->id,
      'associacao'              => $m->associacao,
      'numero_atletas'          => $m->numero_atletas,
      'escaloes'                => $m->escaloes,
      'marca_inicio'            => $m->marca_inicio,
      'marca_fim'               => $m->marca_fim,
      'marca_renegociacao'      => $m->marca_renegociacao,
      'contrato_inicio'         => $m->contrato_inicio,
      'contrato_fim'            => $m->contrato_fim,
      'contrato_renegociacao'   => $m->contrato_renegociacao,
      'responsavel_nome_1'      => $m->responsavel_nome_1,
      'responsavel_cargo_1'     => $m->responsavel_cargo_1,
      'responsavel_email_1'     => $m->responsavel_email_1,
      'responsavel_telemovel_1' => $m->responsavel_telemovel_1,
      'responsavel_nome_2'      => $m->responsavel_nome_2,
      'responsavel_cargo_2'     => $m->responsavel_cargo_2,
      'responsavel_email_2'     => $m->responsavel_email_2,
      'responsavel_telemovel_2' => $m->responsavel_telemovel_2,
      'recebe_email_orcamentos' => $m->recebe_email_orcamentos,
      'recebe_email_encomendas' => $m->recebe_email_encomendas,
      'recebe_email_faturas'    => $m->recebe_email_faturas,
      'recebe_email_campanhas'  => $m->recebe_email_campanhas,
      'pack_medio'              => $m->pack_medio,
      'pack_frequencia_inicio'  => $m->pack_frequencia_inicio,
      'previsao_ano1'           => $m->previsao_ano1,
      'previsao_ano2'           => $m->previsao_ano2,
      'notas_modalidade'        => $m->notas_modalidade,
    ])->toJson() !!},
    selected: 0,
    select(i) { this.selected = i }
  }"
  class="flex h-full space-x-4"
>
  {{-- Sidebar --}}
  <aside class="w-1/4 bg-gray-50 p-2 rounded divide-y divide-gray-200 overflow-auto">
    <template x-for="(m, i) in modalidades" :key="m.id">
      <div
        @click="select(i)"
        :class="selected===i ? 'bg-pink-100' : 'hover:bg-gray-100'"
        class="cursor-pointer px-3 py-2"
      >
        <span x-text="m.associacao || '—'"></span>
      </div>
    </template>
  </aside>

  {{-- Painel de Detalhes --}}
  <div class="w-3/4 bg-white p-4 rounded shadow overflow-auto">
    <template x-if="modalidades.length">
      <div x-data="{ m: modalidades[selected] }">
              <div x-data="{ m: modalidades[selected] }">
        {{-- 1) Associação e Atletas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
          <div><strong>Associação:</strong> <span x-text="m.associacao"></span></div>
          <div><strong>Nº Atletas:</strong> <span x-text="m.numero_atletas"></span></div>
        </div>

        {{-- 2) Escalões --}}
        <div class="mb-4">
          <strong>Escalões Existentes:</strong>
          <div x-text="m.escaloes || '—'"></div>
        </div>

        {{-- 3) Datas Marca --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
          <div><strong>Marca Início:</strong> <span x-text="m.marca_inicio || '—'"></span></div>
          <div><strong>Marca Fim:</strong> <span x-text="m.marca_fim || '—'"></span></div>
          <div><strong>Renegociação Marca:</strong> <span x-text="m.marca_renegociacao || '—'"></span></div>
        </div>

        {{-- 4) Datas Contrato --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
          <div><strong>Contrato Início:</strong> <span x-text="m.contrato_inicio || '—'"></span></div>
          <div><strong>Contrato Fim:</strong> <span x-text="m.contrato_fim || '—'"></span></div>
          <div><strong>Renegociação Contrato:</strong> <span x-text="m.contrato_renegociacao || '—'"></span></div>
        </div>

        {{-- 5) Responsáveis --}}
        <div class="mb-4">
          <strong>Responsáveis:</strong>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
            <div>
              <div><strong>Nome 1:</strong> <span x-text="m.responsavel_nome_1 || '—'"></span></div>
              <div><strong>Cargo 1:</strong> <span x-text="m.responsavel_cargo_1 || '—'"></span></div>
              <div><strong>Email 1:</strong> <span x-text="m.responsavel_email_1 || '—'"></span></div>
              <div><strong>Telemóvel 1:</strong> <span x-text="m.responsavel_telemovel_1 || '—'"></span></div>
            </div>
            <div>
              <div><strong>Nome 2:</strong> <span x-text="m.responsavel_nome_2 || '—'"></span></div>
              <div><strong>Cargo 2:</strong> <span x-text="m.responsavel_cargo_2 || '—'"></span></div>
              <div><strong>Email 2:</strong> <span x-text="m.responsavel_email_2 || '—'"></span></div>
              <div><strong>Telemóvel 2:</strong> <span x-text="m.responsavel_telemovel_2 || '—'"></span></div>
            </div>
          </div>
        </div>

        {{-- 6) Flags de E-mail --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
          <template x-for="(label,key) in {
            orcamentos:'Orçamentos',
            encomendas:'Encomendas',
            faturas:'Faturas',
            campanhas:'Campanhas'
          }" :key="key">
            <div>
              <strong x-text="label"></strong>:
              <span x-text="m['recebe_email_'+key] === 's' ? 'Sim' : 'Não'"></span>
            </div>
          </template>
        </div>

        {{-- 7) Pack Médio & Frequência --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
          <div><strong>Pack Médio:</strong> €<span x-text="m.pack_medio || '0.00'"></span></div>
          <div><strong>Frequência Pack:</strong> <span x-text="m.pack_frequencia_inicio || '—'"></span></div>
        </div>

        {{-- 8) Previsões --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
          <div><strong>Previsão Ano 1:</strong> <span x-text="m.previsao_ano1 || '—'"></span></div>
          <div><strong>Previsão Ano 2:</strong> <span x-text="m.previsao_ano2 || '—'"></span></div>
        </div>

        {{-- 9) Notas --}}
        <div>
          <strong>Notas:</strong>
          <div class="whitespace-pre-line mt-2" x-text="m.notas_modalidade || '—'"></div>
        </div>
      </div>

      </div>
    </template>
    <div x-show="!modalidades.length" class="text-gray-500">
      Nenhuma modalidade cadastrada.
    </div>
  </div>
</section>

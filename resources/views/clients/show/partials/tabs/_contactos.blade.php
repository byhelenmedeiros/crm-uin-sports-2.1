
<section x-show="activeTab==='contactos'" class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Nome do Responsável --}}
    <div>
      <label class="label"><span class="label-text text-sm">Nome do Responsável</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ $client->responsavel_nome ?? '—' }}
      </div>
    </div>

    {{-- Data de Aniversário --}}
    <div>
      <label class="label"><span class="label-text text-sm">Data de Aniversário</span></label>
      <div class="input input-sm w-full bg-gray-100">
        {{ optional($client->data_aniversario)->format('d/m/Y') ?? '—' }}
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
    @foreach([
      'telefone1' => 'Telefone 1',
      'telefone2' => 'Telefone 2',
      'telefone3' => 'Telefone 3',
      'movel1'    => 'Telemóvel 1',
      'movel2'    => 'Telemóvel 2',
    ] as $field => $label)
      <div>
        <label class="label"><span class="label-text text-sm">{{ $label }}</span></label>
        <div class="input input-sm w-full bg-gray-100">
          {{ $client->{$field} ?? '—' }}
        </div>
      </div>
    @endforeach
  </div>
</section>

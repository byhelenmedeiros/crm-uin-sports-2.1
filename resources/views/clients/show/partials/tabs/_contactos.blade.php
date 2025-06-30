<section x-show="activeTab==='contactos'" class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Nome do Responsável --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Nome do Responsável</span></label>
      <input
        type="text"
        class="input input-sm input-bordered w-full bg-gray-100"
        value="{{ $client->responsavel_nome ?? '' }}"
        readonly
      />
    </div>

    {{-- Data de Aniversário --}}
    <div class="form-control w-full">
      <label class="label"><span class="label-text text-sm">Data de Aniversário</span></label>
      <input
        type="date"
        class="input input-sm input-bordered w-full bg-gray-100"
        value="{{ optional($client->data_aniversario)->format('Y-m-d') ?? '' }}"
        readonly
      />
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
      <div class="form-control w-full">
        <label class="label"><span class="label-text text-sm">{{ $label }}</span></label>
        <input
          type="text"
          class="input input-sm input-bordered w-full bg-gray-100"
          value="{{ $client->{$field} ?? '' }}"
          readonly
        />
      </div>
    @endforeach
  </div>
</section>

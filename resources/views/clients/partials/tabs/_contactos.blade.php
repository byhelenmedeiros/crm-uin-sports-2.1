<section class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Nome do Responsável --}}
    <div class="form-control w-full">
      <label for="responsavel_nome" class="label"><span class="label-text text-sm">Nome do Responsável</span></label>
      <input
        type="text"
        name="responsavel_nome"
        id="responsavel_nome"
        value="{{ old('responsavel_nome') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('responsavel_nome') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- Data Aniversário --}}
    <div class="form-control w-full">
      <label for="data_aniversario" class="label"><span class="label-text text-sm">Data de Aniversário</span></label>
      <input
        type="date"
        name="data_aniversario"
        id="data_aniversario"
        value="{{ old('data_aniversario') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('data_aniversario') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
    @foreach(['telefone1'=>'Telefone 1','telefone2'=>'Telefone 2','telefone3'=>'Telefone 3','movel1'=>'Telemóvel 1','movel2'=>'Telemóvel 2'] as $campo=>$label)
      <div class="form-control w-full">
        <label for="{{ $campo }}" class="label"><span class="label-text text-sm">{{ $label }}</span></label>
        <input
          type="text"
          name="{{ $campo }}"
          id="{{ $campo }}"
          value="{{ old($campo) }}"
          class="input input-sm input-bordered w-full"
        />
        @error($campo) <span class="text-error text-xs">{{ $message }}</span> @enderror
      </div>
    @endforeach
  </div>
</section>

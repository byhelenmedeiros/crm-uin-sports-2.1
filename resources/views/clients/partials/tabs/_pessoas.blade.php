<section class="space-y-4">
  <div class="form-control w-full">
    <label for="associacao" class="label"><span class="label-text text-sm">Pertence Associação</span></label>
    <input
      type="text"
      name="associacao"
      id="associacao"
      value="{{ old('associacao') }}"
      class="input input-sm input-bordered w-full"
    />
    @error('associacao') <span class="text-error text-xs">{{ $message }}</span> @enderror
  </div>
  <div class="form-control w-full">
    <label for="numero_atletas" class="label"><span class="label-text text-sm">Número de Atletas</span></label>
    <input
      type="number"
      name="numero_atletas"
      id="numero_atletas"
      value="{{ old('numero_atletas') }}"
      class="input input-sm input-bordered w-full"
    />
    @error('numero_atletas') <span class="text-error text-xs">{{ $message }}</span> @enderror
  </div>
  <div class="form-control w-full">
    <label for="escaloes" class="label"><span class="label-text text-sm">Escalões Existentes</span></label>
    <input
      type="text"
      name="escaloes"
      id="escaloes"
      value="{{ old('escaloes') }}"
      class="input input-sm input-bordered w-full"
    />
    @error('escaloes') <span class="text-error text-xs">{{ $message }}</span> @enderror
  </div>
</section>

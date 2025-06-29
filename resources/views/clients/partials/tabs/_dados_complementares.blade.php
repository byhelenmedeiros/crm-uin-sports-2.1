<section class="space-y-4">
  <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        {{--  nome presidente --}}
    <div class="form-control w-full">
      <label for="nome_presidente" class="label">
        <span class="label-text  text-sm">Nome Presidente</span>
      </label>
      <input
        type="text"
        name="nome_presidente"
        id="nome_presidente"
        value="{{ old('nome_presidente') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('nome_presidente') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{--  data presidente inicio --}}

    <div class="form-control w-full">
      <label for="data_presidente_inicio" class="label">
        <span class="label-text text-sm">Data Presidente Início</span>
      </label>
      <input
        type="date"
        name="data_presidente_inicio"
        id="data_presidente_inicio"
        value="{{ old('data_presidente_inicio') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('data_presidente_inicio') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{--  data presidente fim --}}
    <div class="form-control w-full">
      <label for="data_presidente_fim" class="label">
        <span class="label-text text-sm">Data Presidente Fim</span>
      </label>  
      <input
        type="date"
        name="data_presidente_fim"
        id="data_presidente_fim"
        value="{{ old('data_presidente_fim') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('data_presidente_fim') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-control w-full">
      <label for="email_presidente" class="label">
        <span class="label-text text-sm">Email Presidente</span>
      </label>
      <input
        type="email"
        name="email_presidente"
        id="email_presidente"
        value="{{ old('email_presidente') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('email_presidente') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-control w-full">
      <label for="telemovel_presidente" class="label">
        <span class="label-text text-sm">Telefone Presidente</span>
      </label>
      <input
        type="text"
        name="telemovel_presidente"
        id="telemovel_presidente"
        value="{{ old('telemovel_presidente') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('telemovel_presidente') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>  
    <div>
    </div>
    <div class="form-control w-full">
      <label for="marca_clube_inicio" class="label">
        <span class="label-text text-sm">Marca Clube Início</span>
      </label>
      <input
        type="date"
        name="marca_clube_inicio"
        id="marca_clube_inicio"
        value="{{ old('marca_clube_inicio') }}"
        class="input input-sm input-bordered w-full"
      />      
      @error('marca_clube_inicio') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- marca_clube_fim --}}
    <div class="form-control w-full">
      <label for="marca_clube_fim" class="label">
        <span class="label-text text-sm">Marca Clube Fim</span>
      </label>
      <input
        type="date"
        name="marca_clube_fim"
        id="marca_clube_fim"
        value="{{ old('marca_clube_fim') }}"
        class="input input-sm input-bordered w-full"
      />      
      @error('marca_clube_fim') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- marca_clube_renegociacao --}}
    <div class="form-control w-full">
      <label for="marca_clube_renegociacao" class="label">
        <span class="label-text text-sm">Marca Clube Renegociação</span>
      </label>
      <input
        type="date"
        name="marca_clube_renegociacao"
        id="marca_clube_renegociacao"
        value="{{ old('marca_clube_renegociacao') }}"
        class="input input-sm input-bordered w-full"
      />      
      @error('marca_clube_renegociacao') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- contrato_clube_inicio --}}
    <div class="form-control w-full">
      <label for="contrato_clube_inicio" class="label">
        <span class="label-text text-sm">Contrato Clube Início</span>
      </label>
      <input
        type="date"
        name="contrato_clube_inicio"
        id="contrato_clube_inicio"
        value="{{ old('contrato_clube_inicio') }}"
        class="input input-sm input-bordered w-full"
      />      
      @error('contrato_clube_inicio') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- contrato_clube_fim --}}
    <div class="form-control w-full">
      <label for="contrato_clube_fim" class="label">
        <span class="label-text text-sm">Contrato Clube Fim</span>
      </label>  
      <input
        type="date"
        name="contrato_clube_fim"
        id="contrato_clube_fim"
        value="{{ old('contrato_clube_fim') }}"
        class="input input-sm input-bordered w-full"
      />      
      @error('contrato_clube_fim') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- contrato_clube_renegociacao --}}
    <div class="form-control w-full">
      <label for="contrato_clube_renegociacao" class="label">
        <span class="label-text text-sm">Contrato Clube Renegociação</span>
      </label>
      <input
        type="date"
        name="contrato_clube_renegociacao"
        id="contrato_clube_renegociacao"
        value="{{ old('contrato_clube_renegociacao') }}"
        class="input input-sm input-bordered w-full"
      />      
      @error('contrato_clube_renegociacao') <span class="text-error text-xs">{{ $message }}</span> @enderror    
    </div>


  </div>


  <div class="grid grid-cols-4 md:grid-cols-6 gap-4">

    @foreach([
      'orcamentos' => 'Orçamentos',
      'encomendas' => 'Encomendas',
      'faturas'    => 'Faturas',
      'campanhas'  => 'Campanhas',
    ] as $key => $label)
      <div class="form-control w-full">
        <label for="recebe_email_{{ $key }}" class="label">
          <span class="label-text text-sm">Recebe {{ $label }}</span>
        </label>
        <select name="recebe_email_{{ $key }}" id="recebe_email_{{ $key }}" class="select select-sm select-bordered w-full">
          <option value="1" @selected(old("recebe_email_$key")=='1')>Sim</option>
          <option value="0" @selected(old("recebe_email_$key")=='0')>Não</option>
        </select>
        @error("recebe_email_$key") <span class="text-error text-xs">{{ $message }}</span> @enderror
      </div>
    @endforeach
  </div>

 <div class="grid grid-cols-2 md:grid-cols-8 gap-4">
  {{-- Padrão --}}
  <div class="form-control w-full">
    <label for="padrao_clube" class="label">
      <span class="label-text text-sm">Padrão</span>
    </label>
    <select
      name="padrao_clube"
      id="padrao_clube"
      class="select select-sm select-bordered w-full"
    >
      <option value="">— selecione —</option>
      @foreach($auxPadroes as $p)
        <option value="{{ $p->id }}" {{ old('padrao_clube') == $p->id ? 'selected' : '' }}>
          {{ $p->name }}
        </option>
      @endforeach
    </select>
    @error('padrao_clube')
      <span class="text-error text-xs">{{ $message }}</span>
    @enderror
  </div>

  {{-- Cor Clube 1 --}}
  <div class="form-control w-full">
    <label for="cor_clube_1" class="label"><span class="label-text text-sm">Cor Clube 1</span></label>
    <select name="cor_clube_1" id="cor_clube_1" class="select select-sm select-bordered w-full">
      <option value="">Selecione</option>
      @foreach($auxCorClube1s as $cor)
        <option value="{{ $cor->id }}" {{ old('cor_clube_1') == $cor->id ? 'selected' : '' }}>
          {{ $cor->name }}
        </option>
      @endforeach
    </select>
    @error('cor_clube_1') <span class="text-error text-xs">{{ $message }}</span> @enderror
  </div>

  {{-- Cor Clube 2 --}}
  <div class="form-control w-full">
    <label for="cor_clube_2" class="label"><span class="label-text text-sm">Cor Clube 2</span></label>
    <select name="cor_clube_2" id="cor_clube_2" class="select select-sm select-bordered w-full">
      <option value="">Selecione</option>
      @foreach($auxCorClube2s as $cor)
        <option value="{{ $cor->id }}" {{ old('cor_clube_2') == $cor->id ? 'selected' : '' }}>
          {{ $cor->name }}
        </option>
      @endforeach
    </select>
    @error('cor_clube_2') <span class="text-error text-xs">{{ $message }}</span> @enderror
  </div>

  {{-- Cor Clube 3 --}}
  <div class="form-control w-full">
    <label for="cor_clube_3" class="label"><span class="label-text text-sm">Cor Clube 3</span></label>
    <select name="cor_clube_3" id="cor_clube_3" class="select select-sm select-bordered w-full">
      <option value="">Selecione</option>
      @foreach($auxCorClube3s as $cor)
        <option value="{{ $cor->id }}" {{ old('cor_clube_3') == $cor->id ? 'selected' : '' }}>
          {{ $cor->name }}
        </option>
      @endforeach
    </select>
    @error('cor_clube_3') <span class="text-error text-xs">{{ $message }}</span> @enderror

</div>

</div>


  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Cliente desde --}}
    <div class="form-control w-full">
      <label for="cliente_desde" class="label"><span class="label-text text-sm">Cliente desde</span></label>
      <input
        type="date"
        name="cliente_desde"
        id="cliente_desde"
        value="{{ old('cliente_desde') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('cliente_desde') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- Limite credito --}}
    <div class="form-control w-full">
      <label for="limite_credito" class="label"><span class="label-text text-sm">Limite de Crédito</span></label>
      <input
        type="number"
        name="limite_credito"
        id="limite_credito"
        step="0.01"
        value="{{ old('limite_credito') }}"
        class="input input-sm input-bordered w-full"
      />
      @error('limite_credito') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
  </div>

  {{-- Notas gerais --}}
  <div class="form-control w-full">
    <label for="notas_gerais" class="label"><span class="label-text text-sm">Notas gerais</span></label>
    <textarea
      name="notas_gerais"
      id="notas_gerais"
      rows="3"
      class="textarea textarea-sm textarea-bordered w-full"
    >{{ old('notas_gerais') }}</textarea>
    @error('notas_gerais') <span class="text-error text-xs">{{ $message }}</span> @enderror
  </div>
</section>

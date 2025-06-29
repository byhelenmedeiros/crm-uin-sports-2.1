<div id="address-{{ $index }}" class="border rounded p-4 mb-4 bg-base-100 shadow space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        {{-- Tipo --}}
        <div class="form-control">
            <label for="addresses[{{ $index }}][address_type]" class="label">
                <span class="label-text text-sm">Tipo</span>
            </label>
            <select name="addresses[{{ $index }}][address_type]" class="select select-sm select-bordered w-full">
                @foreach ($addressTypes as $type)
                    <option value="{{ $type->id }}" @selected(old("addresses.$index.address_type", $addr['address_type'] ?? '') == $type->id)>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nome --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Nome</span></label>
            <input type="text" name="addresses[{{ $index }}][name]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.name", $addr['name'] ?? '') }}">
        </div>

        {{-- Telefone --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Telefone</span></label>
            <input type="text" name="addresses[{{ $index }}][phone]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.phone", $addr['phone'] ?? '') }}">
        </div>

        {{-- Contacto --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Contacto</span></label>
            <input type="text" name="addresses[{{ $index }}][contact]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.contact", $addr['contact'] ?? '') }}">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Linha 1 --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Morada</span></label>
            <input type="text" name="addresses[{{ $index }}][line1]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.line1", $addr['line1'] ?? '') }}">
        </div>

        {{-- Linha 2 --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Linha 2</span></label>
            <input type="text" name="addresses[{{ $index }}][line2]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.line2", $addr['line2'] ?? '') }}">
        </div>

        {{-- Linha 3 --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Linha 3</span></label>
            <input type="text" name="addresses[{{ $index }}][line3]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.line3", $addr['line3'] ?? '') }}">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        {{-- Código Postal --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Código Postal</span></label>
            <input type="text" name="addresses[{{ $index }}][code]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.code", $addr['code'] ?? '') }}">
        </div>

        {{-- Cidade --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Cidade</span></label>
            <input type="text" name="addresses[{{ $index }}][city]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.city", $addr['city'] ?? '') }}">
        </div>

        {{-- Distrito --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">Distrito</span></label>
            <input type="text" name="addresses[{{ $index }}][state]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.state", $addr['state'] ?? '') }}">
        </div>

        {{-- País --}}
        <div class="form-control">
            <label class="label"><span class="label-text text-sm">País</span></label>
            <input type="text" name="addresses[{{ $index }}][country]" class="input input-sm input-bordered"
                value="{{ old("addresses.$index.country", $addr['country'] ?? '') }}">
        </div>
    </div>

    <div class="flex items-center justify-between mt-4">
        <div>
            <input type="radio" name="primaryIndex" id="primary-{{ $index }}" value="{{ $index }}"
                class="radio radio-sm radio-primary"
                @checked((int) $primaryIndex === $index)>
            <label for="primary-{{ $index }}" class="ml-2 text-sm">Definir como principal</label>
        </div>

        <button type="button" onclick="removeAddress({{ $index }})" class="btn btn-xs btn-outline btn-error">
            Remover Morada
        </button>
    </div>
</div>

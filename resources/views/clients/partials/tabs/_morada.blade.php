<section
  x-data="{
    addressIndex: {{ count(old('addresses', [])) }},
    addAddress() {
      const tpl = document.getElementById('address-template').innerHTML;
      const html = tpl.replace(/__INDEX__/g, this.addressIndex);
      this.addressIndex++;
      document.getElementById('addresses-wrapper').insertAdjacentHTML('beforeend', html);
    }
  }"
  class="space-y-4"
>
  <div class="flex justify-between items-center mb-2">
    <h2 class="text-lg font-medium">Moradas</h2>
    <button type="button" @click="addAddress()" class="btn btn-sm btn-primary">+ Adicionar</button>
  </div>

  <div id="addresses-wrapper" class="space-y-4">
    {{-- Renderiza as antigas, se houver --}}
    @foreach(old('addresses', []) as $i => $addr)
      <div id="address-{{ $i }}" class="p-4 border border-gray-200 rounded">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
          {{-- Tipo --}}
          <div class="form-control">
            <label class="label"><span class="label-text text-sm">Tipo</span></label>
            <select name="addresses[{{ $i }}][address_type_id]" class="select select-sm select-bordered w-full">
              @foreach($addressTypes as $type)
                <option value="{{ $type->id }}" @selected($addr['address_type_id']==$type->id)>{{ $type->name }}</option>
              @endforeach
            </select>
          </div>
        
          {{-- external_id --}}
          <div class="form-control">
            <label class="label"><span class="label-text text-sm">External ID </span></label>
            <input type="text" name="addresses[{{ $i }}][external_id]" value="{{ $addr['external_id'] }}" class="input input-sm input-bordered w-full" />
          </div>

      
          {{-- Morada --}}
          <div class="form-control">
            <label class="label"><span class="label-text text-sm">Morada </span></label>
            <input type="text" name="addresses[{{ $i }}][address]" value="{{ $addr['address'] }}" class="input input-sm input-bordered w-full" />
          </div>

            {{-- morada 2 --}}
            <div class="form-control">
              <label class="label"><span class="label-text text-sm">Morada 2</span></label>
              <input type="text" name="addresses[{{ $i }}][line2]" value="{{ $addr['address2'] }}" class="input input-sm input-bordered w-full" />
            </div>
            <div class="form-control">
              <label class="label"><span class="label-text text-sm">Morada 3</span></label>
              <input type="text" name="addresses[{{ $i }}][line2]" value="{{ $addr['address2'] }}" class="input input-sm input-bordered w-full" />
            </div>
          
          {{-- Código Postal --}}
          <div class="form-control">
            <label class="label"><span class="label-text text-sm">Código Postal</span></label>
            <input type="text" name="addresses[{{ $i }}][code]" value="{{ $addr['code'] }}" class="input input-sm input-bordered w-full" />
          </div>
          {{-- País --}}
<div class="form-control w-full">
  <label class="label"><span class="label-text">País</span></label>
  <select name="pais_id" class="select select-sm w-full">
    <option value="">Selecione</option>
    @foreach($auxPais as $pais)
      <option value="{{ $pais->id }}" {{ old('pais_id')==$pais->id?'selected':'' }}>
        {{ $pais->name }}
      </option>
    @endforeach
  </select>
</div>

{{-- Distrito --}}
<div class="form-control w-full">
  <label class="label"><span class="label-text">Distrito</span></label>
  <select name="distrito_id" class="select select-sm w-full">
    <option value="">Selecione </option>
    @foreach($auxDistritos as $dist)
      <option value="{{ $dist->id }}" {{ old('distrito_id')==$dist->id?'selected':'' }}>
        {{ $dist->name }}
      </option>
    @endforeach
  </select>
</div>

{{-- Cidade --}}
<div class="form-control w-full">
  <label class="label"><span class="label-text">Cidade</span></label>
  <select name="cidade_id" class="select select-sm w-full">
    <option value="">Selecione</option>
    @foreach($auxCidades as $cid)
      <option value="{{ $cid->id }}" {{ old('cidade_id')==$cid->id?'selected':'' }}>
        {{ $cid->name }}
      </option>
    @endforeach
  </select>
</div>

        </div>
        <div class="flex justify-end mt-2">
          <button type="button" onclick="document.getElementById('address-{{ $i }}').remove()" class="btn btn-xs btn-error">
            Remover
          </button>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Template oculto para novos itens --}}
  <template id="address-template">
    <div id="address-__INDEX__" class="p-4 border border-gray-200 rounded">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">Tipo</span></label>
          <select name="addresses[__INDEX__][address_type_id]" class="select select-sm select-bordered w-full">
            @foreach($addressTypes as $type)
              <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
          </select>
        </div>
     {{--  <div class="form-control">
          <label class="label"><span class="label-text text-sm">External ID</span></label>
          <input type="text" name="addresses[__INDEX__][external_id]" class="input input-sm input-bordered w-full" />
        </div>--}}     
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">Morada</span></label>
          <input type="text" name="addresses[__INDEX__][address]" class="input input-sm input-bordered w-full" />
        </div>
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">Morada 2</span></label>
          <input type="text" name="addresses[__INDEX__][line2]" class="input input-sm input-bordered w-full" />
        </div>
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">Morada 3</span></label>
          <input type="text" name="addresses[__INDEX__][line3]" class="input input-sm input-bordered w-full" />
        </div>
        
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">Código Postal</span></label>
          <input type="text" name="addresses[__INDEX__][code]" class="input input-sm input-bordered w-full" />
        </div>
       
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">País</span></label>
          <select name="addresses[__INDEX__][country_id]" class="select select-sm w-full">
            <option value="">Selecione</option>
            @foreach($auxPais as $pais)
              <option value="{{ $pais->id }}">{{ $pais->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">Distrito</span></label>
          <select name="addresses[__INDEX__][state_id]" class="select select-sm w-full">
            <option value="">Selecione</option>
            @foreach($auxDistritos as $dist)
              <option value="{{ $dist->id }}">{{ $dist->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-control">
          <label class="label"><span class="label-text text-sm">Cidade</span></label>
          <select name="addresses[__INDEX__][city_id]" class="select select-sm w-full">
            <option value="">Selecione</option>
            @foreach($auxCidades as $cid)
              <option value="{{ $cid->id }}">{{ $cid->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="flex justify-end mt-2">
        <button type="button" onclick="document.getElementById('address-__INDEX__').remove()" class="btn btn-xs btn-error">
          Remover
        </button>
      </div>
    </div>
  </template>
</section>
  
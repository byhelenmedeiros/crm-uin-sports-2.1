<section class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Zona --}}
    <div class="form-control w-full">
      <label for="zone_id" class="label"><span class="label-text text-sm">Zona</span></label>
      <select name="zone_id" id="zone_id" class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($zones as $z)
          <option value="{{ $z->id }}" @selected(old('zone_id')==$z->id)>{{ $z->name }}</option>
        @endforeach
      </select>
      @error('zone_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- zona comercial --}}
    <div class="form-control w-full">
      <label for="comercial_zone_id" class="label"><span class="label-text text-sm">Zona Comercial</span></label>
      <select name="comercial_zone_id" id="comercial_zone_id" class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($comercial_zones as $cz)
          <option value="{{ $cz->id }}" @selected(old('comercial_zone_id')==$cz->id)>{{ $cz->name }}</option>
        @endforeach
      </select>
      @error('comercial_zone_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- Vendedor --}}
    <div class="form-control w-full">
      <label for="vendor_id" class="label"><span class="label-text text-sm">Vendedor</span></label>
      <select name="vendor_id" id="vendor_id" class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($vendors as $v)
          <option value="{{ $v->id }}" @selected(old('vendor_id')==$v->id)>{{ $v->name }}</option>
        @endforeach
      </select>
      @error('vendor_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
  </div>
</section>

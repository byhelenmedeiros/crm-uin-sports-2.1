<div class="p-4" x-data="{ zoneId:'', comId:'', vendorId:'' }" x-cloak>
  <div class="grid grid-cols-6 gap-4">

 

    {{-- Zona --}}
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Zona</span></label>
      <select name="zone_id"
              x-model="zoneId"
              class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($auxZonas as $z)
          <option value="{{ $z->id }}">
            {{ $z->external_id }} – {{ $z->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Zona Comercial --}}
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Zona Comercial</span></label>
      <select name="comercial_zone_id"
              x-model="comId"
              class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($auxZonas as $z)
          @foreach($z->children as $c)
            <option value="{{ $c->id }}"
                    x-show="zoneId == {{ $z->id }}">
              {{ $c->external_id }} – {{ $c->name }}
            </option>
          @endforeach
        @endforeach
      </select>
    </div>

    {{-- Vendedor --}}
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Vendedor</span></label>
      <select name="vendor_id"
              x-model="vendorId"
              class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($auxZonas as $z)
          @foreach($z->children as $c)
            @foreach($c->children as $v)
              <option value="{{ $v->id }}"
                      x-show="comId == {{ $c->id }}">
                {{ $v->external_id }} – {{ $v->name }}
              </option>
            @endforeach
          @endforeach
        @endforeach
      </select>
    </div>

  </div>
</div>

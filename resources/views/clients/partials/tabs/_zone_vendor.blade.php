<div x-data="{ zoneId:'', comId:'', vendorId:'', postal:'' }" x-cloak>
  <div class="grid grid-cols-6 gap-4">
    <div class="form-control col-span-2">
      <label class="label"><span class="label-text text-sm">Código Postal</span></label>
      <input
        type="text"
        x-model="postal"
        @blur="
          let prefix = postal.slice(0,4)
          let z = Array.from($refs.zone.options).find(o => o.dataset.prefix == prefix)
          if (z) {
            zoneId = z.value
            $nextTick(() => {
              let cOpts = Array.from($refs.com.options).filter(o => !o.hidden && o.value)
              if (cOpts.length) comId = cOpts[0].value
              $nextTick(() => {
                let vOpts = Array.from($refs.vend.options).filter(o => !o.hidden && o.value)
                if (vOpts.length) vendorId = vOpts[0].value
              })
            })
          }
        "
        placeholder="ex: 4900..."
        class="input input-xs input-bordered w-full"
      />
    </div>
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Zona</span></label>
      <select x-model="zoneId" x-ref="zone" class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($auxZonas as $z)
          <option value="{{ $z->id }}" data-prefix="{{ $z->external_id }}">{{ $z->external_id }} – {{ $z->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Zona Comercial</span></label>
      <select x-model="comId" x-ref="com" class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($auxZonas as $z)
          @foreach($z->children as $c)
            <option value="{{ $c->id }}" x-show="zoneId == {{ $z->id }}">{{ $c->external_id }} – {{ $c->name }}</option>
          @endforeach
        @endforeach
      </select>
    </div>
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Vendedor</span></label>
      <select x-model="vendorId" x-ref="vend" class="select select-xs select-bordered w-full">
        <option value="">—</option>
        @foreach($auxZonas as $z)
          @foreach($z->children as $c)
            @foreach($c->children as $v)
              <option value="{{ $v->id }}" x-show="comId == {{ $c->id }}">{{ $v->external_id }} – {{ $v->name }}</option>
            @endforeach
          @endforeach
        @endforeach
      </select>
    </div>
  </div>
</div>

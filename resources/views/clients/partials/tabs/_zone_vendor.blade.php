<section
  x-data="postalForm()"
  x-init="init()"
  class="space-y-4"
>
  {{-- External ID e Código Postal --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">External ID</span></label>
      <input
        type="text"
        x-model="externalId"
        name="external_id"
        class="input input-xs input-bordered w-full"
      />
    </div>
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Código Postal</span></label>
      <input
        type="text"
        x-model="postalCode"
        name="postal_code"
        class="input input-xs input-bordered w-full"
      />
    </div>
  </div>

  {{-- Selects --}}
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    {{-- Zona --}}
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Zona</span></label>
      <select
        x-model="zone_id"
        name="zone_id"
        class="select select-xs select-bordered w-full"
      >
        <option value="">—</option>
        @foreach($zones as $z)
          <option value="{{ $z->id }}">{{ $z->name }}</option>
        @endforeach
      </select>
      @error('zone_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- Zona Comercial --}}
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Zona Comercial</span></label>
      <select
        x-model="comercial_zone_id"
        name="comercial_zone_id"
        class="select select-xs select-bordered w-full"
      >
        <option value="">—</option>
        @foreach($comercial_zones as $cz)
          <option value="{{ $cz->id }}">{{ $cz->name }}</option>
        @endforeach
      </select>
      @error('comercial_zone_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- Vendedor --}}
    <div class="form-control">
      <label class="label"><span class="label-text text-sm">Vendedor</span></label>
      <select
        x-model="vendor_id"
        name="vendor_id"
        class="select select-xs select-bordered w-full"
      >
        <option value="">—</option>
        @foreach($vendors as $v)
          <option value="{{ $v->id }}">{{ $v->name }}</option>
        @endforeach
      </select>
      @error('vendor_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
    </div>
  </div>
</section>

<script>
function postalForm() {
  return {
    externalId: @json(old('external_id','')),
    postalCode: @json(old('postal_code','')),
    zone_id: @json(old('zone_id','')),
    comercial_zone_id: @json(old('comercial_zone_id','')),
    vendor_id: @json(old('vendor_id','')),

    init() {
      // observa mudanças e dispara lookup
      this.$watch('externalId', () => this.lookup(), { debounce: 300 });
      this.$watch('postalCode', () => this.lookup(), { debounce: 300 });
    },

    async lookup() {
      const ext  = this.externalId.trim();
      const pref = this.postalCode.slice(0,4);

      // só continua se tiver external_id ou 4 dígitos de prefixo
      if (!ext && pref.length < 4) return;

      try {
        const params = new URLSearchParams();
        if (ext)  params.append('external_id', ext);
        if (pref.length === 4) params.append('prefix', pref);

        const res = await fetch(`/api/postal-zone?${params.toString()}`);
        if (!res.ok) throw new Error('Not found');

        const data = await res.json();
        this.zone_id            = data.zone_id;
        this.comercial_zone_id  = data.comercial_zone_id;
        this.vendor_id          = data.vendor_id;
      } catch (e) {
        // limpa se não encontrar
        this.zone_id = '';
        this.comercial_zone_id = '';
        this.vendor_id = '';
      }
    }
  }
}
</script>

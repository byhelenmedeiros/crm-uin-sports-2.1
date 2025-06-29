
<section x-show="activeTab==='zone_vendor'" class="space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Zona --}}
    <div>
      <label class="label"><span class="label-text text-sm">Zona</span></label>
      <div class="select select-sm w-full bg-gray-100">
        {{ $client->zone->name ?? '—' }}
      </div>
    </div>

    {{-- Vendedor --}}
    <div>
      <label class="label"><span class="label-text text-sm">Vendedor</span></label>
      <div class="select select-sm w-full bg-gray-100">
        {{ $client->vendor->name ?? '—' }}
      </div>
    </div>
  </div>
</section>

<section
  x-data="moradaData()"
  class="flex h-full space-x-4"
>
  {{-- Sidebar --}}
  <aside class="w-1/4 bg-gray-50 p-2 rounded divide-y divide-gray-200 overflow-auto">
    <template x-for="(addr, i) in addresses" :key="addr.id">
      <div
        @click="select(i)"
        :class="selected === i ? 'bg-pink-100' : 'hover:bg-gray-100'"
        class="cursor-pointer px-3 py-2"
      >
        <span x-text="addr.type"></span>
      </div>
    </template>
  </aside>

  {{-- Painel de Detalhes --}}
  <div class="w-3/4 bg-white p-4 rounded shadow overflow-auto">
    <template x-if="addresses.length">
      <div x-data="{ a: addresses[selected] }">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
          <div><strong>Tipo:</strong> <span x-text="a.type"></span></div>
          <div><strong>Telefone:</strong> <span x-text="a.phone"></span></div>
        </div>
        <div class="mb-4">
          <strong>Morada:</strong>
          <div x-text="a.address"></div>
        </div>
        <div class="mb-4">
          <strong>Morada 2:</strong>
          <div x-text="a.line2"></div>
            <div class="mb-4">
          <strong>Morada 3:</strong>
          <div x-text="a.line3"></div>
        </div>

          
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div><strong>Código Postal:</strong> <span x-text="a.code"></span></div>
          <div><strong>Cidade:</strong> <span x-text="a.city"></span></div>
          <div><strong>Distrito:</strong> <span x-text="a.district"></span></div>
          <div><strong>País:</strong> <span x-text="a.country"></span></div>
        </div>
      </div>
    </template>
    <div x-show="!addresses.length" class="text-gray-500">
      Nenhuma morada cadastrada.
    </div>
  </div>
</section>

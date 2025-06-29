<template>
  <Head title="Detalhes do Cliente" />
  <AuthenticatedLayout>
    <div class="mx-auto my-4 px-2 space-y-6">
      <!-- Breadcrumb -->
      <nav class="text-gray-500 text-sm mb-2" aria-label="Breadcrumb">
        <ol class="inline-flex space-x-1">
          <li>
            <Link href="/" class="hover:text-gray-700">Dashboard</Link>
            <span class="mx-1">/</span>
          </li>
          <li>
            <Link :href="route('clients.index')" class="hover:text-gray-700">Clientes</Link>
            <span class="mx-1">/</span>
          </li>
          <li class="text-pink-700">Detalhes</li>
        </ol>
      </nav>

<!-- Cabeçalho + Botões -->
<div class="flex items-center justify-between">
  <div>
    <h1 class="text-2xl font-semibold text-gray-800">
      Cliente: {{ $page.props.client.name }}
    </h1>
    <div class="mt-1 text-sm text-gray-600 space-x-4">
      <span>
        <strong>Número do Cliente:</strong> {{ $page.props.client.external_id ?? '—' }} 
      </span>
      <span class="mx-1"> | </span>
      <span>
        <strong>NIF:</strong> {{ $page.props.client.nif ?? '—' }}
      </span>
    </div>
  </div>

  <div class="space-x-2">
    <Link
      :href="route('clients.edit', $page.props.client.id)"
      class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded"
    >
      Editar
    </Link>
    <Link
      :href="route('clients.index')"
      class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded"
    >
      Voltar
    </Link>
  </div>
</div>

      <!-- === Abas (Tabs) === -->
      <nav class="flex border-b border-gray-300">
        <button
          @click="activeTab = 'info'"
          :class="tabClass('info')"
          class="px-4 py-2 text-sm font-semibold"
          type="button"
        >
          Informações Gerais
        </button>
        <button
          @click="activeTab = 'moradas'"
          :class="tabClass('moradas')"
          class="px-4 py-2 text-sm font-semibold"
          type="button"
        >
          Moradas
        </button>
        <button
          @click="activeTab = 'outras'"
          :class="tabClass('outras')"
          class="px-4 py-2 text-sm font-semibold"
          type="button"
        >
          Outras Moradas
        </button>
      </nav>

      <!-- === Seção 1: Informações Gerais === -->
      <section v-if="activeTab === 'info'">
        <div class="bg-white rounded-lg p-4">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Nome -->
            <div>
              <span class="block text-xs text-gray-500">Nome</span>
              <span class="block text-gray-800">{{ $page.props.client.name }}</span>
            </div>

            <!-- NIF -->
            <div>
              <span class="block text-xs text-gray-500">NIF</span>
              <span class="block text-gray-800">{{ $page.props.client.nif ?? '—' }}</span>
            </div>

            <!-- URL -->
            <div>
              <span class="block text-xs text-gray-500">Website</span>
              <span class="block text-gray-800">{{ $page.props.client.url ?? '—' }}</span>
            </div>

            <!-- Transporte -->
            <div>
              <span class="block text-xs text-gray-500">Transporte</span>
              <span class="block text-gray-800">
                {{ $page.props.client.transporte?.name ?? '—' }}
              </span>
            </div>

            <!-- Pagamento -->
            <div>
              <span class="block text-xs text-gray-500">Pagamento</span>
              <span class="block text-gray-800">
                {{ $page.props.client.pagamento?.name ?? '—' }}
              </span>
            </div>

            <!-- Preço (Lista SAGE) -->
            <div>
              <span class="block text-xs text-gray-500">Preço</span>
              <span class="block text-gray-800">
                {{ $page.props.client.preco?.name ?? '—' }}
              </span>
            </div>

            <!-- Desconto Linha -->
            <div>
              <span class="block text-xs text-gray-500">Desconto Linha</span>
              <span class="block text-gray-800">
                {{
                  $page.props.client.desconto_linha !== null
                    ? Number($page.props.client.desconto_linha).toFixed(2) + '%'
                    : '—'
                }}
              </span>
            </div>

            <!-- Desconto Global -->
            <div>
              <span class="block text-xs text-gray-500">Desconto Global</span>
              <span class="block text-gray-800">
                {{
                  $page.props.client.desconto_global !== null
                    ? Number($page.props.client.desconto_global).toFixed(2) + '%'
                    : '—'
                }}
              </span>
            </div>

            <!-- Telefone 1 -->
            <div>
              <span class="block text-xs text-gray-500">Telefone 1</span>
              <span class="block text-gray-800">
                {{ $page.props.client.telefone1 ?? '—' }}
              </span>
            </div>

            <!-- Telefone 2 -->
            <div>
              <span class="block text-xs text-gray-500">Telefone 2</span>
              <span class="block text-gray-800">
                {{ $page.props.client.telefone2 ?? '—' }}
              </span>
            </div>

            <!-- Telefone 3 -->
            <div>
              <span class="block text-xs text-gray-500">Telefone 3</span>
              <span class="block text-gray-800">
                {{ $page.props.client.telefone3 ?? '—' }}
              </span>
            </div>

            <!-- Telefone 4 -->
            <div>
              <span class="block text-xs text-gray-500">Telefone 4</span>
              <span class="block text-gray-800">
                {{ $page.props.client.telefone4 ?? '—' }}
              </span>
            </div>

            <!-- Móvel 1 -->
            <div>
              <span class="block text-xs text-gray-500">Móvel 1</span>
              <span class="block text-gray-800">
                {{ $page.props.client.movel1 ?? '—' }}
              </span>
            </div>

            <!-- Móvel 2 -->
            <div>
              <span class="block text-xs text-gray-500">Móvel 2</span>
              <span class="block text-gray-800">
                {{ $page.props.client.movel2 ?? '—' }}
              </span>
            </div>

            <!-- Vendedor -->
            <div>
              <span class="block text-xs text-gray-500">Vendedor</span>
              <span class="block text-gray-800">
                {{ $page.props.client.vendor?.name ?? '—' }}
              </span>
            </div>

            <!-- Grupo de Cliente -->
            <div>
              <span class="block text-xs text-gray-500">Grupo de Cliente</span>
              <span class="block text-gray-800">
                {{ $page.props.client.clientGroup?.name ?? '—' }}
              </span>
            </div>

            <!-- Subdivisão de Grupo -->
            <div>
              <span class="block text-xs text-gray-500">Agrupamento</span>
              <span class="block text-gray-800">
                {{ $page.props.client.groupSubdivision?.name ?? '—' }}
              </span>
            </div>

            <!-- Criado em -->
            <div>
              <span class="block text-xs text-gray-500">Criado em</span>
              <span class="block text-gray-800">
                {{ formattedDate($page.props.client.created_at) }}
              </span>
            </div>

            <!-- Atualizado em -->
            <div>
              <span class="block text-xs text-gray-500">Atualizado em</span>
              <span class="block text-gray-800">
                {{ formattedDate($page.props.client.updated_at) }}
              </span>
            </div>
          </div>
        </div>
      </section>

      <!-- === Seção 2: Moradas === -->
      <section v-if="activeTab === 'moradas'">
        <div
          v-if="$page.props.client.addresses && $page.props.client.addresses.length"
          class="space-y-6"
        >
          <!-- Para cada Morada, crie um card com grid de campos -->
          <div
            v-for="addr in $page.props.client.addresses"
            :key="addr.id"
            class="bg-white rounded-lg p-4"
          >
            <h3 class="text-md font-semibold text-gray-600 mb-4">
              Morada #{{ addr.id }}
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <!-- External ID -->
              

              <!-- Tipo -->
              <div>
                <span class="block text-xs text-gray-500">Tipo</span>
                <span class="block text-gray-800">
                  {{ addr.addressType?.name ?? addr.address_type_id ?? '—' }}
                </span>
              </div>

              <!-- Nome -->
              <div>
                <span class="block text-xs text-gray-500">Nome</span>
                <span class="block text-gray-800">{{ addr.name ?? '—' }}</span>
              </div>

              <!-- Morada Completa -->
              <div>
                <span class="block text-xs text-gray-500">Morada Completa</span>
                <span
                  class="block text-gray-800 max-w-xs truncate"
                  :title="addr.address"
                >
                  {{ addr.address ?? '—' }}
                </span>
              </div>

             
              <!-- Complemento 1 -->
              <div>
                <span class="block text-xs text-gray-500">Morada 1</span>
                <span class="block text-gray-800">{{ addr.line1 ?? '—' }}</span>
              </div>

              <!-- Complemento 2 -->
              <div>
                <span class="block text-xs text-gray-500">Morada 2</span>
                <span class="block text-gray-800">{{ addr.line2 ?? '—' }}</span>
              </div>

              <!-- Complemento 3 -->
              <div>
                <span class="block text-xs text-gray-500">Morada 3</span>
                <span class="block text-gray-800">{{ addr.line3 ?? '—' }}</span>
              </div>

              <!-- Código Postal -->
              <div>
                <span class="block text-xs text-gray-500">Código Postal</span>
                <span class="block text-gray-800">{{ addr.code ?? '—' }}</span>
              </div>
<div>
  <span class="block text-xs text-gray-500">Localidade</span>
  <span class="block text-gray-800">{{ $page.props.client.localidade?.name ?? '—' }}</span>
</div>
              <!-- Cidade -->
              <div>
                <span class="block text-xs text-gray-500">Cidade</span>
                <span class="block text-gray-800">{{ addr.city ?? '—' }}</span>
              </div>

              <!-- Estado -->
              <div>
                <span class="block text-xs text-gray-500">Distrito</span>
                <span class="block text-gray-800">{{ addr.state ?? '—' }}</span>
              </div>

              <!-- País -->
              <div>
                <span class="block text-xs text-gray-500">País</span>
                <span class="block text-gray-800">{{ addr.country ?? '—' }}</span>
              </div>

              <!-- Addressable Type -->
              <div>
                <span class="block text-xs text-gray-500">Addressable Type</span>
                <span class="block text-gray-800">{{ addr.addressable_type ?? '—' }}</span>
              </div>

              <!-- User Created ID -->
              <div>
                <span class="block text-xs text-gray-500">User Created ID</span>
                <span class="block text-gray-800">{{ addr.user_created_id ?? '—' }}</span>
              </div>

              <!-- Criado em -->
              <div>
                <span class="block text-xs text-gray-500">Criado em</span>
                <span class="block text-gray-800">{{ formattedDate(addr.created_at) }}</span>
              </div>

              <!-- Atualizado em -->
              <div>
                <span class="block text-xs text-gray-500">Atualizado em</span>
                <span class="block text-gray-800">{{ formattedDate(addr.updated_at) }}</span>
              </div>
            </div>
          </div>
        </div>
        <div v-else class="text-gray-500">
          Nenhuma morada cadastrada para este cliente.
        </div>
      </section>

      <!-- === Seção 3: Outras Moradas (ainda vazia, só a aba aparece) === -->
      <section v-if="activeTab === 'outras'">
        <div class="bg-white rounded-lg p-4">
          <p class="text-gray-600">Incluir outras moradas</p>
        </div>
      </section>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

// Controle da aba ativa; começa em 'info'
const activeTab = ref('info')

// Classe para estilizar a aba ativa
const tabClass = (tab) =>
  activeTab.value === tab
    ? 'border-b-2 border-pink-600 text-pink-600'
    : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'

// Função para formatar datas
function formattedDate(dateString) {
  if (!dateString) return '—'
  return new Date(dateString).toLocaleString('pt-PT', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
  })
}
</script>


<template>
    <Head title="Criar Cliente" />
    <AuthenticatedLayout>
        <div class="mx-auto p-4 bg-white">
            <h1 class="text-xl font-semibold mb-4">Criar Novo Cliente</h1>
            <p class="mb-6 text-gray-700 text-sm">
                Preencha os dados abaixo para criar um novo cliente.
            </p>

            <!-- Tabs -->
            <nav class="flex border-b border-gray-300 mb-6">
                <button
                    @click="activeTab = 'cliente'"
                    :class="tabClass('cliente')"
                    class="px-4 py-2 text-sm font-semibold"
                    type="button"
                >
                    Dados do Cliente
                </button>
                <button
                    @click="activeTab = 'dadoscomplementares'"
                    :class="tabClass('dadoscomplementares')"
                    class="px-4 py-2 text-sm font-semibold"
                    type="button"
                >
                    Dados Complementares
                </button>
                <button
                    @click="activeTab = 'zonevendor'"
                    :class="tabClass('zonevendor')"
                    class="px-4 py-2 text-sm font-semibold"
                    type="button"
                >
                    Zona & Vendedor
                </button>

                <button
                    @click="activeTab = 'morada'"
                    :class="tabClass('morada')"
                    class="px-4 py-2 text-sm font-semibold"
                    type="button"
                >
                    Moradas
                </button>
                <button
                    @click="activeTab = 'grupos'"
                    :class="tabClass('grupos')"
                    class="px-4 py-2 text-sm font-semibold"
                    type="button"
                >
                    Grupos de Clientes
                </button>
            </nav>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- === Seção: Dados do Cliente === -->
                <section v-if="activeTab === 'cliente'">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- (mantém exatamente igual ao original) -->
                        <div>
                            <label
                                for="external_id"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Numero do cliente</label
                            >
                            <input
                                id="external_id"
                                type="text"
                                v-model="form.external_id"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.external_id"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.external_id }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="name"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Nome do Cliente</label
                            >
                            <input
                                id="name"
                                type="text"
                                v-model="form.name"
                                placeholder="Nome completo"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.name"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.name }}
                            </p>
                        </div>

                        <div>
                            <label
                                for="nif"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >NIF</label
                            >
                            <input
                                id="nif"
                                type="text"
                                v-model="form.nif"
                                placeholder="Número de Identificação Fiscal"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.nif"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.nif }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="url"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Website</label
                            >
                            <input
                                id="url"
                                type="url"
                                v-model="form.url"
                                placeholder="https://exemplo.com"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.url"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.url }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="transporte_id"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Transporte</label
                            >
                            <input
                                id="transporte_id"
                                type="text"
                                v-model="form.transporte_id"
                                placeholder="Transporte"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.transporte_id"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.transporte_id }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="pagamento_id"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Pagamento</label
                            >
                            <input
                                id="pagamento_id"
                                type="text"
                                v-model="form.pagamento_id"
                                placeholder="Pagamento"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.pagamento_id"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.pagamento_id }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="preco_id"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Preços</label
                            >
                            <input
                                id="preco_id"
                                type="text"
                                v-model="form.preco_id"
                                placeholder="Preços"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.preco_id"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.preco_id }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="desconto_linha"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Desconto Linha</label
                            >
                            <input
                                id="desconto_linha"
                                type="number"
                                v-model="form.desconto_linha"
                                step="0.01"
                                placeholder="Desconto Linha"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.desconto_linha"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.desconto_linha }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="desconto_global"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Desconto Global</label
                            >
                            <input
                                id="desconto_global"
                                type="number"
                                v-model="form.desconto_global"
                                step="0.01"
                                placeholder="Desconto Global"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.desconto_global"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.desconto_global }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="telefone1"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Telefone 1</label
                            >
                            <input
                                id="telefone1"
                                type="text"
                                v-model="form.telefone1"
                                placeholder="Telefone 1"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.telefone1"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.telefone1 }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="telefone2"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Telefone 2</label
                            >
                            <input
                                id="telefone2"
                                type="text"
                                v-model="form.telefone2"
                                placeholder="Telefone 2"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.telefone2"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.telefone2 }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="telefone3"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Telefone 3</label
                            >
                            <input
                                id="telefone3"
                                type="text"
                                v-model="form.telefone3"
                                placeholder="Telefone 3"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.telefone3"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.telefone3 }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="telefone4"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Telefone 4</label
                            >
                            <input
                                id="telefone4"
                                type="text"
                                v-model="form.telefone4"
                                placeholder="Telefone 4"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.telefone4"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.telefone4 }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="movel1"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Móvel 1</label
                            >
                            <input
                                id="movel1"
                                type="text"
                                v-model="form.movel1"
                                placeholder="Móvel 1"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.movel1"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.movel1 }}
                            </p>
                        </div>
                        <div>
                            <label
                                for="movel2"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Móvel 2</label
                            >
                            <input
                                id="movel2"
                                type="text"
                                v-model="form.movel2"
                                placeholder="Móvel 2"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            />
                            <p
                                v-if="form.errors.movel2"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.movel2 }}
                            </p>
                        </div>
                    </div>
                </section>
                <!-- === Seção: Dados Complementares === -->
              <section v-if="activeTab === 'dadoscomplementares'">
  <div class="grid grid-cols-1 gap-4">
    <!-- Nome do Responsável -->
    <div>
      <label for="responsavel_nome" class="block text-gray-700 mb-1 text-sm font-medium">
        Nome do Responsável
      </label>
      <input
        id="responsavel_nome"
        type="text"
        v-model="form.responsavel_nome"
        class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
      />
      <p v-if="form.errors.responsavel_nome" class="mt-1 text-xs text-red-600">
        {{ form.errors.responsavel_nome }}
      </p>
    </div>

    <!-- Cinco colunas: orçamentos, encomendas, faturas, campanhas, aniversário -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
      <div>
        <label for="recebe_email_orcamentos" class="block text-gray-700 mb-1 text-sm font-medium">
          Recebe Orçamentos
        </label>
        <select
          id="recebe_email_orcamentos"
          v-model="form.recebe_email_orcamentos"
          class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
        >
          <option value="1">Sim</option>
          <option value="0">Não</option>
        </select>
        <p v-if="form.errors.recebe_email_orcamentos" class="mt-1 text-xs text-red-600">
          {{ form.errors.recebe_email_orcamentos }}
        </p>
      </div>

      <div>
        <label for="recebe_email_encomendas" class="block text-gray-700 mb-1 text-sm font-medium">
          Recebe Encomendas
        </label>
        <select
          id="recebe_email_encomendas"
          v-model="form.recebe_email_encomendas"
          class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
        >
          <option value="1">Sim</option>
          <option value="0">Não</option>
        </select>
        <p v-if="form.errors.recebe_email_encomendas" class="mt-1 text-xs text-red-600">
          {{ form.errors.recebe_email_encomendas }}
        </p>
      </div>

      <div>
        <label for="recebe_email_faturas" class="block text-gray-700 mb-1 text-sm font-medium">
          Recebe Faturas
        </label>
        <select
          id="recebe_email_faturas"
          v-model="form.recebe_email_faturas"
          class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
        >
          <option value="1">Sim</option>
          <option value="0">Não</option>
        </select>
        <p v-if="form.errors.recebe_email_faturas" class="mt-1 text-xs text-red-600">
          {{ form.errors.recebe_email_faturas }}
        </p>
      </div>

      <div>
        <label for="recebe_email_campanhas" class="block text-gray-700 mb-1 text-sm font-medium">
          Recebe Campanhas
        </label>
        <select
          id="recebe_email_campanhas"
          v-model="form.recebe_email_campanhas"
          class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
        >
          <option value="1">Sim</option>
          <option value="0">Não</option>
        </select>
        <p v-if="form.errors.recebe_email_campanhas" class="mt-1 text-xs text-red-600">
          {{ form.errors.recebe_email_campanhas }}
        </p>
      </div>

      <div>
        <label for="data_aniversario" class="block text-gray-700 mb-1 text-sm font-medium">
          Data Aniversário
        </label>
        <input
          id="data_aniversario"
          type="date"
          v-model="form.data_aniversario"
          class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
        />
        <p v-if="form.errors.data_aniversario" class="mt-1 text-xs text-red-600">
          {{ form.errors.data_aniversario }}
        </p>
      </div>
  
  </div>
 <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
  <div>
    <label class="block text-gray-700 mb-1 text-sm font-medium">
      Cores do Clube (até 3, separadas por vírgula)
    </label>
    <input
      v-model="colorsInput"
      type="text"
      placeholder="Ex.: vermelho, azul, verde"
      class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
    />
    <p v-if="colorError" class="mt-1 text-xs text-red-600">
      {{ colorError }}
    </p>
  </div>

</div>

<!-- Três campos na linha abaixo: Padrão, Cliente desde, Limite de Crédito -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
  <div>
    <label class="block text-gray-700 mb-1 text-sm font-medium">
      Padrão
    </label>
    <input
      v-model="form.padrao_clube"
      type="text"
      class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
    />
    <p v-if="form.errors.padrao_clube" class="mt-1 text-xs text-red-600">
      {{ form.errors.padrao_clube }}
    </p>
  </div>

  <div>
    <label class="block text-gray-700 mb-1 text-sm font-medium">
      Cliente desde
    </label>
    <input
      v-model="form.cliente_desde"
      type="date"
      class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
    />
    <p v-if="form.errors.cliente_desde" class="mt-1 text-xs text-red-600">
      {{ form.errors.cliente_desde }}
    </p>
  </div>

  <div>
    <label class="block text-gray-700 mb-1 text-sm font-medium">
      Limite de Crédito
    </label>
    <input
      v-model="form.limite_credito"
      type="number"
      class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
    />
    <p v-if="form.errors.limite_credito" class="mt-1 text-xs text-red-600">
      {{ form.errors.limite_credito }}
    </p>
  </div>
</div>

<!-- Notas Gerais: ocupa largura total na linha abaixo -->
<div class="mt-4">
  <label class="block text-gray-700 mb-1 text-sm font-medium">
    Notas gerais
  </label>
  <input
    v-model="form.notas_gerais"
    type="text"
    class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
  />
  <p v-if="form.errors.notas_gerais" class="mt-1 text-xs text-red-600">
    {{ form.errors.notas_gerais }}
  </p>
</div></div>
</section>


                <!-- === Seção: Zona & Vendedor === -->
                <section v-if="activeTab === 'zonevendor'">
                    <!-- Agora são 3 colunas no md: Zona | Zona Comercial | Vendedor -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Zona -->
                        <div class="mb-4">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Zona
                            </label>
                            <input
                                type="text"
                                :value="currentZona"
                                readonly
                                class="mt-1 block w-full border border-gray-300 bg-gray-100 rounded-md shadow-sm sm:text-sm px-2 py-2 cursor-not-allowed"
                                placeholder="—"
                            />
                        </div>

                        <!-- Zona Comercial -->
                        <div class="mb-4">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Zona Comercial
                            </label>
                            <input
                                type="text"
                                :value="currentZonaComercial"
                                readonly
                                class="mt-1 block w-full border border-gray-300 bg-gray-100 rounded-md shadow-sm sm:text-sm px-2 py-2 cursor-not-allowed"
                                placeholder="—"
                            />
                        </div>

                        <!-- Vendedor (input somente‐leitura) -->
                        <div class="mb-4">
                            <label
                                for="vendor"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Vendedor</label
                            >
                            <input
                                id="vendor"
                                type="text"
                                :value="vendorDisplay"
                                disabled
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm bg-gray-100 cursor-not-allowed"
                            />
                        </div>
                    </div>
                </section>

                <!-- === Seção: Moradas === -->
                <section v-if="activeTab === 'morada'">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-medium text-gray-700">
                            Moradas
                        </h2>
                        <button
                            type="button"
                            @click="addAddress"
                            class="px-3 py-1 bg-pink-500 hover:bg-pink-600 text-white text-xs rounded"
                        >
                            + Adicionar Morada
                        </button>
                    </div>

                    <div
                        v-for="(addr, index) in form.addresses"
                        :key="index"
                        class="mb-4"
                    >
                        <details class="border rounded-lg">
                            <summary
                                class="px-4 py-2 bg-gray-100 hover:bg-gray-200 cursor-pointer flex justify-between items-center"
                            >
                                <span class="font-medium text-gray-700">
                                    Morada {{ index + 1 }} –
                                    {{
                                        addr.addressType
                                            ? addr.addressType.name
                                            : addr.address || "Sem tipo"
                                    }}
                                </span>
                                <button
                                    v-if="form.addresses.length > 1"
                                    type="button"
                                    @click.stop="removeAddress(index)"
                                    class="text-red-500 hover:text-red-700 text-xs"
                                >
                                    Remover
                                </button>
                            </summary>

                            <div class="p-4 bg-white">
                                <!-- Escolher morada principal -->
                                <div class="mb-4">
                                    <label
                                        class="inline-flex items-center text-sm text-gray-700"
                                    >
                                        <input
                                            type="radio"
                                            :value="index"
                                            v-model="form.primaryIndex"
                                            class="form-radio text-pink-600"
                                        />
                                        <span class="ml-2"
                                            >Definir como Morada Principal</span
                                        >
                                    </label>
                                </div>

                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                >
                                    <!-- address_type_id -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Tipo de Morada
                                        </label>
                                        <select
                                            v-model="addr.address_type_id"
                                            required
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        >
                                            <option value="" disabled>
                                                Selecione o tipo
                                            </option>
                                            <option
                                                v-for="type in addressTypes"
                                                :key="type.id"
                                                :value="type.id"
                                            >
                                                {{ type.name }}
                                            </option>
                                        </select>
                                        <p
                                            v-if="
                                                formErrors[
                                                    `addresses.${index}.address_type_id`
                                                ]
                                            "
                                            class="mt-1 text-xs text-red-600"
                                        >
                                            {{
                                                formErrors[
                                                    `addresses.${index}.address_type_id`
                                                ]
                                            }}
                                        </p>
                                    </div>

                                    <!-- name -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Nome
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.name"
                                            placeholder="Ex.: Escritório Fábrica"
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                        <p
                                            v-if="
                                                formErrors[
                                                    `addresses.${index}.name`
                                                ]
                                            "
                                            class="mt-1 text-xs text-red-600"
                                        >
                                            {{
                                                formErrors[
                                                    `addresses.${index}.name`
                                                ]
                                            }}
                                        </p>
                                    </div>

                                    <!-- address -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Morada
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.address"
                                            placeholder="Rua, Avenida, Nº..."
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                        <p
                                            v-if="
                                                formErrors[
                                                    `addresses.${index}.address`
                                                ]
                                            "
                                            class="mt-1 text-xs text-red-600"
                                        >
                                            {{
                                                formErrors[
                                                    `addresses.${index}.address`
                                                ]
                                            }}
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Morada 2
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.line1"
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                    </div>

                                    <!-- line2 -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Morada 3
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.line2"
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                    </div>

                                    <!-- **Código Postal** só aparece se for a morada principal -->
                                    <div
                                        class="mb-4"
                                        v-if="form.primaryIndex === index"
                                    >
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1"
                                        >
                                            Código Postal
                                        </label>
                                        <input
                                            type="text"
                                            v-model.trim="addr.code"
                                            placeholder="1234-567"
                                            maxlength="8"
                                            :class="[
                                                'mt-1 block w-full border rounded-md shadow-sm sm:text-sm px-2 py-2',
                                                formErrors[
                                                    `addresses.${index}.code`
                                                ]
                                                    ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                                    : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500',
                                            ]"
                                        />
                                        <p
                                            v-if="
                                                formErrors[
                                                    `addresses.${index}.code`
                                                ]
                                            "
                                            class="text-red-600 text-sm mt-1"
                                        >
                                            {{
                                                formErrors[
                                                    `addresses.${index}.code`
                                                ]
                                            }}
                                        </p>
                                    </div>

                                    <!-- Localidade -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Localidade
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.localidade"
                                            placeholder="Ex.: Bairro, Localidade"
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                    </div>

                                    <!-- city -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Concelho
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.city"
                                            placeholder="Ex.: Lisboa"
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                    </div>

                                    <!-- state -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            Distrito
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.state"
                                            placeholder="Ex.: Lisboa"
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                    </div>

                                    <!-- country -->
                                    <div>
                                        <label
                                            class="block text-gray-700 mb-1 text-sm font-medium"
                                        >
                                            País
                                        </label>
                                        <input
                                            type="text"
                                            v-model="addr.country"
                                            placeholder="Ex.: Portugal"
                                            class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        />
                                    </div>
                                </div>
                            </div>
                        </details>
                    </div>
                </section>

                <!-- === Seção: Grupos de Clientes === -->
                <section v-if="activeTab === 'grupos'">
                    <p class="text-gray-700 text-sm">
                        Selecione um grupo de clientes para associar a este
                        cliente.
                    </p>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label
                                for="client_group_id"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Grupo do Cliente</label
                            >
                            <select
                                id="client_group_id"
                                v-model="form.client_group_id"
                                @change="onGroupChange"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            >
                                <option value="" disabled>
                                    Selecionar grupo
                                </option>
                                <option
                                    v-for="group in clientGroups"
                                    :key="group.id"
                                    :value="group.id"
                                >
                                    {{ group.name }}
                                </option>
                            </select>
                            <p
                                v-if="form.errors.client_group_id"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.client_group_id }}
                            </p>
                        </div>

                        <div v-if="subdivisions.length">
                            <label
                                for="group_subdivision_id"
                                class="block text-gray-700 mb-1 text-sm font-medium"
                                >Agrupamento</label
                            >
                            <select
                                id="group_subdivision_id"
                                v-model="form.group_subdivision_id"
                                class="w-full border border-gray-300 rounded px-2 py-2 text-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            >
                                <option value="" disabled>
                                    Selecionar agrupamento
                                </option>
                                <option
                                    v-for="sub in subdivisions"
                                    :key="sub.id"
                                    :value="sub.id"
                                >
                                    {{ sub.name }}
                                </option>
                            </select>
                            <p
                                v-if="form.errors.group_subdivision_id"
                                class="mt-1 text-xs text-red-600"
                            >
                                {{ form.errors.group_subdivision_id }}
                            </p>
                        </div>
                        <div v-else class="invisible">&nbsp;</div>
                    </div>
                </section>

                <!-- === Botão para Salvar === -->
                <div class="pt-4">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="inline-flex items-center px-3 py-1 bg-pink-600 border border-transparent rounded-md font-semibold text-white hover:bg-pink-500 active:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-700"
                    >
                        Salvar Cliente
                    </button>
                </div>
            </form>

            <div
                v-if="form.errorMessages.length"
                class="mt-6 bg-red-50 border border-red-400 p-4 rounded text-sm text-red-700"
            >
                <h3 class="font-semibold mb-2">Erros do formulário:</h3>
                <ul class="list-disc pl-5 space-y-1">
                    <li v-for="(msg, idx) in form.errorMessages" :key="idx">
                        {{ msg }}
                    </li>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, reactive, watch, computed } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { useToast } from "vue-toastification";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

// ================================
// Definição de props
// ================================
const props = defineProps({
    addressTypes: Array,
    clientGroups: Array,
    subdivisions: Array,
    selectedGroup: [String, Number, null],
    selectedSub: [String, Number, null],

    vendor: {
        type: Object,
        default: null,
    },
});

const toast = useToast();
const activeTab = ref("cliente");

const tabClass = (tab) =>
    activeTab.value === tab
        ? "border-b-2 border-pink-600 text-pink-600"
        : "border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300";

const vendorDisplay = computed(() => {
    // Se não houver vendor, retorna texto padrão
    if (!props.vendor) {
        return "Sem vendedor associado";
    }
    const ext = props.vendor.external_id ?? "";
    const nm = props.vendor.name ?? "";
    return `${ext} – ${nm}`;
});

// ================================
// Estado reativo do formulário Inertia
// ================================
const form = useForm({
    name: "",
    nif: "",
    url: "",
    vendor_id: props.vendor?.id ?? null,

    client_group_id: props.selectedGroup || null,
    group_subdivision_id: props.selectedSub || null,

    // Array inicial com uma morada
    addresses: [
        {
            address_type_id: null,
            name: "",
            address: "",
            contact: "",
            phone: "",
            line1: "",
            line2: "",
            line3: "",
            code: "",
            localidade: "",
            city: "",
            state: "",
            country: "",
            primary: 1, // marca a primeira morada como principal
            primaryIndex: 0, // índice da morada principal
            transporte_id: "",
            pagamento_id: "",
            preco_id: "",
            desconto_linha: "",
            desconto_global: "",
            telefone1: "",
            telefone2: "",
            telefone3: "",
            telefone4: "",
            movel1: "",
            movel2: "",
        },
    ],

    // Qual índice do array de addresses é a morada principal
    primaryIndex: 0,

    processing: false,
    errors: {},
    errorMessages: [],
});

// State reativo para subdivisões conforme grupo
const subdivisions = ref(props.subdivisions || []);

// Adiciona uma nova morada em branco ao array
function addAddress() {
    form.addresses.push({
        address_type_id: null,
        //external_id: "",
        name: "",
        address: "",
        contact: "",
        phone: "",
        line1: "",
        line2: "",
        line3: "",
        code: "",
        localidade: "",
        city: "",
        state: "",
        country: "",
        primary: 1,
        primaryIndex: 0,
        transporte_id: "",
        pagamento_id: "",
        preco_id: "",
        desconto_linha: "",
        desconto_global: "",
        telefone1: "",
        telefone2: "",
        telefone3: "",
        telefone4: "",
        movel1: "",
        movel2: "",
    });
}

// Remove morada em dado índice e ajusta primaryIndex se necessário
function removeAddress(idx) {
    form.addresses.splice(idx, 1);
    if (form.primaryIndex === idx) {
        form.primaryIndex = 0;
    } else if (form.primaryIndex > idx) {
        form.primaryIndex--;
    }
}

// Quando seleciona outro grupo, carrega subdivisões via fetch
const onGroupChange = async () => {
    if (!form.client_group_id) {
        subdivisions.value = [];
        form.group_subdivision_id = null;
        return;
    }
    try {
        const response = await fetch(
            `/subdivisoes-por-grupo/${form.client_group_id}`
        );
        if (!response.ok) throw new Error("Falha ao carregar subdivisões");
        const data = await response.json();
        subdivisions.value = data;
        form.group_subdivision_id = null;
    } catch (e) {
        console.error("Erro ao buscar subdivisões:", e);
        subdivisions.value = [];
        form.group_subdivision_id = null;
    }
};

// ================================
// Mapeamento de prefixos para zona e zona comercial
// ================================
const postalInfo = {
    1000: { zona: "LISBOA", comercial: "Sul" },
    2000: { zona: "SANTARÉM", comercial: "Sul" },
    2400: { zona: "LEIRIA", comercial: "Centro" },
    2900: { zona: "SETÚBAL", comercial: "Sul" },
    3000: { zona: "COIMBRA", comercial: "Centro" },
    3500: { zona: "VISEU", comercial: "Centro" },
    3800: { zona: "AVEIRO", comercial: "Centro" },
    4000: { zona: "PORTO", comercial: "Norte" },
    4700: { zona: "BRAGA", comercial: "Norte" },
    4900: { zona: "VIANA DO CASTELO", comercial: "Norte" },
    5000: { zona: "VILA REAL", comercial: "Norte" },
    5300: { zona: "BRAGANÇA", comercial: "Norte" },
    6000: { zona: "CASTELO BRANCO", comercial: "Centro" },
    6300: { zona: "GUARDA", comercial: "Centro" },
    7000: { zona: "ÉVORA", comercial: "Sul" },
    7300: { zona: "PORTALEGRE", comercial: "Sul" },
    7800: { zona: "BEJA", comercial: "Sul" },
    8000: { zona: "FARO", comercial: "Sul" },
    9000: { zona: "MADEIRA", comercial: "Ilhas" },
    9500: { zona: "AÇORES", comercial: "Ilhas" },
};
const colorsInput = ref('')
const colorError = ref('')

function prepareColors() {
  colorError.value = ''
  if (colorsInput.value.trim() !== '') {
    const arr = colorsInput.value
      .split(',')
      .map(c => c.trim())
      .filter(c => c)
    if (arr.length > 3) {
      colorError.value = 'Você só pode informar até 3 cores.'
      return false
    }
    const unique = [...new Set(arr)]
    if (unique.length !== arr.length) {
      colorError.value = 'Não pode haver cores repetidas.'
      return false
    }
    form.cor_clube_1 = arr[0] || ''
    form.cor_clube_2 = arr[1] || ''
    form.cor_clube_3 = arr[2] || ''
  } else {
    form.cor_clube_1 = ''
    form.cor_clube_2 = ''
    form.cor_clube_3 = ''
  }
  return true
}

const currentZona = ref("");
const currentZonaComercial = ref("");

watch(
    () => form.addresses[form.primaryIndex]?.code,
    (newCode) => {
        const raw = (newCode || "").trim();
        const prefix = raw.length >= 4 ? raw.substring(0, 4) : "";
        const info = postalInfo[prefix] || null;
        currentZona.value = info ? info.zona : "";
        currentZonaComercial.value = info ? info.comercial : "";
    },
    { immediate: true }
);

const formErrors = reactive({});
watch(
    () => form.errors,
    (errs) => {
        Object.keys(errs || {}).forEach((key) => {
            formErrors[key] = errs[key];
        });
    },
    { deep: true, immediate: true }
);

// ================================
// Submit: transforma addresses adicionando campo `primary`
// ================================
function submit() {
    form.errorMessages = [];
    form.processing = true;
      if (!prepareColors()) {
    return
  }

    // Antes de enviar, montar payload de endereços com primary = 1 ou 0
    const transformed = {
        ...form,
        addresses: form.addresses.map((addr, i) => ({
            ...addr,
            primary: i === form.primaryIndex ? 1 : 0,
        })),
    };

    form.post(route("clients.store"), {
        preserveScroll: true,
        data: transformed,
        onSuccess: () => {
            toast.success("Cliente criado com sucesso!");
            form.reset();
            form.errorMessages = [];
        },
        onError: (errors) => {
            toast.error("Erro ao criar cliente. Verifique os dados.");
            if (errors) {
                form.errorMessages = Object.values(errors).flat();
                form.errors = errors;
            }
        },
        onFinish: () => {
            form.processing = false;
        },
    });
}

// ================================
// Utility para formatar datas (caso use no futuro dentro dos campos)
// ================================
function formattedDate(dateString) {
    if (!dateString) return "—";
    return new Date(dateString).toLocaleString("pt-PT", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    });
}
</script>

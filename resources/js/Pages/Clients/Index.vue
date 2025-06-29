<template>
    <Head title="Lista de Clientes" />
    <AuthenticatedLayout>
        <div class="mx-auto p-4  space-y-6">
            <!-- Breadcrumb -->
            <nav class="text-gray-500 text-sm mb-2" aria-label="Breadcrumb">
                <ol class="inline-flex space-x-1">
                    <li>
                        <Link href="/" class="hover:text-gray-700"
                            >Dashboard</Link
                        >
                        <span class="mx-1">/</span>
                    </li>
                    <li class="text-pink-700">Clientes</li>
                </ol>
            </nav>

            <!-- Cabeçalho + Botão de criar -->
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-gray-800">Buscar Clientes</h1>
                <Link
                    :href="route('clients.create')"
                    class="inline-flex items-center px-2 py-1 bg-pink-600 hover:bg-pink-700 text-white text-sm font-semibold "
                >
                    + Novo Cliente
                </Link>
            </div>

            <!-- Filtros Avançados -->
            <div class="bg-white">
               
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                >
                    <div>
                        <label
                            class="block text-xs font-medium text-gray-600 mb-1"
                        >
                            Data de Criação (Início)
                        </label>
                        <input
                            type="date"
                            v-model="filters.start_date"
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500"
                        />
                    </div>
                    <div>
                        <label
                            class="block text-xs font-medium text-gray-600 mb-1"
                        >
                            Data de Criação (Fim)
                        </label>
                        <input
                            type="date"
                            v-model="filters.end_date"
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500"
                        />
                    </div>

                    <div class="md:col-span-2 lg:col-span-1">
                        <label
                            class="block text-xs font-medium text-gray-600 mb-1"
                        >
                            Buscar por Nome ou E-mail
                        </label>
                        <input
                            type="text"
                            v-model="filters.search_text"
                            placeholder="Digite nome ou e-mail"
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500"
                        />
                    </div>

            
                    <div>
                        <label
                            class="block text-xs font-medium text-gray-600 mb-1"
                            >Responsável</label
                        >
                        <select
                            v-model="filters.manager_id"
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                            <option value="">Todos</option>
                            <option
                                v-for="mgr in managers"
                                :key="mgr.id"
                                :value="mgr.id"
                            >
                                {{ mgr.name }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-xs font-medium text-gray-600 mb-1"
                            >Região</label
                        >
                        <select
                            v-model="filters.region_id"
                            @change="onRegionChange"
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                            <option value="">Todas</option>
                            <option
                                v-for="reg in regions"
                                :key="reg.id"
                                :value="reg.id"
                            >
                                {{ reg.name }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <label
                            class="block text-xs font-medium text-gray-600 mb-1"
                            >Agrupamento</label
                        >
                        <select
                            v-model="filters.subregion_id"
                            :disabled="subregionsForSelectedRegion.length === 0"
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 disabled:opacity-50"
                        >
                            <option value="">Todas</option>
                            <option
                                v-for="sub in subregionsForSelectedRegion"
                                :key="sub.id"
                                :value="sub.id"
                            >
                                {{ sub.name }}
                            </option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <span
                            class="block text-xs font-medium text-gray-600 mb-1"
                            >Ordenar por</span
                        >
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input
                                    type="radio"
                                    v-model="filters.sort_by"
                                    value="name_asc"
                                    class="form-radio h-4 w-4 text-pink-600"
                                />
                                <span class="ml-2 text-sm text-gray-700"
                                    >Nome ↑</span
                                >
                            </label>
                            <label class="inline-flex items-center">
                                <input
                                    type="radio"
                                    v-model="filters.sort_by"
                                    value="name_desc"
                                    class="form-radio h-4 w-4 text-pink-600"
                                />
                                <span class="ml-2 text-sm text-gray-700"
                                    >Nome ↓</span
                                >
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-2 mt-4">
                    <button
                        @click="resetFilters"
                        class="px-2 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded"
                        type="button"
                    >
                        Limpar
                    </button>
                    <button
                        @click="applyFilters"
                        class="px-2 py-1 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded"
                        type="button"
                    >
                        Aplicar
                    </button>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-xs">
                        <thead class="bg-gray-50">
                            <tr class="text-left">
                                <th
                                    v-for="col in columns"
                                    :key="col.field"
                                    class="px-2 py-2 font-medium text-gray-600 uppercase cursor-pointer select-none"
                                    @click="sortBy(col.field)"
                                >
                                    {{ col.label }}
                                    <span class="ml-1 text-gray-400">▲▼</span>
                                </th>
                                <th
                                    class="px-2 py-2 font-medium text-gray-600 uppercase text-center"
                                >
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr
                                v-for="client in $page.props.clients"
                                :key="client.id"
                                class="hover:bg-gray-50"
                            >
                                <td
                                    v-for="col in columns"
                                    :key="col.field"
                                    class="px-2 py-2 text-gray-700"
                                >
                                    {{ getColumnValue(client, col.field) }}
                                </td>
                                <td class="px-2 py-2 text-center space-x-1">
                                    <Link
                                        :href="route('clients.show', client.id)"
                                        class="px-1 py-1 bg-blue-500 hover:bg-blue-600 text-white text-[10px] rounded"
                                    >
                                        Ver
                                    </Link>
                                    <button
                                        @click="confirmDelete(client.id)"
                                        class="px-1 py-1 bg-red-500 hover:bg-red-600 text-white text-[10px] rounded"
                                    >
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="$page.props.clients.length === 0">
                                <td
                                    colspan="6"
                                    class="px-2 py-4 text-center text-gray-500"
                                >
                                    Nenhum cliente encontrado.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { reactive, computed } from "vue";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const columns = [
    { label: "Nome", field: "name" },
        { label: "NIF", field: "nif" },
    { label: "Número do Cliente", field: "external_id" },
    { label: "Telefone", field: "phone" },
    { label: "Morada", field: "address" },

];

const managers = reactive([
    { id: 1, name: "Maria Silva" },
    { id: 2, name: "João Santos" },
    { id: 3, name: "Ana Costa" },
]);
const regions = reactive([
    { id: 1, name: "Norte" },
    { id: 2, name: "Centro" },
    { id: 3, name: "Sul" },
]);
const subregions = reactive({
    1: [
        { id: 11, name: "Porto" },
        { id: 12, name: "Braga" },
    ],
    
});

const filters = reactive({
    start_date: "",
    end_date: "",
    search_text: "",
    status_active: false,
    status_inactive: false,
    manager_id: "",
    region_id: "",
    subregion_id: "",
});

const subregionsForSelectedRegion = computed(() => {
    return filters.region_id ? subregions[filters.region_id] || [] : [];
});

const currentSort = reactive({
    field: "",
    direction: "",
});

function getColumnValue(client, field) {
    if (field === "phone") {
        return client.addresses?.[0]?.phone ?? "—";
    }
    if (field === "address") {
        return client.addresses?.[0]?.address ?? "—";
    }
    return client[field] ?? "—";
}

function sortBy(field) {
    if (currentSort.field === field) {
        currentSort.direction =
            currentSort.direction === "asc" ? "desc" : "asc";
    } else {
        currentSort.field = field;
        currentSort.direction = "asc";
    }

    Inertia.get(
        route("clients.index"),
        {
            ...filters,
            sort_field: currentSort.field,
            sort_dir: currentSort.direction,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}

const page = usePage();

function applyFilters() {
    Inertia.get(
        route("clients.index"),
        {
            ...filters,
            sort_field: currentSort.field,
            sort_dir: currentSort.direction,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}

function resetFilters() {
    filters.start_date = "";
    filters.end_date = "";
    filters.search_text = "";
    filters.status_active = false;
    filters.status_inactive = false;
    filters.manager_id = "";
    filters.region_id = "";
    filters.subregion_id = "";
    currentSort.field = "";
    currentSort.direction = "";

    Inertia.get(
        route("clients.index"),
        {},
        {
            preserveState: true,
            replace: true,
        }
    );
}

function onRegionChange() {
    filters.subregion_id = "";
}

function confirmDelete(id) {
  if (window.confirm('Tem certeza que deseja deletar este cliente?')) {
    Inertia.delete(route('clients.destroy', id))
  }
}
</script>

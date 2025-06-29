<template>
  <Head title="Lista de Teams" />
  <AuthenticatedLayout>
    <div class="mx-auto my-4 px-2">
      <h1 class="text-xl font-semibold mb-4">Lista de Teams</h1>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
              <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
              <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Descrição</th>
              <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="team in $page.props.teams" :key="team.id" class="hover:bg-gray-50">
              <td class="px-2 py-1 text-xs text-gray-700">{{ team.id }}</td>
              <td class="px-2 py-1 text-xs text-gray-700">{{ team.name }}</td>
              <td class="px-2 py-1 text-xs text-gray-700">{{ team.description ?? '-' }}</td>
              <td class="px-2 py-1">
                <div class="flex space-x-1">
                  <Link
                    :href="route('teams.show', team.id)"
                    class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded"
                  >
                    Ver
                  </Link>
                  <Link
                    :href="route('teams.edit', team.id)"
                    class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white text-xs rounded"
                  >
                    Editar
                  </Link>
                  <button
                    @click="window.confirm('Tem certeza?') && Inertia.delete(route('teams.destroy', team.id))"
                    class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded"
                  >
                    Excluir
                  </button>
                </div>
              </td>
            </tr>
            <tr v-if="!$page.props.teams || $page.props.teams.length === 0">
              <td colspan="4" class="px-2 py-2 text-center text-xs text-gray-500">
                Nenhum team encontrado.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
</script>

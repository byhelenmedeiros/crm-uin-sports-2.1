<template>
  <div class="max-w-4xl mx-auto px-4 py-8">
    <!-- Botão para voltar à listagem -->
    <div class="mb-6">
      <Link :href="route('users.index')" class="text-blue-500 hover:underline">
        ← Voltar para usuários
      </Link>
    </div>

    <!-- Contêiner com detalhes do usuário -->
    <div class="bg-white shadow rounded-lg p-6">
      <h1 class="text-2xl font-bold mb-4">Detalhes do Usuário</h1>
      <div class="mb-4">
        <span class="font-semibold">ID:</span>
        <span>{{ user.id }}</span>
      </div>
      <div class="mb-4">
        <span class="font-semibold">Nome:</span>
        <span>{{ user.name }}</span>
      </div>
      <div class="mb-4">
        <span class="font-semibold">E-mail:</span>
        <span>{{ user.email }}</span>
      </div>
      <!-- Se você tiver mais campos (ex: crm_team_id ou roles), poderá exibi-los aqui -->
      <div v-if="user.crm_team_id" class="mb-4">
        <span class="font-semibold">Team ID:</span>
        <span>{{ user.crm_team_id }}</span>
      </div>
      <div v-if="user.roles" class="mb-4">
        <span class="font-semibold">Papéis:</span>
        <span>
          <!-- Supondo que user.roles seja um array -->
          {{ user.roles.map(role => role.name).join(', ') }}
        </span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'

// Extrai a propriedade "user" injetada pelo Inertia
const { user } = usePage().props.value
</script>

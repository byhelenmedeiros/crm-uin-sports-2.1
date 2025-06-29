<template>
  <div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Editar Usuário</h1>
    <form @submit.prevent="submit">
      <!-- Campo de Nome -->
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
        <input
          id="name"
          type="text"
          v-model="form.name"
          placeholder="Digite o nome"
          class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
        />
        <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">
          {{ form.errors.name }}
        </div>
      </div>

      <!-- Campo de E-mail -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input
          id="email"
          type="email"
          v-model="form.email"
          placeholder="exemplo@dominio.com"
          class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
        />
        <div v-if="form.errors.email" class="text-red-500 text-xs mt-1">
          {{ form.errors.email }}
        </div>
      </div>

      <!-- Campo de Senha -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
        <input
          id="password"
          type="password"
          v-model="form.password"
          placeholder="Preencha somente se quiser alterar"
          class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
        />
        <div v-if="form.errors.password" class="text-red-500 text-xs mt-1">
          {{ form.errors.password }}
        </div>
      </div>

      <!-- Campo de Confirmação de Senha -->
      <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
        <input
          id="password_confirmation"
          type="password"
          v-model="form.password_confirmation"
          placeholder="Preencha somente se quiser alterar"
          class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
        />
        <div v-if="form.errors.password_confirmation" class="text-red-500 text-xs mt-1">
          {{ form.errors.password_confirmation }}
        </div>
      </div>

      <button
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md"
      >
        Atualizar Usuário
      </button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

// Recebe a propriedade 'user' injetada pelo Inertia (através do método edit do controlador)
const props = defineProps({
  user: Object,
})

// Inicializa o formulário com os dados do usuário
const form = useForm({
  name: props.user.name,
  email: props.user.email,
  password: '',
  password_confirmation: '',
})

// Função para submeter o formulário utilizando o método PUT para atualizar os dados
const submit = () => {
  form.put(route('users.update', props.user.id))
}
</script>

<template>
  <Head title="Criar Administrador" />
  <AuthenticatedLayout>
    <div class="p-4 rounded-sm bg-white max-w-full">
      <h1 class="text-xl font-semibold mb-4">Criar Administrador do Departamento</h1>
      <form @submit.prevent="submit" class="space-y-4">

        <div class="flex flex-wrap gap-4">
          <!-- Nome -->
          <div class="flex-1 min-w-[200px]">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
            <input
              id="name"
              type="text"
              v-model="form.name"
              placeholder="Nome do Administrador"
              class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
            />
            <p v-if="form.errors.name" class="text-red-500 text-xs mt-0.5">{{ form.errors.name }}</p>
          </div>

          <!-- E-mail -->
          <div class="flex-1 min-w-[200px]">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
            <input
              id="email"
              type="email"
              v-model="form.email"
              placeholder="exemplo@dominio.com"
              class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
            />
            <p v-if="form.errors.email" class="text-red-500 text-xs mt-0.5">{{ form.errors.email }}</p>
          </div>

          <!-- Departamento (select) -->
          <div class="flex-1 min-w-[200px]">
            <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Departamento</label>
            <select
              id="department"
              v-model="form.crm_team_id"
              class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
            >
              <option value="" disabled>Selecione o departamento</option>
              <option v-for="team in teams" :key="team.id" :value="team.id">{{ team.name }}</option>
            </select>
            <p v-if="form.errors.crm_team_id" class="text-red-500 text-xs mt-0.5">{{ form.errors.crm_team_id }}</p>
          </div>
        </div>

        <div class="flex flex-wrap gap-4">
          <!-- Senha -->
          <div class="flex-1 min-w-[200px]">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
            <input
              id="password"
              type="password"
              v-model="form.password"
              placeholder="Digite a senha"
              class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
            />
            <p v-if="form.errors.password" class="text-red-500 text-xs mt-0.5">{{ form.errors.password }}</p>
          </div>

          <!-- Confirmação de Senha -->
          <div class="flex-1 min-w-[200px]">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha</label>
            <input
              id="password_confirmation"
              type="password"
              v-model="form.password_confirmation"
              placeholder="Confirme a senha"
              class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
            />
            <p v-if="form.errors.password_confirmation" class="text-red-500 text-xs mt-0.5">{{ form.errors.password_confirmation }}</p>
          </div>
        </div>

        <div>
          <button
            type="submit"
            class="text-left text-blue-600 hover:text-blue-800 text-sm font-semibold px-0 py-1 border-0 bg-transparent"
            :disabled="form.processing"
          >
            Criar Administrador
          </button>
        </div>
      </form>

      <!-- Exibição de logs de erro abaixo do formulário -->
      <div v-if="errorMessages.length" class="mt-4 bg-red-50 border border-red-400 p-4 rounded text-sm text-red-700">
        <h3 class="font-semibold mb-2">Erros do formulário:</h3>
        <ul class="list-disc pl-5 space-y-1">
          <li v-for="(msg, idx) in errorMessages" :key="idx">{{ msg }}</li>
        </ul>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useToast } from 'vue-toastification'

const toast = useToast()
const teams = ref([])

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  crm_team_id: '',
})

const page = usePage()
teams.value = page.props.teams ?? []

const errorMessages = ref([])

const submit = () => {
  errorMessages.value = [] // limpa os erros antes do envio
  form.post(route('teams.teamadmin.store'), {
    preserveScroll: true,
    onSuccess: () => {
      toast.success('Administrador do time criado com sucesso!')
      form.reset()
      errorMessages.value = []
    },
    onError: (errors) => {
      toast.error('Falha ao criar administrador. Verifique os dados.')
      errorMessages.value = []

      // Extrair mensagens de erro para exibir no template
      for (const key in errors) {
        if (Object.hasOwnProperty.call(errors, key)) {
          const messages = errors[key]
          if (Array.isArray(messages)) {
            messages.forEach(msg => errorMessages.value.push(msg))
          } else {
            errorMessages.value.push(messages)
          }
        }
      }
      console.error('Erros do formulário:', errors)
    },
  })
}
</script>

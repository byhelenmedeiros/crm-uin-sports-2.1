<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
  <!-- Define o título da página usando o componente Head do Inertia -->
  <Head title="Dashboard" />
  
  <!-- O layout fixo com sidebar e header envolve o conteúdo específico da página -->
  <AuthenticatedLayout>
    <div class="mx-auto">
      <div class="bg-white overflow-hidden rounded-sm shadow p-6 text-gray-900">
        <!-- Conteúdo específico do Dashboard -->
        <h1 class="text-xl font-semibold mb-4">Bem-vindo ao Dashboard</h1>
        <p class="text-base leading-relaxed">
          Aqui você pode monitorar as principais métricas e acessar os módulos do sistema.
        </p>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

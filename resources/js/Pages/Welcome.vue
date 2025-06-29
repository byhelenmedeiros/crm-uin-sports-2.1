<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useToast } from 'vue-toastification';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const showPassword = ref(false);
const toast = useToast();

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            if (Object.keys(form.errors).length === 0) {
                toast.success('Login realizado com sucesso!');
            } else {
                toast.error('Erro ao realizar login, verifique os dados!');
            }
            form.reset('password');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Iniciar sessão" />

        <div class="flex items-center justify-center h-72">
            <div class="bg-white flex w-full">
                <div class="w-1/2 flex items-center justify-center">
                    <img src="images/Logo-UIN-high.png" alt="Logotipo" class="w-28 h-28" /> 
                </div>

                <div class="w-1/2">
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full h-8 rounded-sm"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4 relative">
                            <InputLabel for="password" value="Senha" />

                            <div class="relative">
                                <TextInput
                                    id="password"
                                    :type="showPassword ? 'text' : 'password'"
                                    class="mt-1 block w-full h-8 rounded-sm pr-10"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                />
                                <button 
                                    type="button" 
                                    @click="showPassword = !showPassword" 
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500"
                                >
                                    <i :class="showPassword ? 'fa fa-eye' : 'fa fa-eye-slash'"></i>
                                </button>
                            </div>

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <Checkbox name="remember" v-model:checked="form.remember" />
                                <span class="ms-2 text-sm text-gray-600">Lembrar-me</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Esqueceu-se da sua senha?
                            </Link>

                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Iniciar sessão
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

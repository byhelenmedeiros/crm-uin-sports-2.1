@extends('layouts.authenticated')

@section('title', 'Criar Utilizador')

@section('content')
<div class="p-4 rounded-sm bg-white max-w-full">
    <h1 class="text-xl font-semibold mb-4">Criar Utilizador</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-4 bg-red-50 border border-red-400 p-4 rounded text-sm text-red-700">
            <h3 class="font-semibold mb-2">Erros do formulário:</h3>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
        @csrf

        <div class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
                    placeholder="Nome do Usuário"
                />
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
                    placeholder="exemplo@dominio.com"
                />
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Palavra passe</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
                    placeholder="Digite a Palavra passe"
                />
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Palavra passe</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500"
                    placeholder="Confirme a Palavra Passe"
                />
            </div>
        </div>

        <div>
            <button
                type="submit"
                class="text-left text-blue-600 hover:text-blue-800 text-sm font-semibold px-0 py-1 border-0 bg-transparent"
            >
                Criar Utilizador
            </button>
        </div>
    </form>
</div>
@endsection

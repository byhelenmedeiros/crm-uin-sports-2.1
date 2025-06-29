@extends('layouts.app')

@section('title', 'Editar Utilizador')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Editar Usuário</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nome</label>
            <input name="name" type="text" value="{{ old('name', $user->name) }}" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Senha</label>
            <input name="password" type="password" placeholder="Preencha se quiser alterar" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
            <input name="password_confirmation" type="password" placeholder="Preencha se quiser alterar" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md">Atualizar Usuário</button>
    </form>
</div>
@endsection

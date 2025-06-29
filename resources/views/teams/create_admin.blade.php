@extends('layouts.app')

@section('title', 'Criar Administrador')

@section('content')
<div class="p-4 rounded-sm bg-white max-w-full">
    <h1 class="text-xl font-semibold mb-4">Criar Administrador do Departamento</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border border-red-400 p-4 rounded text-sm text-red-700 mb-4">
            <h3 class="font-semibold mb-2">Erros do formulário:</h3>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('teams.teamadmin.store') }}" class="space-y-4">
        @csrf

        <div class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500" />
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500" />
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="crm_team_id" class="block text-sm font-medium text-gray-700 mb-1">Departamento</label>
                <select id="crm_team_id" name="crm_team_id"
                        class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500">
                    <option value="">Selecione o departamento</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ old('crm_team_id') == $team->id ? 'selected' : '' }}>
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                <input id="password" name="password" type="password"
                       class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500" />
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:border-blue-500" />
            </div>
        </div>

        <div>
            <button type="submit"
                    class="text-left text-blue-600 hover:text-blue-800 text-sm font-semibold px-0 py-1 border-0 bg-transparent">
                Criar Administrador
            </button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Detalhes do Utilizador')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">

    <!-- Botão de Voltar -->
    <div class="mb-6">
        <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">
            ← Voltar para utilizadores
        </a>
    </div>

    <!-- Detalhes do Utilizador -->
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Utilizador</h1>

        <div class="mb-4">
            <span class="font-semibold">ID:</span>
            <span>{{ $user->id }}</span>
        </div>

        <div class="mb-4">
            <span class="font-semibold">Nome:</span>
            <span>{{ $user->name }}</span>
        </div>

        <div class="mb-4">
            <span class="font-semibold">E-mail:</span>
            <span>{{ $user->email }}</span>
        </div>

        @if($user->crm_team_id)
            <div class="mb-4">
                <span class="font-semibold">Team ID:</span>
                <span>{{ $user->crm_team_id }}</span>
            </div>
        @endif

        @if($user->roles && $user->roles->count())
            <div class="mb-4">
                <span class="font-semibold">Papéis:</span>
                <span>
                    {{ $user->roles->pluck('name')->implode(', ') }}
                </span>
            </div>
        @endif
    </div>
</div>
@endsection

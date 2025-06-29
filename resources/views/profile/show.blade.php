@extends('layouts.app')

@section('title', 'O Meu Perfil')

@section('content')
    <div class="max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-800 text-left">O Meu Perfil</h1>
            <a href="{{ route('profile.edit') }}" 
               class="text-pink-600 hover:text-pink-800 text-sm font-medium">
                <i class="fas fa-edit mr-1"></i> Editar Perfil
            </a>
        </div>

        <div class="divide-y divide-gray-200 text-left text-sm text-gray-600">
            <div class="flex items-center py-2 hover:bg-gray-50">
                <i class="fas fa-user text-lg text-gray-800 mr-2"></i>
                <span class="font-medium w-24">Nome:</span>
                <span>{{ $user->name }}</span>
            </div>

            <div class="flex items-center py-2 hover:bg-gray-50">
                <i class="fas fa-envelope text-lg text-gray-800 mr-2"></i>
                <span class="font-medium w-24">Email:</span>
                <span>{{ $user->email }}</span>
            </div>

            <div class="flex items-center py-2 hover:bg-gray-50">
                <i class="fas fa-calendar-alt text-lg text-gray-800 mr-2"></i>
                <span class="font-medium w-24">Registado em:</span>
                <span>{{ $user->created_at->format('d/m/Y') }}</span>
            </div>

            <div class="flex items-center py-2 hover:bg-gray-50">
                <i class="fas fa-users text-lg text-gray-800 mr-2"></i>
                <span class="font-medium w-24">Equipa:</span>
                <span>{{ $user->team->name ?? '—' }}</span>
            </div>
        </div>
    </div>
@endsection

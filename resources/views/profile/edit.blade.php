@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
    <div class="max-w-">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-800">Editar Perfil</h1>
            <a href="{{ route('profile.show') }}" 
               class="text-gray-600 hover:text-gray-800 text-sm font-medium">
                <i class="fas fa-arrow-left mr-1"></i> Voltar
            </a>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf
            @method('PATCH')

            {{-- Nome --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $user->name) }}"
                       class="mt-1 block w-full border border-gray-300 rounded focus:ring-pink-500 focus:border-pink-500 p-2 text-sm" required />
                @error('name')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email (readonly) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" value="{{ $user->email }}" disabled
                       class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded p-2 text-sm text-gray-500" />
            </div>

            {{-- Equipa (readonly) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Equipa</label>
                <input type="text" value="{{ $user->team->name ?? '—' }}" disabled
                       class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded p-2 text-sm text-gray-500" />
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-pink-600 hover:bg-pink-700 text-white py-2 px-4 rounded text-sm">
                    <i class="fas fa-save mr-1"></i> Guardar
                </button>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Lista de Utilizadores')

@section('content')
<div class="mx-auto my-4 px-2">
    <h1 class="text-xl font-semibold mb-4">Lista de Utilizadores</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">E-mail</th>
                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-2 py-1 text-xs text-gray-700">{{ $user->id }}</td>
                        <td class="px-2 py-1 text-xs text-gray-700">{{ $user->name }}</td>
                        <td class="px-2 py-1 text-xs text-gray-700">{{ $user->email }}</td>
                        <td class="px-2 py-1">
                            <div class="flex space-x-1">
                                <a href="{{ route('users.show', $user) }}" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded">Ver</a>
                                <a href="{{ route('users.edit', $user) }}" class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white text-xs rounded">Editar</a>
                                <form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-2 py-2 text-center text-xs text-gray-500">Nenhum utilizador encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

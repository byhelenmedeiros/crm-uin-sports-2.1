@extends('layouts.app')

@section('title', 'Administradores de Setor')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Administradores de Setor</h1>

        <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Nome</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">E-mail</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Departamento</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($teamAdmins as $admin)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $admin->id }}</td>
                            <td class="px-4 py-2">{{ $admin->name }}</td>
                            <td class="px-4 py-2">{{ $admin->email }}</td>
                            <td class="px-4 py-2">
                                {{ $admin->team?->name ?? '—' }}
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('users.show', $admin->id) }}"
                                   class="text-blue-600 hover:underline">Ver</a>
                                <a href="{{ route('users.edit', $admin->id) }}"
                                   class="text-green-600 hover:underline">Editar</a>
                                <form action="{{ route('users.destroy', $admin->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="text-red-600 hover:underline">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-4 text-gray-500">
                                Nenhum administrador de setor encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

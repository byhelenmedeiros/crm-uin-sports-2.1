@extends('layouts.app')

@section('title', 'Lista de Clientes')
@section('content')
    <div class="mx-auto  space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-md font-semibold">Lista de Clientes</h1>
            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-secondary">Novo Cliente</a>
        </div>
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="table table-sm w-full">
                <thead class="bg-gray-50">
                    <tr>
                        @foreach($columns as $field => $label)
                            <th>{{ $label }}</th>
                        @endforeach
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            @foreach($columns as $field => $_)
                                <td>
                                    {{ data_get($client, $field) ?? '—' }}
                                </td>
                            @endforeach
                            <td class="text-center space-x-1">
                                <a href="{{ route('clients.showall', $client) }}" <form method="POST"
                                    action="{{ route('clients.destroy', $client) }}" class="inline"
                                    onsubmit="return confirm('Deseja mesmo excluir?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-error">Excluir</button>
                                    </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) + 1 }}" class="text-center py-4 text-gray-500">
                                Nenhum cliente encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
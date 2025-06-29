@extends('layouts.app')

@section('title', 'Criar Cliente')

@section('content')
<div class="mx-auto p-4 bg-white rounded shadow" x-data="{ activeTab: 'dados_cliente' }">
    <h1 class="text-xl font-semibold mb-4">Criar Novo Cliente</h1>
    <p class="mb-6 text-gray-700 text-sm">Preencha os dados abaixo para criar um novo cliente.</p>

    <nav class="flex border-b border-gray-300 mb-6">
        @foreach ([
            'dados_cliente' => 'Dados do Cliente',
            'dados_complementares' => 'Dados Complementares',
            'morada' => 'Moradas',
            'contactos' => 'Contacto',
            'zone_vendor' => 'Zona & Vendedor',
            'grupos' => 'Grupos de Clientes',
      //      'pessoas' => 'Pessoas',
            'modalidades' => 'Modalidades',

        ] as $tab => $label)
            <button
                @click="activeTab='{{ $tab }}'"
                :class="activeTab === '{{ $tab }}' ? 'px-4 py-2 text-sm font-semibold border-b-2 border-pink-600 text-pink-600' : 'px-4 py-2 text-sm font-semibold text-gray-600'"
                class="focus:outline-none"
            >
                {{ $label }}
            </button>
        @endforeach
    </nav>

    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div x-show="activeTab === 'dados_cliente'">
            @include('clients.partials.tabs._dados_cliente')
        </div>

        <div x-show="activeTab === 'dados_complementares'">
            @include('clients.partials.tabs._dados_complementares')
        </div>

        <div x-show="activeTab === 'morada'">
            @include('clients.partials.tabs._morada', ['addressTypes' => $addressTypes])
        </div>

        <div x-show="activeTab === 'contactos'">
            @include('clients.partials.tabs._contactos')
        </div>

        <div x-show="activeTab === 'zone_vendor'">
            @include('clients.partials.tabs._zone_vendor')
        </div>

        <div x-show="activeTab === 'grupos'">
            @include('clients.partials.tabs._grupos')
        </div>

    

        <div x-show="activeTab === 'modalidades'">
            @include('clients.partials.tabs._modalidades')
        </div>

        <div class="pt-4">
            <button type="submit" class="btn btn-sm btn-primary">
                Salvar Cliente
            </button>
        </div>
    </form>
</div>


@endsection
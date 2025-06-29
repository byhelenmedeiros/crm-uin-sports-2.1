@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="mx-auto p-4 m-0 bg-white rounded shadow" x-data="{ activeTab: 'dados_cliente' }">
<div class="flex items-center justify-between mb-4">
  <h1 class="text-md font-semibold">
    Detalhes do Cliente: 
    <strong class="text-gray-600">{{ $client->name }}</strong>
  </h1>
  <a href="{{ route('clients.index') }}"
     class="btn btn-sm btn-secondary">
    Voltar
  </a>
</div>


    <div class="mb-6 text-sm">
        <p class="text-gray-600">External ID: <strong>{{ $client->external_id }}</strong></p>
        <p class="text-gray-600">NIF: <strong>{{ $client->nif }}</strong></p>
    </div>

    {{-- Nav de Abas --}}
    <nav class="flex border-b border-gray-300 mb-6">
        @foreach ([
            'dados_cliente'         => 'Dados do Cliente',
            'dados_complementares'  => 'Dados Complementares',
            'morada'               => 'Moradas',
            'contactos'            => 'Contacto',
            'zone_vendor'          => 'Zona & Vendedor',
            'grupos'               => 'Grupos de Clientes',
            'modalidades'          => 'Modalidades',
        ] as $tab => $label)
            <button
                @click="activeTab='{{ $tab }}'"
                :class="activeTab === '{{ $tab }}' 
                    ? 'px-4 py-2 text-sm font-semibold border-b-2 border-pink-600 text-pink-600' 
                    : 'px-4 py-2 text-sm font-semibold text-gray-600'"
                class="focus:outline-none"
            >
                {{ $label }}
            </button>
        @endforeach
    </nav>

    {{-- Conteúdo das Abas --}}
    <div class="space-y-6">
        <div x-show="activeTab === 'dados_cliente'">
            @include('clients.show.partials.tabs._dados_cliente', ['client' => $client])
        </div>

        <div x-show="activeTab === 'dados_complementares'">
            @include('clients.show.partials.tabs._dados_complementares', ['client' => $client])
        </div>

        <div x-show="activeTab === 'morada'">
            @include('clients.show.partials.tabs._morada', ['addresses' => $client->addresses])
        </div>

        <div x-show="activeTab === 'contactos'">
            @include('clients.show.partials.tabs._contactos', ['client' => $client])
        </div>

        <div x-show="activeTab === 'zone_vendor'">
            @include('clients.show.partials.tabs._zone_vendor', [
                'zone'   => $client->zone, 
                'vendor' => $client->vendor
            ])
        </div>

        <div x-show="activeTab === 'grupos'">
            @include('clients.show.partials.tabs._grupos', ['client' => $client])
        </div>

        <div x-show="activeTab === 'modalidades'">
            @include('clients.show.partials.tabs._modalidades', ['client' => $client])
        </div>
    </div>
</div>
@endsection

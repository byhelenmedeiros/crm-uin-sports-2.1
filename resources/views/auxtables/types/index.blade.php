@extends('layouts.app')

@section('title', 'Administração de Dados Auxiliares')

@section('content')
<div class="p-2 space-y-4">
    <h1 class="text-xl font-semibold text-gray-800">Módulos Auxiliares</h1>

    {{-- Lista de Módulos --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 ">
        @php
            $modules = [
                ['label' => 'Escalões',         'route' => 'aux.escaloes.index',        'icon' => 'fas fa-layer-group'],
                ['label' => 'Cidades',          'route' => 'aux.cidades.index',         'icon' => 'fas fa-city'],
                ['label' => 'Países',           'route' => 'aux.pais.index',            'icon' => 'fas fa-globe'],
                ['label' => 'Distritos',        'route' => 'aux.distritos.index',       'icon' => 'fas fa-map'],
                ['label' => 'Modalidades',      'route' => 'aux.modalidades.index',     'icon' => 'fas fa-futbol'],
                ['label' => 'Transportes',      'route' => 'aux.transportes.index',     'icon' => 'fas fa-shipping-fast'],
                ['label' => 'Pagamentos',       'route' => 'aux.pagamentos.index',      'icon' => 'fas fa-credit-card'],

              //  ['label' => 'Zonas Comerciais', 'route' => 'aux.zona-comercials.index', 'icon' => 'fas fa-store'],
               // ['label' => 'Zonas',            'route' => 'aux.zonas.index',           'icon' => 'fas fa-map-marker-alt'],
               // ['label' => 'Vendedores',       'route' => 'aux.vendedores.index',      'icon' => 'fas fa-user-tie'],
              //  ['label' => 'Agrupamentos',     'route' => 'aux.agrupamentos.index',    'icon' => 'fas fa-sitemap'],
                ['label' => 'Grupos de Clientes','route'=> 'aux.grupo-clientes.index',  'icon' => 'fas fa-users'],
                ['label' => 'Cor Clube 1',      'route' => 'aux.cor-clube-1.index',     'icon' => 'fas fa-palette'],
               // ['label' => 'Cor Clube 2',      'route' => 'aux.cor-clube-2.index',     'icon' => 'fas fa-palette'],
              //  ['label' => 'Cor Clube 3',      'route' => 'aux.cor-clube-3.index',     'icon' => 'fas fa-palette'],
                ['label' => 'Padrões',          'route' => 'aux.padroes.index',         'icon' => 'fas fa-th-large'],
              //  ['label' => 'Agrupamentos',     'route' => 'aux.agrupamentos.index', 'icon' => 'fas fa-sitemap'],
                ['label' => 'Modalidades de Pagamento', 'route' => 'aux.modalidadepagamento.index', 'icon' => 'fas fa-credit-card'],
                ['label' => 'Tipos de Preço',   'route' => 'aux.preco.index',           'icon' => 'fas fa-tags'],
            ];
        @endphp

        @foreach ($modules as $mod)
            <a href="{{ route($mod['route']) }}"
               class="flex items-center px-2 py-1 rounded hover:bg-pink-100 transition text-gray-700 group border border-transparent hover:border-base-300">
                <i class="{{ $mod['icon'] }} text-pink-600 w-5 text-sm"></i>
                <span class="ml-3 group-hover:underline">{{ $mod['label'] }}</span>
            </a>
        @endforeach
    </div>
</div>
@endsection

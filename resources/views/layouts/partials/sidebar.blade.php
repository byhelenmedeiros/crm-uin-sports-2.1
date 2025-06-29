@php
    $user = auth()->user();
@endphp

@if ($user)
<aside class="h-screen w-64 bg-base-100 border-r border-base-300 fixed left-0 top-0 hidden md:flex flex-col shadow z-30">
    {{-- Logotipo --}}
    <div class="h-20 px-4 flex items-center justify-center border-b border-base-300">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/Logo-UIN-high.png') }}" alt="Logotipo" class="h-10 w-auto">
        </a>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 overflow-y-auto px-2 py-4 text-sm space-y-1">

     

        {{-- Perfil --}}
        <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-2 rounded hover:bg-pink-50 hover:text-pink-700 transition">
            <i class="fas fa-user w-4 h-4 text-pink-600"></i>
            <span class="ml-3">Meu Perfil</span>
        </a>

        {{-- Utilizadores Dropdown --}}
        @if ($user->isAdmin || $user->isSuperadmin)
        <div class="dropdown w-full">
            <label tabindex="0" class="flex items-center justify-between px-4 py-2 rounded hover:bg-pink-200 cursor-pointer">
                <span class="flex items-center">
                    <i class="fas fa-users w-4 h-4 text-gray-500"></i>
                    <span class="ml-3">Utilizadores</span>
                </span>
                <i class="fas fa-chevron-down text-xs"></i>
            </label>
            <ul tabindex="0" class="dropdown-content menu mt-1 p-2 shadow-md bg-base-200 rounded-box w-52 ml-4 border border-gray-200">
                <li><a class="hover:bg-pink-200 rounded px-2 py-1" href="{{ route('users.index') }}">Listar</a></li>
                <li><a class="hover:bg-pink-200 rounded px-2 py-1" href="{{ route('users.create') }}">Criar</a></li>
            </ul>
        </div>
        @endif

        {{-- Setores Dropdown --}}
        @if ($user->isSuperadmin)
        <div class="dropdown w-full">
            <label tabindex="0" class="flex items-center justify-between px-4 py-2 rounded hover:bg-pink-200 cursor-pointer">
                <span class="flex items-center">
                    <i class="fas fa-sitemap w-4 h-4 text-gray-500"></i>
                    <span class="ml-3">Setores</span>
                </span>
                <i class="fas fa-chevron-down text-xs"></i>
            </label>
            <ul tabindex="0" class="dropdown-content menu mt-1 p-2 shadow-md bg-base-200 rounded-box w-52 ml-4 border border-gray-200">
                <li><a class="hover:bg-pink-200 rounded px-2 py-1" href="{{ route('teams.teamadmin.create') }}">Criar Admin</a></li>
                <li><a class="hover:bg-pink-200 rounded px-2 py-1" href="{{ route('teams.index') }}">Ver Admins</a></li>
            </ul>
        </div>
        @endif

        {{-- Clientes Dropdown --}}
        <div class="dropdown w-full">
            <label tabindex="0" class="flex items-center justify-between px-4 py-2 rounded hover:bg-pink-50 hover:text-pink-700 cursor-pointer">
                <span class="flex items-center">
                    <i class="fas fa-users w-4 h-4 text-pink-500"></i>
                    <span class="ml-3">Clientes</span>
                </span>
                <i class="fas fa-chevron-down text-xs"></i>
            </label>
            <ul tabindex="0" class="dropdown-content menu mt-1 p-2 shadow-md bg-base-200 rounded-box w-52 ml-4 border border-gray-200">
                <li><a class="hover:bg-pink-200 rounded px-2 py-1" href="{{ route('clients.index') }}">Listar</a></li>
                <li><a class="hover:bg-pink-200 rounded px-2 py-1" href="{{ route('clients.create') }}">Criar</a></li>
                <li><a class="hover:bg-pink-200 rounded px-2 py-1" href="{{ route('clients.create') }}">Pesquisar</a></li>
            </ul>
        </div>

        {{-- Administração --}}
        <a href="{{ route('auxtables.types.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-pink-200">
            <i class="fas fa-cogs w-4 h-4 text-gray-500"></i>
            <span class="ml-3">Tipos Auxiliares</span>
        </a>

    </nav>
</aside>
@endif

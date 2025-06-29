<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'CRM') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- CSS com Tailwind + DaisyUI --}}
    @vite('resources/css/app.css')
    {{-- JS (inclui FontAwesome, Alpine, etc.) --}}
    @vite('resources/js/app.js')
</head>
<body class="bg-base-200 font-sans">

    {{-- Toasts --}}
    @if(session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
             class="toast toast-top toast-end z-50">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
             class="toast toast-top toast-end z-50">
            <div class="alert alert-error">
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @auth
        <div class="flex min-h-screen">
            {{-- Sidebar --}}
            <aside class="w-64 bg-base-100 shadow-lg hidden md:block">
                @include('layouts.partials.sidebar')
            </aside>

            {{-- Conteúdo principal --}}
            <div class="flex-1 flex flex-col">
                {{-- Topbar --}}
                <div class="navbar bg-base-100 border-b border-gray-200 px-4 z-10">
                    <div class="flex-1">
                        @php
                            $hora = now()->format('H');
                            $saudacao = $hora < 12 ? 'Bom dia' : ($hora < 18 ? 'Boa tarde' : 'Boa noite');
                        @endphp
                        <span class="text-sm font-medium">{{ $saudacao }}, {{ Auth::user()->name }}</span>
                    </div>
                    <div class="flex-none gap-4">
                        <button class="btn btn-ghost btn-circle"><i class="fas fa-envelope text-lg"></i></button>
                        <button class="btn btn-ghost btn-circle"><i class="fas fa-bell text-lg"></i></button>
                        <div class="dropdown dropdown-end">
                            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                <div class="w-8 h-8 rounded-full bg-pink-600 text-white flex items-center justify-center">
                                    <i class="fas fa-user text-sm"></i>
                                </div>
                            </label>
                            <ul tabindex="0"
                                class="mt-3 z-[100] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                                <li>
                                    <a href="#" class="justify-between">
                                        {{ Auth::user()->name }}
                                        <span class="badge">Online</span>
                                    </a>
                                </li>
                                <li><a href="{{ route('profile.edit') }}">Editar Perfil</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="text-left w-full">Sair</button>
                                    </form>
                                </li>
                                <li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Conteúdo da Página para autenticados --}}
                <main class="flex-1 p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <div class="min-h-screen flex items-center justify-center">
            @yield('content')
        </div>
    @endauth

</body>
</html>

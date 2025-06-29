@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-sm bg-white p-6 shadow rounded space-y-6">
    
    <div class="flex flex-col items-center space-y-2">
        <img src="{{ asset('images/Logo-UIN-high.png') }}" alt="Logo" class="w-16 h-16" />
        <p class="text-xs text-gray-500 text-center leading-tight">
            Laravel {{ Illuminate\Foundation\Application::VERSION }} · PHP {{ PHP_VERSION }}<br>
            <span class="font-semibold text-pink-700">CRM UIN SPORTS v2.0</span>
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        @if (session('status'))
            <div class="alert alert-success text-sm">
                {{ session('status') }}
            </div>
        @endif

        {{-- Email --}}
        <div class="form-control">
            <label class="label" for="email">
                <span class="label-text text-xs">Email</span>
            </label>
            <input type="email" name="email" id="email"
                   class="input input-bordered input-sm   text-black"
                   required autofocus value="{{ old('email') }}">
            @error('email')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- Senha --}}
        <div class="form-control">
            <label class="label" for="password">
                <span class="label-text text-xs">Senha</span>
            </label>
            <input type="password" name="password" id="password"
                   class="input input-bordered input-sm bg-white text-black"
                   required autocomplete="current-password">
            @error('password')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- Lembrar-me + Esqueci a senha --}}
        <div class="flex justify-between items-center text-xs">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="checkbox checkbox-xs" />
                <span>Lembrar-me</span>
            </label>
            <a href="{{ route('password.request') }}" class="link link-hover text-gray-600">
                Esqueceu a senha?
            </a>
        </div>

        {{-- Botão --}}
        <div>
            <button class="btn btn-primary btn-sm w-full bg-pink-600 hover:bg-pink-700 text-white">
                Iniciar Sessão
            </button>
        </div>
    </form>
</div>
@endsection

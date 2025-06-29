@extends('layouts.app')

@section('title', 'Criar Utilizador')

@section('content')
<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-lg font-semibold text-gray-800">Criar Novo Utilizador</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-users mr-1"></i> Ver Utilizadores
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 alert alert-success text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 alert alert-error text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
        @csrf

        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome: <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="input input-bordered input-sm w-full" placeholder="Nome Completo" />
            </div>
            <div >
                <label for="email" class="block text-sm font-medium text-gray-700">Email: <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="input input-bordered input-sm w-full" placeholder="exemplo@dominio.com" />
            </div>
        </div>


        <div class="grid grid-cols-6 gap-4 mt-4">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Senha <span class="text-red-500">*</span></label>
                <input type="text" name="password" id="password" required
                       class="input input-bordered input-sm w-full" placeholder="Digite a senha" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha <span class="text-red-500">*</span></label>
                <input type="text" name="password_confirmation" id="password_confirmation" required
                       class="input input-bordered input-sm w-full" placeholder="Confirme a senha" />
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-sm">
                Criar Utilizador
            </button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Login')

@section('content')
    @guest
 
        <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow-lg">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/Logo-UIN-high.png') }}" alt="Logo UIN" class="h-16">
            </div>


            @if (session('status'))
                <div class="mb-4 text-green-600 text-center">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            required
                            autofocus
                            class="pl-10 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Palavra-Passe:</label>
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            class="pl-10 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white py-2 px-4 rounded w-full">
                        <i class="fas fa-sign-in-alt mr-2"></i> Entrar
                    </button>
                </div>
            </form>
        </div>
    @endguest
@endsection

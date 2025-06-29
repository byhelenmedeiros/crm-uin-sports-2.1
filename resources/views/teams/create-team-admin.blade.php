{{-- resources/views/teams/create-team-admin.blade.php --}}
@extends('layouts.app')

@section('title', 'Criar Administrador do Departamento')

@section('content')
<div class="max-w-lg mx-auto p-6">

  {{-- Trigger a simple JS alert if created --}}
  @if(session('success'))
    <script>
      window.addEventListener('DOMContentLoaded', () => {
        alert("Administrador criado com sucesso!");
      });
    </script>
  @endif

  <div class="card bg-base-100 shadow">
    <div class="card-body p-6">
      <h2 class="card-title mb-4 text-lg">Novo Administrador</h2>

      <form action="{{ route('teams.teamadmin.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf

        {{-- Nome --}}
        <div class="form-control">
          <label for="name" class="label"><span class="label-text text-sm">Nome</span></label>
          <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name') }}"
            placeholder="Nome do Administrador"
            class="input input-sm input-bordered w-full"
          />
          @error('name') <span class="text-error text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- E-mail --}}
        <div class="form-control">
          <label for="email" class="label"><span class="label-text text-sm">E-mail</span></label>
          <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
            placeholder="exemplo@dominio.com"
            class="input input-sm input-bordered w-full"
          />
          @error('email') <span class="text-error text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Departamento --}}
        <div class="form-control">
          <label for="crm_team_id" class="label"><span class="label-text text-sm">Departamento</span></label>
          <select
            name="crm_team_id"
            id="crm_team_id"
            class="select select-sm select-bordered w-full"
          >
            <option value="">Selecione o departamento</option>
            @foreach($teams as $team)
              <option value="{{ $team->id }}" @selected(old('crm_team_id') == $team->id)>
                {{ $team->name }}
              </option>
            @endforeach
          </select>
          @error('crm_team_id') <span class="text-error text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Senha --}}
        <div class="form-control">
          <label for="password" class="label"><span class="label-text text-sm">Senha</span></label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Digite a senha"
            class="input input-sm input-bordered w-full"
          />
          @error('password') <span class="text-error text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Confirmar Senha --}}
        <div class="form-control">
          <label for="password_confirmation" class="label"><span class="label-text text-sm">Confirmar Senha</span></label>
          <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            placeholder="Confirme a senha"
            class="input input-sm input-bordered w-full"
          />
          @error('password_confirmation') <span class="text-error text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Submit full width on small, spanning two cols on md --}}
        <div class="form-control md:col-span-2 mt-4">
          <button type="submit" class="btn btn-sm btn-secondary w-full">
            Criar Administrador
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

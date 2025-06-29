<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Exibe a lista de utilizadores (exceto superadmins).
     */
    public function index(): View
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'superadmin');
        })->get();

        return view('users.index', compact('users'));
    }

    /**
     * Exibe detalhes de um utilizador.
     */
  public function show(User $user): View
{
    $user->load('roles');

    return view('users.show', compact('user'));
}


    /**
     * Formulário para criar novo utilizador.
     */
    public function create(): View
    {
        return view('users.create_basic');
    }

    /**
     * Armazena novo utilizador.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!auth()->user()->hasRole('admin', 'superadmin')) {
            return redirect()->back()->withErrors(['error' => 'Não autorizado.']);
        }

        $data['crm_team_id'] = auth()->user()->current_crm_team_id ?? auth()->user()->crm_team_id;
        $data['role_id'] = 3;

        try {
            $user = User::create([
                'name'               => $data['name'],
                'email'              => $data['email'],
                'password'           => Hash::make($data['password']),
                'crm_team_id'        => $data['crm_team_id'],
                'current_crm_team_id'=> $data['crm_team_id'],
                'role_id'            => $data['role_id'],
            ]);

            $user->assignRole('user');

            return redirect()->route('users.index')->with('success', 'Utilizador criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao criar utilizador: ' . $e->getMessage()]);
        }
    }

    /**
     * Formulário para editar utilizador.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Atualiza os dados de um utilizador.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id'  => 'required|in:admin,user',
        ]);

        $this->authorize('update', $user);

        $user->name  = $data['name'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();
        $user->syncRoles([$data['role_id']]);

        return redirect()->route('users.index')->with('success', 'Utilizador atualizado com sucesso!');
    }

    /**
     * Remove um utilizador.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete', $user);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilizador excluído com sucesso!');
    }

    /**
     * Formulário para criar um Administrador de Setor.
     */public function createTeamAdmin(): \Illuminate\View\View
{
    $teams = Team::all(['id', 'name']);
    return view('teams.create-team-admin', compact('teams'));
}

    /**
     * Exibe a lista de Administradores de Setor.
     */public function teamAdminIndex(): View
{
    $teamAdmins = User::whereHas('roles', fn($q) => $q->where('name','admin'))
                      ->with('crmTeam')
                      ->get();

    return view('teams.team-admin-index', compact('teamAdmins'));
}
    /**
     * Armazena um novo Administrador de Setor.
     */
    public function storeTeamAdmin(Request $request): RedirectResponse
    {
        Log::info('storeTeamAdmin chamado', ['request' => $request->all()]);

        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
            'crm_team_id' => ['required', 'exists:crm_teams,id'],
        ]);

        try {
            $user = User::create([
                'name'               => $validated['name'],
                'email'              => $validated['email'],
                'password'           => Hash::make($validated['password']),
                'current_crm_team_id'=> $validated['crm_team_id'],
                'role_id'            => 2,
            ]);

            $user->assignRole('admin');

            return redirect()->route('users.index')->with('success', 'Administrador criado com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao criar administrador do time: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erro interno: ' . $e->getMessage()]);
        }
    }
}

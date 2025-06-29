<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Log;


class ClientPolicy
{
public function create(User $user)
{
    Log::info("ClientPolicy@create chamada para user id {$user->id} com roles: " . $user->roles->pluck('name')->join(', ') . " e permissões: " . $user->permissions->pluck('name')->join(', '));

    $can = $user->hasRole('admin' ) || $user->hasRole('superadmin'   ) || $user->hasPermissionTo('create clients');

    if (!$can) {
        Log::warning("ClientPolicy@create negada para user id {$user->id}");
    } else {
        Log::info("ClientPolicy@create autorizada para user id {$user->id}");
    }

    return $can;
}

    public function viewAny(User $user)
    {
        return $user->hasAnyRole(['admin', 'superadmin', 'user']);
    }

    public function view(User $user, Client $client)
    {
        // Se quiser liberar, coloca true ou regras específicas aqui
        return true;
    }
}

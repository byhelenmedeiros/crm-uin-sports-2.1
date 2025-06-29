<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * Aqui permitimos que, em geral, do processo de listagem ou visualização,
     * qualquer pessoa com alguma credencial acesse a lista.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * Permitimos que o próprio usuário veja seu perfil ou que um admin/superadmin visualize.
     */
    public function view(User $user, User $model): bool
    {
        return $user->id === $model->id || $user->hasAnyRole(['admin', 'superadmin']);
    }

    /**
     * Determine whether the user can create a model.
     *
     * Nessa verificação, passamos um parâmetro adicional ($roleToCreate) no qual o controller
     * deverá informar qual o papel (role) do usuário a ser criado.
     *
     * Regras:
     * - Superadmin pode criar usuários com role "admin".
     * - Admin pode criar usuários com role "user".
     * - Outras situações não são autorizadas.
     */
    public function create(User $user, string $roleToCreate): bool
    {
         // Superadmin: tudo
        if ($user->hasRole('superadmin')) {
            return in_array($roleToCreate, ['admin', 'user'], true);
        }

        if ($user->hasRole('admin') && $roleToCreate === 'user') {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * Regras:
     * - Superadmin pode editar usuários com role "admin" (em qualquer team).
     * - Admin pode editar usuários com role "user", mas somente se pertencerem ao mesmo team.
     */
    public function update(User $user, User $model): bool
    {
        // Superadmin: só edita admins.
        if ($user->hasRole('superadmin') && $model->hasRole('admin')) {
            return true;
        }

        // Admin: só edita users do seu próprio team
        if (
            $user->hasRole('admin') &&
            $model->hasRole('user') &&
            $user->crm_team_id === $model->crm_team_id
        ) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * Regras:
     * - Superadmin pode excluir administradores de qualquer team.
     * - Admin pode excluir usuários (role "user") se eles pertencerem ao mesmo team.
     */
    public function delete(User $user, User $model): bool
    {
        // Superadmin: pode deletar admins
        if ($user->hasRole('superadmin') && $model->hasRole('admin')) {
            return true;
        }

        // Admin: só pode deletar users de seu team
        if (
            $user->hasRole('admin') &&
            $model->hasRole('user') &&
            $user->crm_team_id === $model->crm_team_id
        ) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * Aqui não definimos uma regra de restauração.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * Também não definimos uma regra para deleção permanente.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}

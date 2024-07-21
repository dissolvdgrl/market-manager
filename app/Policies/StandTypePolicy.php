<?php

namespace App\Policies;

use App\Models\StandType;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class StandTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StandType $standType): Response
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to create stand types.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to create stand types.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): Response
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to update stand types.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StandType $standType): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StandType $standType): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StandType $standType): bool
    {
        return false;
    }
}

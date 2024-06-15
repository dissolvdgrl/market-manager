<?php

namespace App\Policies;

use App\Models\MarketDay;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MarketDayPolicy
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
    public function view(User $user, MarketDay $marketDay): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to create market day.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(): Response
    {
        return Auth::user()->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to update a market day.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MarketDay $marketDay): Response
    {
        return Auth::user()->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to delete a market day.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MarketDay $marketDay): Response
    {
        return Auth::user()->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to restore a market day.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MarketDay $marketDay): Response
    {
        return Auth::user()->is_admin()
            ? Response::allow()
            : Response::deny('You do not have permission to force delete a market day.');
    }
}

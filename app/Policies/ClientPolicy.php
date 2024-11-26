<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Check if the user is Admin
     *
     * @param [type] $user
     * @param [type] $ability
     * @return void
     */
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any Clients.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Client.
     *
     * @param  \App\User  $user
     * @param  \App\Client  $Client
     * @return mixed
     */
    public function view(User $user, Client $project)
    {
        //
    }

    /**
     * Determine whether the user can create Clients.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        } elseif ($user->relatedPermissions()->contains('slug', 'create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create Clients.
     *
     * @param User $user
     * @return bool
     */
    public function store(User $user)
    {
        if ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        } elseif ($user->relatedPermissions()->contains('slug', 'create')) {
            return true;
        }
        return false;
    }

    /**
     * Undocumented function
     *
     * @param User $user
     * @param Client $Client
     * @return void
     */
    public function edit(User $user)
    {
        if ($user->relatedPermissions()->contains('slug', 'edit')) {
            return true;
        } elseif ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the Client.
     *
     * @param  \App\User  $user
     * @param  \App\Client  $Client
     * @return mixed
     */
    public function update(User $user, Client $Client)
    {
        if ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        } elseif ($user->relatedPermissions()->contains('slug', 'update')) {
            return true;
        } elseif ($Client->userId == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the Client.
     *
     * @param  \App\User  $user
     * @param  \App\Client  $Client
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($user->RelatedPermissions()->contains('slug', 'delete')) {
            return true;
        } elseif ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the Client.
     *
     * @param  \App\User  $user
     * @param  \App\Client  $Client
     * @return mixed
     */
    public function restore(User $user, Client $Client)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Client.
     *
     * @param  \App\User  $user
     * @param  \App\Client  $Client
     * @return mixed
     */
    public function forceDelete(User $user, Client $Client)
    {
        //
    }
}
<?php

namespace App\Policies;

use App\Models\Email;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailPolicy
{
    use HandlesAuthorization;

    /**
     * Check if the user is Admin
     *
     * @param [type] $user
     * @param [type] $ability
     * @return bool
     */
    public function before($user, $ability): bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view any Emails.
     *
     * @param  User  $user
     * @return void
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Email.
     *
     * @param User $user
     * @param Email $email
     * @return void
     */
    public function view(User $user, Email $email)
    {
        //
    }

    /**
     * Determine whether the user can create Emails.
     *
     * @param  User  $user
     * @return bool
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
     * Determine whether the user can create Emails.
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
     * @param Email $Email
     * @return bool
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
     * Determine whether the user can update the Email.
     *
     * @param  User  $user
     * @param  Email  $Email
     * @return bool
     */
    public function update(User $user, Email $Email)
    {
        if ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        } elseif ($user->relatedPermissions()->contains('slug', 'update')) {
            return true;
        } elseif ($Email->userId == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the Email.
     *
     * @param User $user
     * @return bool
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
     * Determine whether the user can restore the Email.
     *
     * @param  User  $user
     * @param  Email  $Email
     * @return void
     */
    public function restore(User $user, Email $Email)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Email.
     *
     * @param  User  $user
     * @param  Email  $Email
     * @return void
     */
    public function forceDelete(User $user, Email $Email)
    {
        //
    }
}
<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
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
     * Determine whether the user can view any Projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $Project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        //
    }

    /**
     * Determine whether the user can create Projects.
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
     * Determine whether the user can create Projects.
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
     * @param Project $Project
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
     * Determine whether the user can update the Project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $Project
     * @return mixed
     */
    public function update(User $user, Project $Project)
    {
        if ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        } elseif ($user->relatedPermissions()->contains('slug', 'update')) {
            return true;
        } elseif ($Project->userId == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the Project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $Project
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($user->relatedPermissions()->contains('slug', 'delete')) {
            return true;
        } elseif ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the Project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $Project
     * @return mixed
     */
    public function restore(User $user, Project $Project)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $Project
     * @return mixed
     */
    public function forceDelete(User $user, Project $Project)
    {
        //
    }
}
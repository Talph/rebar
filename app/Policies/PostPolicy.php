<?php

namespace App\Policies;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * Determine whether the user can view any BlogPosts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the BlogPost.
     *
     * @param  \App\User  $user
     * @param  \App\BlogPost  $BlogPost
     * @return mixed
     */
    public function view(User $user, BlogPost $BlogPost)
    {
        //
    }

    /**
     * Determine whether the user can create BlogPosts.
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
     * Undocumented function
     *
     * @param User $user
     * @param BlogPost $BlogPost
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
     * Determine whether the user can update the BlogPost.
     *
     * @param  \App\User  $user
     * @param  \App\BlogPost  $BlogPost
     * @return mixed
     */
    public function update(User $user, BlogPost $BlogPost)
    {
        if ($user->relatedRoles()->contains('slug', 'editor')) {
            return true;
        } elseif ($user->relatedPermissions()->contains('slug', 'update')) {
            return true;
        } elseif ($BlogPost->userId == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the BlogPost.
     *
     * @param  \App\User  $user
     * @param  \App\BlogPost  $BlogPost
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
     * Determine whether the user can restore the BlogPost.
     *
     * @param  \App\User  $user
     * @param  \App\BlogPost  $BlogPost
     * @return mixed
     */
    public function restore(User $user, BlogPost $BlogPost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the BlogPost.
     *
     * @param  \App\User  $user
     * @param  \App\BlogPost  $BlogPost
     * @return mixed
     */
    public function forceDelete(User $user, BlogPost $BlogPost)
    {
        //
    }
}

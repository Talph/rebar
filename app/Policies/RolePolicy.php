<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(){
        Gate::define('isAdmin', function ($user) {
            return $user->relatedRoles()->first()->slug == 'admin';
        });

        Gate::define('isManager', function ($user) {
            return $user->relatedRoles()->first()->slug == 'manager';
        });

        Gate::define('isEditor', function ($user) {
            return $user->relatedRoles()->first()->slug == 'editor';
        });
    }
}

<?php

namespace App\Http\Services;

class RoleService
{

    public function storeUserRole($user, $role): bool
    {
        $role
            ?  $user->relatedRoles()->attach($role)
            : $user->relatedRoles()->attach(4); // sets role to 'user'

        return true;
    }
}
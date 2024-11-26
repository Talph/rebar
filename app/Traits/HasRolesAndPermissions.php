<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRolesAndPermissions
{
    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isAdmin()
    {
        if ($this->relatedRoles->contains('slug', 'admin')) {
            return true;
        }
    }
    /**
     * @return mixed
     */
    public function relatedRoles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * @return mixed
     */
    public function relatedPermissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    /**
     * Check if the user has Role
     *
     * @param [type] $role
     * @return boolean
     */
    public function hasRelatedRole($role)
    {

        if (strpos($role, ',') !== false) { //check if this is an list of roles

            $listOfRoles = explode(',', $role);

            foreach ($listOfRoles as $role) {
                if ($this->relatedRoles->contains('slug', $role)) {
                    return true;
                }
            }
        } else {
            if ($this->relatedRoles->contains('slug', $role)) {

                return true;
            }
        }

        return false;
    }
}

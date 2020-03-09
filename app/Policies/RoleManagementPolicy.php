<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoleManagementPolicy
{
    use HandlesAuthorization;
    public function allRole(User $user){
        return $this->getThePermission($user,13);
    }
    public function createRole(User $user){
        return $this->getThePermission($user,14);
    }
    public function getThePermission($user,$p_id){
        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}

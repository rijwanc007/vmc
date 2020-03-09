<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FashionManagementPolicy
{
    use HandlesAuthorization;
    public function allFashion(User $user){
        return $this->getThePermission($user,6);
    }public function createFashion(User $user){
    return $this->getThePermission($user,7);
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

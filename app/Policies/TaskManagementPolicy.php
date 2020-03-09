<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskManagementPolicy
{
    use HandlesAuthorization;
    public function assignAssignment(User $user){
        return $this->getThePermission($user,1);
    }public function completeAssignment(User $user){
        return $this->getThePermission($user,2);
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

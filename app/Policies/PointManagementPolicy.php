<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PointManagementPolicy
{
    use HandlesAuthorization;
    public function allAssignment(User $user){
        return $this->getThePermission($user,8);
    }
    public function createAssignment(User $user){
        return $this->getThePermission($user,9);
    }
    public function trackCompleteAssignment(User $user){
        return $this->getThePermission($user,10);
    }
    public function recycleBin(User $user){
        return $this->getThePermission($user,11);
    }
    public function report(User $user){
        return $this->getThePermission($user,12);
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

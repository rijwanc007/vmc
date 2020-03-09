<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeeManagementPolicy
{
    use HandlesAuthorization;
    public function allEmployee(User $user){
        return $this->getThePermission($user,3);
    }
    public function createEmployee(User $user){
    return $this->getThePermission($user,4);
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

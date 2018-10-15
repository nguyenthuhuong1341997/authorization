<?php
namespace App\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Permission;
use App\Models\User;

class UserPolicy
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
     public function view(User $user)
    {
        $permission = Permission::where('permission', 'showUser')->first();
        return $user->hasRole($permission->roles);
    }
    public function create(User $user)
    {
        $permission = Permission::where('permission', 'addUser')->first();
        return $user->hasRole($permission->roles);
    }

    public function edit(User $user)
    {
       $permission= Permission::where('permission','editUser')->first();
       return $user->hasRole($permission->roles);
    }

    public function delete(User $user)
    {
        $permission= Permission::where('permission','deleteUser')->first();
        return $user->hasRole($permission->roles);
    }
}

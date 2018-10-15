<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'type','description'
    ];

    public function permissions()
    {
    	return $this->belongsToMany('App\Models\Permission','role_permissions','role_id','permission_id');
    }

    public function hasPermission(User $user, Permission $permission)
    {
    	return $this->hasRole($permissions->roles);
    }

    public function inRole($permission)
    {
    	if(is_string($permission)){
    		return $this->permissions->contains('permission',$permission);
    	}
    	return !! $permission->intersect($this->permissions)->count();
    }
}



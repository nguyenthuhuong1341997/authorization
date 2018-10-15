<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'id','permission','description'
    ];

    

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','role_permissions','permission_id','role_id');
    }
    public function inPermission($role)
    {
    	if(is_string($role)){
    		return $this->roles->contains('role',$role);
    	}
    	return !! $role->intersect($this->roles)->count();
    }
}

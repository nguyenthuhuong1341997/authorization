<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userHasPermission($id)
    {
        $user_has_permission= DB::table('users')
                            ->where('users.id','=',$id)
                            ->join('user_has_roles','user_has_roles.user_id','=','users.id')
                            ->join('roles','roles.id','=','user_has_roles.role_id')
                            ->join('role_permissions','role_permissions.role_id','=','roles.id')
                            ->join('permissions','permissions.id','=','role_permissions.permission_id')
                            ->select('permissions.permission')
                            ->distinct()
                            ->get();
        return $user_has_permission;
    }
}

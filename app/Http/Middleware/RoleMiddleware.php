<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next, $role, $permission = null)
    // {
    //     if(!$request->user()->hasRole($role)) {
    //        abort(404);
    //     }
    //     if($permission !== null && !$request->user()->can($permission)) {
    //         abort(404);
    //     }
    //  return $next($request);
    // }
    public function handle($request, Closure $next, $guard = null)
   {
       $users1 = User::with(['roles' => function($query) {
                 return $query->with('permissions');
               }])->find(Auth::id());


       if (count($users1) < 0) {

           return $next($request);
       }else{
           return redirect('/');
       }
   }
}

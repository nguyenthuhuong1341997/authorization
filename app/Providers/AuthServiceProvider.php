<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    var $user;
    public function __construct($foo = null)
    {
        $this->user = new User();
    }
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        $userPermissions= $this->user->userHasPermission(3);
        //foreach ($userPermissions as $userHasPermission) {
            $gate->define('update-post', function ($user,$users) {
                return $user->id = $users->id;
            });
        //}
    }
}

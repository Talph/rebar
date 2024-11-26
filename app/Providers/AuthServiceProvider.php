<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\Email;
use App\Models\Project;
use App\Policies\ClientPolicy;
use App\Policies\EmailPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProjectPolicy;
use http\Client;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Project::class => ProjectPolicy::class,
        BlogPost::class => PostPolicy::class,
        Client::class => ClientPolicy::class,
        Email::class => EmailPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->relatedRoles()->first()->slug == 'admin';
        });

        Gate::define('isManager', function ($user) {
            return $user->relatedRoles()->first()->slug == 'manager';
        });

        Gate::define('isEditor', function ($user) {
            return $user->relatedRoles()->first()->slug == 'editor';
        });
    }
}

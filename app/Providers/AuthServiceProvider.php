<?php

namespace App\Providers;

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
		 \App\Models\Reply::class => \App\Policies\ReplyPolicy::class,
		 \App\Models\Topic::class => \App\Policies\TopicPolicy::class,
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 修改策略自动发现的逻辑
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            // 动态返回模型对应的策略名称，如：// 'App\Model\User' => 'App\Policies\UserPolicy',
            //dump($modelClass);
            return 'App\Policies\\'.class_basename($modelClass).'Policy';
        });

        /*Gate::before(function ($user, $ability){
            if ($user->id == 1){
                //return true;
            }
        });

        Gate::define('update1',function ($currentUser, $user){
            echo 'aasdasd';
            dump('asdasd');
            //return null;
            //return $currentUser->id === $user->id;
        });

        Gate::after(function ($currentUser, $ability, $result, $arguments){
            dump($currentUser,$ability, $result, $arguments);
            return true;
        });*/
    }
}

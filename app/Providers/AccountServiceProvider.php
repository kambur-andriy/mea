<?php

namespace App\Providers;

use App\Models\Account\AuthService;
use App\Models\Account\PasswordService;
use App\Models\Account\UserService;
use App\Models\DB\PasswordReset;
use App\Models\DB\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class AccountServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

	    App::bind(UserService::class, function ($app) {

		    $userModel = new User();

		    $passwordService = $app->make(PasswordService::class);

		    return new UserService($userModel, $passwordService);

	    });

	    App::bind(PasswordService::class, function ($app) {

		    $resetPasswordModel = new PasswordReset();

		    return new PasswordService($resetPasswordModel);

	    });

	    App::bind(AuthService::class, function ($app) {

		    $authService = new AuthManager($app);

		    return new AuthService($authService);

	    });

    }
}

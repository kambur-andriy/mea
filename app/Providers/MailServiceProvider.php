<?php

namespace App\Providers;

use App\Mail\CreateUserMail;
use App\Mail\ResetPasswordMail;
use App\Models\Mail\MailService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
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

	    App::bind('createUserEmail', function ($app, $params) {

		    $mailContent = new CreateUserMail();

		    return new MailService($params['to'], $mailContent);

	    });

	    App::bind('resetPasswordEmail', function ($app, $params) {

		    $mailContent = new ResetPasswordMail($params['resetToken']);

		    return new MailService($params['to'], $mailContent);

	    });

    }
}

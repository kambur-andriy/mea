<?php

namespace App\Providers;


use App\Models\Account\AuthService;
use App\Models\DB\Description;
use App\Models\Dictionary\DescriptionService;
use App\Models\Dictionary\TranslationService;
use App\Models\DB\Translation;
use App\Models\Dictionary\TranslationApi;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class DictionaryServiceProvider extends ServiceProvider
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

	    App::bind(TranslationService::class, function ($app) {

		    $translationModel = new Translation();

		    $translationApi = new TranslationApi();

		    return new TranslationService($translationModel, $translationApi);

	    });

	    App::bind(DescriptionService::class, function ($app) {

		    $descriptionModel = new Description();

		    $authService = $app->make(AuthService::class);

		    return new DescriptionService($descriptionModel, $authService->user()->id);

	    });

    }
}

<?php

namespace Modules\Cms\Partner;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Cms\Partner\Policies\PartnerPolicy;

class Provider extends ServiceProvider
{
    /**
     * This is module name
     *
     * @var string
     */
    protected $module = 'partner';

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Modules\Cms\Partner\Controllers';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load module policies
        $this->loadPolicies();

        // Load module routes
        $this->loadRoutes();

        // Load module views
        $this->loadViewsFrom(__DIR__ . '/Views', $this->module);
        // Load module languages
        $this->loadTranslationsFrom(__DIR__ . '/Translations', $this->module);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function loadRoutes()
    {
        Route::middleware('web')
//             ->namespace($this->namespace)
             ->group(__DIR__ . '/Routes.php');
    }

    /**
     * Define the policies for the module.
     *
     * @return void
     */
    public function loadPolicies()
    {
        Gate::resource('partner',      PartnerPolicy::class);
    }
}

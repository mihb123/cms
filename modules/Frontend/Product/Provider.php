<?php

namespace Modules\Frontend\Product;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * This is module name
     *
     * @var string
     */
    protected $module = 'product-frontend';

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Modules\Frontend\Product\Controllers';

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
        // Load module routes
        $this->loadRoutes(app('request'));

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
    public function loadRoutes($request)
    {
        $locale = strtolower($request->segment(1));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix($locale)
            ->group(__DIR__ . '/Routes.php');
    }
}

<?php

namespace Modules\Cms\Media;

use Modules\Cms\Media\Policy;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * This is module name
     *
     * @var string
     */
    protected $module = 'media';

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Modules\Cms\Media\Controllers';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register media facade
        $this->app->bind('media', function () {
            return new Media;
        });

        // Register helper functions
        require_once(__DIR__ . '/Helper.php');
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

        // Define media widget
        Blade::directive('media', function ($data) {
            return "<?php echo Media::widget($data); ?>";
        });

        Blade::directive('upload', function ($data) {
            return "<?php echo Media::widget($data); ?>";
        });

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function loadRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/Routes.php');
    }

    /**
     * Define the policies for the module.
     *
     * @return void
     */
    public function loadPolicies()
    {
        Gate::resource('media', Policy::class);
    }
}

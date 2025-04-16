<?php

namespace Modules\Cms\Backend;

use App\Role;

use Modules\Cms\Backend\Policies\AdminPolicy;
use Modules\Cms\Backend\Policies\PermPolicy;
use Modules\Cms\Backend\Policies\RolePolicy;
use Modules\Cms\Backend\Policies\SettingPolicy;

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
    protected $module = 'backend';

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Modules\Cms\Backend\Controllers';

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

        // Load module directives
        $this->loadDirectives();

        // Load module views
        $this->loadViewsFrom(__DIR__ . '/Views', $this->module);

        // Load module languages
        $this->loadTranslationsFrom(__DIR__ . '/Translations', $this->module);

        // Load module menu data
        View::composer('backend::partials.sidebar', 'Modules\Cms\Backend\Composers\MenuComposer');

        // Register roles data service
        $this->app->singleton('roles', function ($app) {
            // Load all role from db
            $maps = [];
            $roles = Role::all();

            // Build role data
            foreach($roles as $item) {
                $perms = [];
                foreach(json_decode($item->perms) as $perm) {
                    $perms[$perm] = 1;
                }
                $maps[$item->roles] = $perms;
            }
            return $maps;
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
//            ->namespace($this->namespace)
            ->group(__DIR__ . '/Routes.php');
    }

    /**
     * Define the directives for the application.
     *
     * @return void
     */
    public function loadDirectives()
    {
        // Check current user has role name, e.g: @role('supplier')
        Blade::directive('role', function ($name) {
            return "<?php if (Auth::user()->has($name)) : ?>";
        });

        // Close directive
        Blade::directive('end', function () {
            return "<?php endif; ?>";
        });

        // Check config exists
        Blade::directive('config', function ($key, $value = null) {
            if ($value) {
                return "<?php if (config($key) == $value) : ?>";
            } else {
                return "<?php if (config($key)) : ?>";
            }
        });

        // Check env exists
        Blade::directive('env', function ($key, $value = null) {
            if ($value) {
                return "<?php if (env($key) == $value) : ?>";
            } else {
                return "<?php if (env($key)) : ?>";
            }
        });
    }

    /**
     * Define the policies for the module.
     *
     * @return void
     */
    public function loadPolicies()
    {
        # Manager resource
        Gate::resource('admin',          AdminPolicy::class);
        Gate::resource('role',          RolePolicy::class);
        Gate::resource('perm',          PermPolicy::class);
        Gate::resource('setting',       SettingPolicy::class);
        Gate::resource('backend',       AdminPolicy::class);

        # Customize role
        Gate::define('admin.password',   [AdminPolicy::class , 'password']);

        Gate::define('backend.admin',   [AdminPolicy::class , 'admin']);
    }
}

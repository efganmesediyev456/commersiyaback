<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */


    protected $namespace = 'App\Http\Controllers\Frontend';
    protected $backendNamespace = 'App\Http\Controllers\Backend';
    protected $apiNamespace= 'App\Http\Controllers\Api';
    protected $adminURI = 'admin' ;
    protected $apiURI = 'api';

    public const HOME = '/';
    public const ADMIN =  '/admin';


    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {



        parent::boot();

        $this->configureRateLimiting();
//
//        $this->routes(function () {
//            Route::prefix('api')
//                ->middleware('api')
//                ->namespace($this->namespace)
//                ->group(base_path('routes/api.php'));
//
//            Route::middleware('web')
//                ->namespace($this->namespace)
//                ->group(base_path('routes/web.php'));
//        });

//        dd(config('app.locale'));
    }

    /**
     * Define the routes for the application.
     *
     *
     * @return void
     */
    public function map(Request $request){


        if($request->segment(1) !== $this->adminURI) /// No conflict with same urls
        {
            $this->mapFrontendRoutes($request);
        }

        $this->mapBackendRoutes() ;

        $this->mapApiRoutes() ;

    }

    /**
     * Routes for Frontend
     */
    public function mapFrontendRoutes(Request $request)
    {


        Route::middleware(['web','language'])
            ->prefix($this->checkMultiLanguage($request->segment(1)))
            ->namespace($this->namespace)
            ->group(base_path('routes/frontend.php'));
    }

    /**
    * Routes for Backend
    */
    public function mapBackendRoutes(){
        Route::prefix($this->adminURI)
            ->middleware(['web'])
            ->namespace($this->backendNamespace)
            ->group(base_path('routes/backend.php'));
    }


    /**
     * Route for API's
     */
    public function mapApiRoutes(){
        Route::prefix($this->apiURI)
            ->middleware(['api'])
            ->namespace($this->apiNamespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Check Application Multi language
     *
     * @param $lang
     * @return string
     */
    public function checkMultiLanguage($lang)
    {

        return !(count(config('app.locales')) === 1) ? $lang : '' ;

    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}

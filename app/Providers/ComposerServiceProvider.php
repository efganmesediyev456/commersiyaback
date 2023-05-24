<?php

namespace App\Providers;

use App\View\Composers\Menu\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       View::composer('backend.*', function($view) {

           $view->with('routeName', $this->getCurrentRouteName());


       });


        View::composer(['frontend.includes.nav','frontend.includes.footer','frontend.includes.dropdown-menu'],MenuComposer::class);
    }


    public function getCurrentRouteName():string
    {
        $routeName = explode('.',request()->route()->getName()) ;
        $routeName = $routeName[0] ;
        return $routeName ;
    }
}

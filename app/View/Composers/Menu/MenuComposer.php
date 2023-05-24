<?php

namespace App\View\Composers\Menu;

use App\Models\Atom\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuComposer
{
    protected $dropdown_menu,$header ;

    public function __construct( )
    {
        $this->dropdown_menu = Cache::remember('dropdown_menu',config('app.cache_time'),function () {
            return Menu::getItems('dropdown',true) ;
        });


        $this->header= Cache::remember('header_menu',config('app.cache_time'),function () {
            return Menu::getItems('general',true) ;
        });


    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('dropdown_menu', $this->dropdown_menu);
        $view->with('header_menu', $this->header);
    }
}

<?php

namespace App\View\Components\Menu;

use Illuminate\View\Component;

class MenuItemCreate extends Component
{
    public $page,$menu ;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page,$menu)
    {
        $this->page = $page;
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu.menu-item-create');
    }
}

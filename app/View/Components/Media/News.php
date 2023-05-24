<?php

namespace App\View\Components\Media;

use Illuminate\View\Component;

class News extends Component
{

    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($posts)
    {
        $this->posts = $posts ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.media.news');
    }
}

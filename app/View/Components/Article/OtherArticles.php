<?php

namespace App\View\Components\Article;

use Illuminate\View\Component;

class OtherArticles extends Component
{
    public $posts;
    public $more ;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($posts,$more)
    {
        $this->posts = $posts ;
        $this->more  = $more[count($more) - 2];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article.other-articles');
    }
}

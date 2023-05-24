<?php

namespace App\View\Components\Carousel;

use Illuminate\View\Component;

class Article extends Component
{

    public $post ;
    public $images = [] ;
    public $gallery = [] ;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post ;

        $this->getGallery();

        array_unshift($this->images,!is_null($this->post->image)  ? config('app.url')  . $this->post->image : '')  ;

        $this->gallery =  array_values(array_unique(array_filter($this->images)));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel.article');
    }


    public function getGallery()
    {
        $imagesFromGallery = $this->post->get_simple_items('gallery') ;

        foreach ($imagesFromGallery as $image)
        {

            if ($image->image->count())
            {
                $this->images[] = $image->image->first()->getFullUrl() ;
            }
        }


        return $this->images ;

    }
}

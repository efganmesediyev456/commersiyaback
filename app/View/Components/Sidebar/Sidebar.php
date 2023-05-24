<?php

namespace App\View\Components\Sidebar;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $sidebar,$query,$simple,$template ;
    public $increment = 1 ;
    public $articleSidebar ;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request,$sidebar = null,$post = null ,$simple = null,$template = null)
    {
       $this->simple = $simple ;
       $this->template = $template ;

        if(!is_null($sidebar) && gettype($sidebar) !== "integer")
        {
            $this->query = str_replace('/'. config('app.locale') . '/' , '' , $request->getPathInfo()) ;

            $this->articleSidebar = $post ;

            if($sidebar->hasChild)
                if($sidebar->activeParent) $this->sidebar = $this->activeParentAndChild($sidebar) ;
                else $this->sidebar = $this->deactiveParentAndActiveChild($sidebar) ;
            else
                $this->sidebar = $this->deactiveParentAndActiveChild($sidebar) ;
        }
        else{
            $this->sidebar = $sidebar ?? 0 ;
        }



    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.sidebar.sidebar');
    }

    /**
     *  activeParent - true , activeChild - true , hasChild - true
     * @param $sidebar
     * @return mixed
     */
    public function activeParentAndChild($sidebar)
    {
        $elements = $sidebar;
        foreach ($elements as $e) {

            if ($this->increment == 1) {
                $e->active = $this->query === $e->slug;
            } else {
                $e->active = is_null($this->articleSidebar) ? str_contains($this->query, $e->slug) : str_contains($e->slug , $this->articleSidebar->type );
            }

            $this->increment++;
        }

        return $elements;


    }


    /**
     *  activeParent - true , activeChild - true , hasChild - true
     * @param $sidebar
     * @return mixed
     */
    public function deactiveParentAndActiveChild($sidebar)
    {
        $elements = $sidebar;

        foreach ($elements as $e) {

            if(!is_null($this->template))
            {

                $e->active =  str_contains($this->template, $e->template) ;
            }
            else{
                if(is_null($this->articleSidebar))
                {
                    $e->active =  str_contains($this->query, $e->slug) || str_contains($this->simple, $e->slug) ;
                }
                else {

                    $e->active =  str_contains($e->article_type , $this->articleSidebar->type ) ;
                }
            }



            $this->increment++;
        }

        return $elements;


    }

}

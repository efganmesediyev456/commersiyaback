<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\Page;
use App\Models\Atom\Position;
use App\Models\Atom\Profession;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index($id) {
        $post = Position::findOrFail($id);

        $page = $this->articleParentPage('positions') ;

        $breadCrumb = $this->breadCrumb($page,'breadCrumb_for_professions_' . $post->id,0,null,true);
        $breadCrumb[] = (object)
        [
            'title.'. config('app.locale') => $post->title,
            'link' => null ,
        ];

        $sidebar = $this->sideBar($page,[$page->parent->slug],$breadCrumb,0,$post->id);





        $compact= compact(['post','page','breadCrumb','sidebar']) ;

        return view('frontend.career.professions',$compact) ;


    }


    public function show($position_id,$id)
    {


        $check = Position::findOrFail($position_id);

        $post = Profession::findOrFail($id);



        $page = $this->articleParentPage('positions') ;

        $breadCrumb = $this->breadCrumb($page,'breadCrumb_for_professions_' . $post->id,0,null,true);
        $breadCrumb[] = (object)
        [
            'title.'. config('app.locale') => $post->title,
            'link' => null ,
        ];

        $sidebar = $this->sideBar($page,[$page->parent->slug],$breadCrumb,0,$post->id);




        $otherPosts =$this->otherArticles($position_id,$id);




        $compact= compact(['post','page','breadCrumb','sidebar','otherPosts']) ;

        return view('frontend.career.profession-inner',$compact) ;
    }


    protected function articleParentPage($type)
    {
        return Page::where('template',$type)->firstOrFail() ;
    }

    protected function otherArticles($type,$post)
    {


        return Profession::where('position_id',$type)->
                        where('id','<>',$post)->
                        active()->
                        onlyLocale()->
                        inRandomOrder()->
                        take(3)->
                        get();
    }
}

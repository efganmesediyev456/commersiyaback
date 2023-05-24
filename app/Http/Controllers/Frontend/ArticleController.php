<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($type,$id) {






        $post = Article::findOrFail($id);

//        dd($post);








        $page = $this->articleParentPage($post->type);




//        dd($page);



        $breadCrumb = $this->breadCrumb($page,'breadCrumb_for_article_' . $post->id,0,null,true);

        $breadCrumb[] = (object)
        [
            'title.'. config('app.locale') => $post->title,
            'link' => null ,
        ];



        $sidebar = $this->sideBar($page,[$page->parent->slug],$breadCrumb,0,$post->id);



        switch ($page->article_type) {
            case 'photogallery':
                $view = 'photogallery' ;
                break;
            case 'videogallery':
                $view = 'videogallery' ;
                break;
            default:
                $view = 'article' ;
        }



        $otherPosts =$this->otherArticles($post->id,$post->type);


        $compact= compact(['post','page','breadCrumb','sidebar','otherPosts']) ;




        return view('frontend.media.' . $view ,$compact) ;


    }


    public function articleParentPage($type)
    {
        return Page::where('article_type',$type)->firstOrFail() ;
    }

    public function otherArticles($id,$type)
    {
        $date = Carbon::now() ;

        return Article::where('id' ,'<>',$id)->
//                        whereMonth('date',$date->month)->
//                        whereYear('date',$date->year)->
                        where('type',$type)->
                        orderBy('date','DESC')->
                        active()->
                        onlyLocale()->
                        inRandomOrder()->
                        take(5)->
                        get();
    }
}

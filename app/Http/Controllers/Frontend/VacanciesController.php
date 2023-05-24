<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\Page;
use App\Models\Atom\Position;
use App\Models\Atom\Profession;
use App\Models\Atom\Vacancies;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{

    public function muracet(Request  $request, $id){
        $vacancy=Vacancies::find($id);
        $page=Page::whereTemplate('tecrube-proqrami')->first();
        $breadCrumb = $this->breadCrumb($page, 'breadCrumb_for_' . $page->id,config('app.cache_time'));

        $sidebar    = $this->sideBar($page, [], $breadCrumb, config('app.cache_time'));

        return view('frontend.templates.muraciet', compact('vacancy','page','sidebar'));
    }

    public function show($id)
    {





        $post = Vacancies::findOrFail($id);




        $page = $this->articleParentPage('tecrube-proqrami') ;

        $breadCrumb = $this->breadCrumb($page,'breadCrumb_for_professions_' . $post->id,0,null,true);

        $breadCrumb[] = (object)
        [
            'title.'. config('app.locale') => $post->title,
            'link' => null ,
        ];




        $sidebar = $this->sideBar($page,[$page->parent->slug],$breadCrumb,0,$post->id);





        $otherPosts =$this->otherArticles($id);




        $compact= compact(['post','page','breadCrumb','sidebar','otherPosts']) ;

        return view('frontend.career.vacancy-inner',$compact) ;
    }

    public function muraciet(Request  $request){
        dd($request->all());
    }


    protected function articleParentPage($type)
    {
        return Page::where('template',$type)->firstOrFail() ;
    }

    protected function otherArticles($post)
    {


        return Vacancies:: where('id','<>',$post)->
                        active()->
                        onlyLocale()->
                        inRandomOrder()->
                        take(3)->
                        get();
    }
}

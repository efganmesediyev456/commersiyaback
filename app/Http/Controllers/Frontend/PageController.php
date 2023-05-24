<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\Page;
use App\Models\Atom\SimpleItem;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PageController extends Controller
{




    public function home()
    {
        $home = Page::findOrFail(1) ;


        $topLinks = Cache::remember('topLinks',config('app.cache_time'), function () use ($home) {
            return $home->get_simple_items('links');
        });

        $bottomLinks = Cache::remember('bottomLinks',config('app.cache_time'), function () use ($home) {
            return $home->get_simple_items('bottom-links');
        });


        $stations = Station::with(['translation' => fn($q) => $q->orderBy('title')])->without('translations')->get() ;


        $news = Cache::remember('home_news',config('app.cache_time'), function () use ($home) {
            return Article::where('type','news')->
                            active()->
                            orderByDate()->
                            take(10)->
                            get();
        });





        $actual = Cache::remember('home_actual',config('app.cache_time'), function () use ($home) {
            return Article::where('type','actual')->
                            active()->
                            orderByDate()->
                            take(10)->
                            get();
        });

        $facebook = Cache::remember('home_facebook',config('app.cache_time'), function () use ($home) {
            return Article::where('type','social-platform')->
            where('article_type','facebook')->
            active()->
            orderByDate()->
            take(10)->
            select('id','link','image','type')->
            get();
        });

        $instagram = Cache::remember('home_instagram',config('app.cache_time'), function () use ($home) {
            return Article::where('type','social-platform')->
            where('article_type','instagram')->
            active()->
            orderByDate()->
            take(10)->
            select('id','link','image','type')->
            get();
        });

        $twitter = Cache::remember('home_twitter',config('app.cache_time'), function () use ($home) {
            return Article::where('type','social-platform')->
            where('article_type','twitter')->
            active()->
            orderByDate()->
            take(10)->
            select('id','link','image','type')->
            get();
        });


        $innovative = Cache::remember('home_exploitation',config('app.cache_time'), function () use ($home) {
            return Article::whereIn('type',['exploitation','building','production','presentations'])->
            active()->
            orderByDate()->
            take(10)->
            select('id','date','image','type')->
            get();
        });

        $media = Cache::remember('media',config('app.cache_time'), function () use ($home) {
            return Article::whereIn('type',['photogallery','videogallery'])->
                            active()->
                            orderByDate()->
                            take(10)->
                            get();
        });





        $metroHistory = Cache::remember('home_metroHistory',config('app.cache_time'), function () use ($home) {
            return $home->get_simple_items('metro-history-home');
        });

        $banner = Cache::remember('home_banner',config('app.cache_time'), function () use ($home) {
            return $home->get_simple_items('banners');
        });


        $metroSchema = Cache::remember('metro_schema',config('app.cache_time'), function () use ($home) {
            return $home->get_simple_items('metro-schema');
        });





        $usefulLinks = Cache::remember('useful-links',config('app.cache_time'), function () use ($home) {
            return $home->get_simple_items('useful-links');
        });


        $questionAll = Cache::remember('home_questions-all',config('app.cache_time'), function () use ($home) {
            return Page::where('template','questions-all')->first() ?  Page::where('template','questions-all')->first()->child()->take(3)->get() :[];
        });





        $compact = compact([
            'home'
        ]);

        return view('frontend.index',$compact);
    }

    public function internalPages(...$slugs)
    {



//        return "ok";





        $home = Page::findOrFail(1) ;


        $news =Article::where('type','news')->
            active()->
            orderByDate()->
            take(10)->
            get();



        $media =  Article::whereIn('type',['photogallery','videogallery'])->
            active()->
            orderByDate()->
            take(10)->
            get();



        $actual = Article::where('type','actual')->
            active()->
            orderByDate()->
            take(10)->
            get();



        $searches=['istismar','tikinti','istehsal','setem','konulluluk' ,'sosial','telim-tedris','terefdaslarimiz','tetbiq-ve-teqdimatlar'];


        if(isset($slugs[1])){

        $search=in_array($slugs[1],$searches) ? true:false;
    }else{

        $search=false;
    }














        $page       = $this->hasPage(...$slugs);



        $this->externalLink($page);



        $breadCrumb = $this->breadCrumb($page, 'breadCrumb_for_' . $page->id,config('app.cache_time'));
        $sidebar    = $this->sideBar($page, $slugs, $breadCrumb, config('app.cache_time'));
        $otherItems = $this->getOtherItems($page) ;

        $this->redirectToFirstChild($page, $sidebar);






        $date=null;
        $date2=null;

        if(request()->month && request()->day && request()->year){
            $date=request()->year."-".request()->month."-".request()->day;
        }
        if(request()->month2 && request()->day2 && request()->year2){
            $date2=request()->year2."-".request()->month2."-".request()->day2;
        }

        $posts = $this->articleTypes($page,config('app.cache_time'), $date, $date2) ;










        $compact = compact('page','breadCrumb','sidebar','otherItems','posts','actual','media','news','search');





//        return 'frontend.'.config_json('templates.'.$page->template.'.view');




        return view('frontend.'.config_json('templates.'.$page->template.'.view'),$compact);


    }


    /**
     * Check has this page
     * @param ...$slugs
     * @return mixed
     */
    public function hasPage(...$slugs)
    {
        $checker = implode('/', $slugs);
        $slug = count($slugs) === 1 ? $slugs[0] : end($slugs);

        //////// Eyni slugdan 2 eded olanda parente gore yoxlamaq
        $prev = prev($slugs);
        $parent = $prev ? Page::where('slug', $prev)->firstOrFail() : null;

        $page = Page::where('slug', $slug)->where(function ($query) use ($parent) {
            if ($parent) $query->where('parent_id', $parent->id);
        })->active()->firstOrFail();



        if (Helper::linkGenerator($page) !== 'page/' . $checker ||
            !in_object($page->template, 'templates') ||
            ( config_json('templates.' . $page->template .'.view') == 'null' && $page->template !== 'redirect' ) ) abort(404);


        return $page;

    }







    /**
     * Redirect to external link
     * @param $page
     * @return void ;
     */
    private function externalLink($page)
    {

        if ($page->template === 'links') {
            redirect()->to($page->link)->send();
            die();

        }
    }

    /**
     * Redirect to first child of page
     * @param $page
     * @param $sidebar

     */
    private function redirectToFirstChild($page, $sidebar)
    {

        if ($page->template === 'redirect' || (is_null($page->visible_in_sidebar) && is_null($page->parent_id) && $page->template !== 'information' )) {
            if ($page->child->count() == 0) {
                abort(404);

            } ;
            $to = Helper::linkGenerator($page->child->first()) ;
            redirect(config('app.locale') . '/' . $to)->send();
        }


    }

    /**
     * @param $page
     * @return null
     */
    private function getOtherItems($page)
    {
        // key:string => value:integer
        $layouts = ['guidance-inner' => 3,'structure-inner'=>3];


        if (array_key_exists($page->template,$layouts)) {
            return Page::where('template', $page->template)->
                    where('parent_id', $page->parent_id)->
                    where('id', '!=', $page->id)->
                    onlyLocale()->
                    take($layouts[$page->template])->
                    inRandomOrder()->
                    get();

        }

        return null;
    }


    /**
     * @param $page
     * @param int $cacheTime
     * @return mixed|null
     */
    private function articleTypes($page,$cacheTime = 50000, $date=null, $date2=null)
    {
        $templates = ['article','article-list','howtouse'] ;
        $check = in_array($page->template,$templates) ;
        $type = $page->article_type ;







        if (!$check)
        {

            return null ;
        }
        else
        {
            $paginate = config_json('templates.'. $page->template . '.pagination_limit');
            $pageNumber = request()->page ?? 1;


            if ($paginate)
            {
                if($date and $date2){

                        return Article::where('type',$type)->whereBetween("date",[$date, $date2])->onlyLocale()->active()->orderByDate()->paginate((int) $paginate) ;


                }else{
//                    return Cache::remember('article_pagination_'.$type .'_page_' . $pageNumber . '_lang_' . config('app.locale'),$cacheTime,function () use ($type,$paginate) {
//
//                        return Article::where('type',$type)->onlyLocale()->active()->orderByDate()->paginate((int) $paginate) ;
//
//                    });

                        return Article::where('type',$type)->onlyLocale()->active()->orderByDate()->paginate((int) $paginate) ;


                }

            }else
            {

                return  Cache::remember('article_pagination_' . $page->slug . '_lang_' . config('app.locale'),$cacheTime,function () use ($type) {

                    return Article::where('type',$type)->onlyLocale()->active()->orderByDate()->get() ;

                });
            }
        }



    }


    public function search(Request $request)
    {

        $this->validate($request,[
        ]);

        $search = $request->query('search') ;

        if (is_null($search))
        {
            $articles = null ;
        }
        else {
            $pages = DB::table('page_translations')
                ->leftJoin('pages', 'page_translations.page_id', '=', 'pages.id')
                ->select('page_translations.title',
                    'pages.id',
                    "pages.parent_id",
                    'pages.slug',

                )
                ->addSelect(DB::raw("'page' as type"))
                ->where('page_translations.locale', config('app.locale'))
                ->where('pages.status',1)
                ->whereNotIn('pages.template',['idare-heyeti-inner'])
                ->orderBy('pages.parent_id')
                ->whereNotNull('pages.parent_id')
                ->where('page_translations.title', 'like', "%$search%");










            $articles = DB::table('article_translations')
                ->leftJoin('articles', 'article_translations.article_id', '=', 'articles.id')
                ->select('article_translations.title',
                    'articles.id'
                )
                ->addSelect(DB::raw("null as parent_id , null as slug , type")
                )
                ->where('locale', config('app.locale'))
                ->where('articles.status',1)
                ->orderBy('articles.date','DESC')
                ->where('article_translations.title', 'like', "%$search%")

                ->get();







            foreach ($articles as $art)
            {
                if($art->type == 'page')
                {
                    $p = Page::find($art->id);
                    $art->slug = Helper::linkGenerator($p) ;
                }
                else{
                    $art->slug = 'post/' .$art->id . '/' . Str::slug($art->title) ;
                }

            }
        }




        $result = $articles ;
        $pages=$pages->get();
//        dd($result);

//        dd($result);

        return view('frontend.search',compact('result','pages')) ;
    }




}

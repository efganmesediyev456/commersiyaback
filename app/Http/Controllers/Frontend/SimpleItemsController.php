<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Atom\Page;
use App\Models\Atom\SimpleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SimpleItemsController extends Controller
{
    public function document($id) {

        $doc = SimpleItem::findOrFail($id) ;
        $page = Page::findOrFail($doc->page_id) ;

        $simple_item_slug = Helper::linkGenerator($page) ;

        $slugs = explode('/', $simple_item_slug);
        array_shift($slugs) ;

        $breadCrumb = $this->breadCrumb($page, 'breadCrumb_for_' . $page->id,config('app.cache_time'));
        $sidebar    = $this->sideBar($page, $slugs, $breadCrumb, config('app.cache_time'));








        return view('frontend.templates.document-single',compact('doc','page','sidebar','breadCrumb','simple_item_slug')) ;




//        $breadCrumb = Cache::remember('breadCrumb_for_simple_item'.$ms->id , 50000 ,function () use ($page) {
//           return $page->getBreadCrumb(null,true) ;
//        }) ;
//
//        $breadCrumb[] = [
//            'title.'. config('app.locale') => $ms->medium_text1 .' '. $ms->title .' '. $ms->medium_text2 ?? '',
//            'link' => null ,
//        ];
//
//        $breadCrumb = json_decode(json_encode($breadCrumb), FALSE) ;
//
//
//        $sidebar = Cache::remember('sidebar_for_'.$page->id,50000,function () use ($slugs,$breadCrumb) {
//
//            $return =  Page::where(function ($query) use ($slugs,$breadCrumb)
//            {
//                if ($breadCrumb[0]->link === '/')
//                    $query->where('id',1);
//                else
//                    $query->where('slug',$slugs[0]);
//
//            })->firstOrFail()->child()->ordering()->active()->get() ;
//
//            foreach ($return as $sb)
//                $sb->slug = Helper::linkGenerator($sb) ;
//
//            return $return ;
//        });




        return view('frontend.management_staff_single',compact('ms','sidebar','breadCrumb','simple_item_slug','others')) ;


    }
}

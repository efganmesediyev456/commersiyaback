<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Atom\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    public function multiLanguageFieldsCreator(Request $request,$model,$nullable = false)
    {





        foreach(config('app.locales') as $lang => $locale)
        {
            foreach ($model->translatedAttributes as $key=>$label)
            {






                if($model->translationModel=='App\Models\TranslatorModels\BakuItemTranslation' && $label=="content"){
                    $model->translateOrNew($lang)->$label = $nullable ? null : ( $request->$label[$lang] ?? null );
                }else{
                    $model->translateOrNew($lang)->$label = $nullable ? null : ( $request->$label[$lang] ?? null ) ;
                }




            }

        }

    }

    /**
     * Create breadcrumb for page
     * @param $page
     * @return mixed
     */
    protected function breadCrumb($page,$cacheTitle, $cacheTime = 50000,$parent = null,$lastLink = false)
    {
        return Cache::remember($cacheTitle, $cacheTime, function () use ($page,$parent,$lastLink) {
            return $page->getBreadCrumb($parent,$lastLink);
        });
    }

    /**
     * Create sidebar for page
     * @param $page
     * @param $slugs
     * @param $breadCrumb
     * @param int $cacheTime
     * @return mixed
     */
    protected function sideBar($page, $slugs, $breadCrumb, $cacheTime = 50000,$post = null)
    {
        $select = [
            'id',
            'parent_id',
            'template',
            'slug',
            'article_type',
            'status',
            'ordering',
            'visible_in_sidebar',
            'child_visible_in_sidebar',

        ];




        return Cache::remember('sidebar_for_' . $page->id . ( $post ? '_'.$page->article_type.'_' . $post : '' ) , $cacheTime, function () use ($slugs, $breadCrumb,$select) {

            $parentPage = Page::where(function ($query) use ($slugs, $breadCrumb) {
                if ($breadCrumb[0]->link === '/')
                    $query->where('id', 1);
                else
                    $query->where('slug', $slugs[0]);

            })->firstOrFail($select);


            $hasChild = !!$parentPage->child->count();

            $sidebarElements = $hasChild && $parentPage->child_visible_in_sidebar ? $parentPage->child()->ordering()->active()->get($select) : collect([$parentPage]);
            $sidebarElements->activeParent = !!$parentPage->visible_in_sidebar ;
            $sidebarElements->activeChild  = !!$parentPage->child_visible_in_sidebar   ;
            $sidebarElements->hasChild     =   $hasChild && $sidebarElements->activeChild;



            //Parent page visible in sidebar
            if ($parentPage->visible_in_sidebar && $parentPage->child_visible_in_sidebar && $hasChild) {
                $sidebarElements->prepend($parentPage);

            }


            if ($hasChild && $parentPage->child_visible_in_sidebar) {
                $sidebarElements->hasChild = true;
                foreach ($sidebarElements as $sb)
                    $sb->slug = Helper::linkGenerator($sb);
            } else {

                $sidebarElements[0]->slug = Helper::linkGenerator($parentPage);


            }


            return $sidebarElements;
        });
    }
}

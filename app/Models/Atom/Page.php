<?php

namespace App\Models\Atom;

use App\Helpers\Helper;
use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];


    protected $breadcrumb = [] ;

    public $translationModel = 'App\Models\TranslatorModels\PageTranslation';

    public $translatedAttributes = ['title', 'second_title', 'subtitle', 'description', 'link'];

    public $with = ['translations'];

    protected $slug ='/' ;


    public $noLinkTemplate = ['cooperation'] ;



    public function simple_items()
    {
        return $this->hasMany('App\Models\Atom\SimpleItem', 'page_id');
    }


    public function get_simple_items($type = null,$model = null,$orderByDate = null,$paginate = null)
    {

        $sm = $this->simple_items()->where('type', $type ?? $this->template)->where(function ($query) use ($model) {
            if ($model) $query->where('model',$model);
            else $query->where('model','Page') ;
        } )->active();

        if ($orderByDate)
            $sm =    $sm->orderByDate() ;
        else
            $sm =   $sm->ordering() ;


        return is_null($paginate) ? $sm->get() : $sm->paginate($paginate) ;

    }

    public function child()
    {
        return $this->hasMany(self::class, 'parent_id')->ordering();
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public  function getHrefAttribute()
    {
        return  '/' .  config('app.locale') . '/' . Helper::linkGenerator($this) ;
    }
    public static  function getLinkFrontend($page)
    {
        return  '/' .  config('app.locale') . '/' . Helper::linkGenerator($page) ;
    }


    /**
     * @param $a
     * @param int $num
     *
     * GET CHILDREN ELEMENTS OF  GENERAL PAGES
     */


    public  function getChildren($a, $num = 0,$parent)
    {
        $id = $parent->id ;

        if ($a->count()) {
            $forLastItemCount = 0;
            ++$num;

            foreach ($a as $b) {

                if ($num == 1)   $this->slug = '/' . slug($parent->translate(config('app.fallback_locale'))->title )  . '/';
                $this->slug .= slug($b->translate(config('app.fallback_locale'))->title )  . '/';

                ++$forLastItemCount;
                $last = $a->count() === $forLastItemCount ? 'last' : null;
                echo ' <div class="div-w active">' ;

                echo $this->ChildHTMLTemplate($b,$num,$last,$id,$this->slug);

                if($b->child->count()) {

                    echo '<div class="div-child" style="display: none">';
                    echo $this->getChildren($b->child, $num, $b);
                    echo '</div>';
                }

                echo '</div>' ;

                $this->slug = '/' . slug($parent->translate(config('app.fallback_locale'))->title )  . '/';
            }
        }


    }


    public function ChildHTMLTemplate2($object,$step,$last,$parent,$slug)
    {
        $edit = '';

        $create = '';

        $destroy = '';

        $simple_items = '' ;

        $dropDownButton = '' ;

        $csrf = csrf_field() . method_field('DELETE');

        $three = '';
        if ($step !== 1) {
            for ($i = 0; $i < $step; $i++) {
                $last_three = $i == $step - 1  ? 'last_three' : null;
                $three .= "<span class='three${i} $last_three'></span>";

            }
        }

        if (Helper::roleChecker('page.crete')) {
            $create = '<a class="badge btn mr-2 badge-info p-0" href="'. route( 'page.create',['parent_id'=>$object->id]) .' "><i class="far fa-plus size32"></i></a>';
        }

        $linkCopy = '  <a class="badge btn mr-2 badge-warning p-0 copy-text-to-clipboard" data-href="'. config('app.url') .'/'. config('app.locale')  .'/'. $slug  .'"><i class="far fa-copy size32"></i></a>' ;

        if (Helper::roleChecker('page.edit')) {
            $edit = '<a class="badge btn mr-2 badge-complete p-0" href="' . route('page.edit', $object->id) . '"><i class="far fa-pencil-alt size32"></i></a>';
        }

        if (Helper::roleChecker('page.destroy')) {
            $link = route('page.destroy', $object->id);
            $destroy = <<<EOL
                    <form class="d-inline" action="$link" method="POST">
                    $csrf
                    <button class="badge btn badge-danger p-0" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="far fa-trash-alt size32"></i> </button>
                    </form>
            EOL;
        }



        if($object->child->count()) $dropDownButton = ' <a href="javascript:void(0)" class="btn  btn-outline-warning page-drop active" data-id="' . $object->id . '"></a>';

        if(config_json('templates.'. $object->template .'.simple_items'))
        {
            if ($object->template != 'article')
            {
                foreach(config_json('templates.'. $object->template .'.simple_items') as $value => $simple_item)
                {
                    $simple_items .= '<a href="'. route('simple-item.index',[
                            'model'   => config_json('templates.'. $object->template .'.type'),
                            'page_id' => $object->id,
                            'type'    => $value,
                            'on_iframe' => 1
                        ]). '" class="btn btn-sm btn-grey simple_item_button btn-outline-primary m-1">'. $simple_item. '</a>' ;
                }
            }



        }

        $title = htmlentities(strip_tags($object->title)) ;



        return <<<EOL

                               <div class="tabb  step$step" data-child="$parent">
                                   <div class="" style="width: 60px"> $object->id</div>

                                   <div class="step $last child" style="width: calc(100% - 330px);position: relative">
                               $dropDownButton
                                $three

                                $title
                                $simple_items
                                   </div>
                                   <div class="" style="width: 90px">$object->ordering</div>
                                   <div  style="width: 200px">
                                    $create
                                     $linkCopy
                                     $edit
                                     $destroy
                                   </div>
                               </div>




        EOL;

    }
    public  function getChildren2($a, $num = 0,$parent)
    {
        $id = $parent->id ;

        if ($a->count()) {
            $forLastItemCount = 0;
            ++$num;

            foreach ($a as $b) {





                $link = \App\Helpers\Helper::linkGenerator($b);

                $this->slug = $link;

                ++$forLastItemCount;
                $last = $a->count() === $forLastItemCount ? 'last' : null;
                echo ' <div class="div-w active">' ;

                echo $this->ChildHTMLTemplate2($b,$num,$last,$id,$this->slug);

                if($b->child->count()) {

                    echo '<div class="div-child" style="display: none">';
                    echo $this->getChildren2($b->child, $num, $b);
                    echo '</div>';
                }

                echo '</div>' ;

                $this->slug = '/' . slug($parent->translate(config('app.fallback_locale'))->title )  . '/';
            }
        }


    }
    /**
     * * GET HTML TEMPLATE FOR CHILDREN using with @function getChildren
     * @param $object
     * @param $step
     * @param $last
     * @param $parent
     * @return string
     */

    public  function ChildHTMLTemplate($object,$step,$last,$parent,$slug)
    {
        $edit = '';

        $create = '';

        $destroy = '';

        $simple_items = '' ;

        $dropDownButton = '' ;

        $csrf = csrf_field() . method_field('DELETE');

        $three = '';
        if ($step !== 1) {
            for ($i = 0; $i < $step; $i++) {
                $last_three = $i == $step - 1  ? 'last_three' : null;
                $three .= "<span class='three${i} $last_three'></span>";
            }
        }

        if (Helper::roleChecker('page.crete')) {
            $create = '<a class="badge btn mr-2 badge-info p-0" href="'. route( 'page.create',['parent_id'=>$object->id]) .' "><i class="far fa-plus size32"></i></a>';
        }

        $linkCopy = '  <a class="badge btn mr-2 badge-warning p-0 copy-text-to-clipboard" data-href="'. config('app.url') .'/'. config('app.locale') .'/page' . $slug  .'"><i class="far fa-copy size32"></i></a>' ;

        if (Helper::roleChecker('page.edit')) {
            $edit = '<a class="badge btn mr-2 badge-complete p-0" href="' . route('page.edit', $object->id) . '"><i class="far fa-pencil-alt size32"></i></a>';
        }

        if (Helper::roleChecker('page.destroy')) {
            $link = route('page.destroy', $object->id);
            $destroy = <<<EOL
                    <form class="d-inline" action="$link" method="POST">
                    $csrf
                    <button class="badge btn badge-danger p-0" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="far fa-trash-alt size32"></i> </button>
                    </form>
            EOL;
        }



        if($object->child->count()) $dropDownButton = ' <a href="javascript:void(0)" class="btn  btn-outline-warning page-drop active" data-id="' . $object->id . '"></a>';

        if(config_json('templates.'. $object->template .'.simple_items'))
        {
            if ($object->template != 'article')
            {
                foreach(config_json('templates.'. $object->template .'.simple_items') as $value => $simple_item)
                {
                    $simple_items .= '<a href="'. route('simple-item.index',[
                            'model'   => config_json('templates.'. $object->template .'.type'),
                            'page_id' => $object->id,
                            'type'    => $value,
                            'on_iframe' => 1
                        ]). '" class="btn btn-sm btn-grey simple_item_button btn-outline-primary m-1">'. $simple_item. '</a>' ;
                }
            }



        }

        $title = htmlentities(strip_tags($object->title)) ;



        return <<<EOL

                               <div class="tabb  step$step" data-child="$parent">
                                   <div class="" style="width: 60px"> $object->id</div>

                                   <div class="step $last child" style="width: calc(100% - 330px);position: relative">
                               $dropDownButton
                                $three

                                $title
                                $simple_items
                                   </div>
                                   <div class="" style="width: 90px">$object->ordering</div>
                                   <div  style="width: 200px">
                                    $create
                                     $linkCopy
                                     $edit
                                     $destroy
                                   </div>
                               </div>




        EOL;

    }





    /**
     * @param null $parent
     * @param false $addLastLink // Sonuncu linkin aktiv olub olmamasi uchun
     * @return mixed
     */
    public function getBreadCrumb($parent = null,$addLastLink = false) {
        $arr = array() ;

        if (is_null($parent))
        {
            foreach(config('app.locales') as $locale => $name)
                $arr['title.' . $locale] = $this->translate($locale)->title ?? '' ;



            $arr['link'] = $addLastLink ? Helper::linkGenerator($this) : null ;
            $this->breadcrumb[] = $arr;

            if ($a = $this->parent)
            {
                foreach(config('app.locales') as $locale => $name)
                    $arr['title.' . $locale] = $a->translate($locale)->title ?? '' ;

                if ( in_array($a->template,$this->noLinkTemplate) )
                     $arr['link'] = null;
                else $arr['link'] = Helper::linkGenerator($a) == '/' ? '/' :   Helper::linkGenerator($a) ;

                $this->breadcrumb[] = $arr;
                $this->getBreadCrumb($a) ;
            }


        }
        else{
            if ($a = $parent->parent)
            {

                foreach(config('app.locales') as $locale => $name)
                    $arr['title.' . $locale] = $a->translate($locale)->title ?? '' ;

                $arr['link'] = Helper::linkGenerator($a) ;

                $this->breadcrumb[] = $arr;

                $this->getBreadCrumb($a) ;
            }
        }
        return  json_decode(json_encode(array_reverse($this->breadcrumb)), FALSE)  ;

    }

}

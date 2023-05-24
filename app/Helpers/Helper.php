<?php


namespace App\Helpers;


use App\Models\Atom\Page;

class Helper
{
    protected static $link , $increment = 1 ;

    public static function roleChecker($router) {

        return auth("admin")->user()->hasRole($router) ;
    }



    public function ChildHTMLTemplate($object,$step,$last,$parent,$slug)
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
    public function getChildren($a, $num = 0,$parent)
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

    public static function linkGenerator($object)
    {



        if(is_object($object)) {
            $object=Page::find($object->getOriginal('id'));
        }

        $parent = @$object->parent ;







        if (!is_null($parent) )
        {
            self::$link = '/' . $parent->slug   . self::$link  . (self::$increment === 1 ? '/' .  $object->slug : '' ) ;
            self::$increment++ ;
//            dd( self::$link);
            return self::linkGenerator($parent) ;
        }
        else
        {
            $link = self::$increment === 1 ? '/' . @$object->slug : self::$link  ;
            self::$link = '' ;
            self::$increment = 1 ;

        }

        $link = trim(  $link,'/') ;



        if(class_basename($object) == 'Page'  && !empty($link))  $link = 'page/'. $link;

        return $link;

    }


}

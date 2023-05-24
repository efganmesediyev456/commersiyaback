<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Menu;
use App\Models\Atom\MenuItem;
use App\Models\Atom\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Composer\Autoload\includeFile;

class MenuController extends Controller
{
    protected $sort_menu = array() ;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Menu::paginate20() ;
        return  view('backend.atom.menu.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.atom.menu.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'title.'.config('app.fallback_locale') => ['required'],
           'slug' => ['required'],
       ]) ;

       $menu = new Menu() ;

        $order = Menu::max('ordering') + 1 ;



        $this->multiLanguageFieldsCreator($request,$menu);

        $menu->slug = $request->slug ;
        $menu->ordering = $order ;

        $menu->save() ;

        return redirect()->route('menu.edit',$menu->id)->with('success','Əlavə edildi !')  ;


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function menu_item_store(Request $request)
    {
        $menuItem = new MenuItem() ;


        $order = MenuItem::where('parent_id',$request->child)->where('menu_id',$request->menu_item)->max('ordering') + 1 ??  0 ;


        $this->multiLanguageFieldsCreator($request,$menuItem);
//        if(is_null($request->page)) $this->multiLanguageFieldsCreator($request,$menuItem);
//        if(!is_null($request->page)) $this->multiLanguageFieldsCreator($request,$menuItem,true);

        $menuItem->ordering = $order ;
        $menuItem->parent_id = $request->child ?? null ;
        $menuItem->menu_id = $request->menu_item  ;
        $menuItem->status = $request->status ?? 1  ;
        $menuItem->on_blank= $request->on_blank ?? 0  ;

        if(!is_null($request->page))
        {
            $menuItem->model_record_id = $request->page ;
            $page = Page::findOrFail($request->page) ;

            $classes = get_declared_classes() ;

            $needleModel =  config_json('templates.'.$page->template.'.type') ;

            $model = array_filter($classes, function($i) use ($needleModel)  {

                return          strpos($i, 'App\Models') === 0 &&            // Search all models  with start App\Models
                                strpos($i, 'App\Models\Translator') !== 0 && // Exclude models with start App\Models\Translator
//                                str_ends_with($i,$needleModel) ;                    // Search model with end $model
                                str_ends_with($i,'Page') ;                           // Search model with end $model
            });


            $menuItem->model  = current($model) ;

        }


        $menuItem->save() ;


        return redirect()->back()->with('success','Əlavə edildi !')  ;




    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $menu = Menu::findOrFail($id);



        $page = Page::all() ;



        $menuItems = Menu::getItems($menu->slug) ;




        return  view('backend.atom.menu.edit',compact('menu','menuItems','page')) ;
    }




    public function menu_item_edit(Request $request)
    {
       $menu = MenuItem::findOrFail($request->id) ;

       return $menu ;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $this->multiLanguageFieldsCreator($request,$menu);

        $menu->update() ;

        return redirect()->route('menu.index')->with('success','Dəyişdirildi !') ;
    }

    public function menu_item_update(Request $request,$id)
    {
        $menuItem = MenuItem::findOrFail($id) ;


        $this->multiLanguageFieldsCreator($request,$menuItem);
//        if(is_null($request->page)) $this->multiLanguageFieldsCreator($request,$menuItem);
//        if(!is_null($request->page)) $this->multiLanguageFieldsCreator($request,$menuItem,true);

//        dd($request->all());

//        $menuItem->parent_id = $request->child ?? null ;
        $menuItem->menu_id = $request->menu_item  ;
        $menuItem->status = $request->status ?? $menuItem->status  ;
        $menuItem->on_blank= $request->on_blank ?? $menuItem->on_blank  ;

        if(!is_null($request->page))
        {
            $menuItem->model_record_id = $request->page ;
            $page = Page::findOrFail($request->page) ;

            $classes = get_declared_classes() ;

            $needleModel =  config_json('templates.'.$page->template.'.type') ;

            $model = array_filter($classes, function($i) use ($needleModel)  {

                return          strpos($i, 'App\Models') === 0 &&            // Search all models  with start App\Models
                    strpos($i, 'App\Models\Translator') !== 0 && // Exclude models with start App\Models\Translator
                    //                                str_ends_with($i,$needleModel) ;                    // Search model with end $model
                    str_ends_with($i,'Page') ;                           // Search model with end $model
            });


            $menuItem->model  = current($model) ;

        }
        else
        {
            $menuItem->model  = null;
            $menuItem->model_record_id = null ;
        }


        $menuItem->update() ;

        \Artisan::call('cache:clear');


        return redirect()->back()->with('success','Əlavə edildi !')  ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */



    public function menu_item_sort(Request $request) {

        foreach ($request->sort as $i => $element)
        {
            $this->sort_menu[] = [
                'id'       => $element['id'],
                'ordering' => $i + 1 ,
                'parent_id'   =>  null
            ];

            if (isset($element['children']))
              $this->recursiveSorting($element['children'],$element['id']) ;

        }

        MenuItem::upsert($this->sort_menu,['id'],['ordering','parent_id']) ;

        $this->sort_menu = array() ;

        \Artisan::call('cache:clear');

        return "Yadda saxlanıldı !" ;

    }

    public  function recursiveSorting($children, $parent)
    {
        if (isset($children))
        {
            foreach ($children as $j => $child)
            {
                $this->sort_menu[] = [
                    'id'       => $child['id'],
                    'ordering' => $j + 1 ,
                    'parent_id'   =>  $parent
                ];
                if (isset($child['children']))
                    $this->recursiveSorting($child['children'],$child['id']) ;

            }
        }
    }






    public function destroy($id)
    {
        $menu = MenuItem::findOrFail($id);

        $menu->delete() ;


        return redirect()->back()->with('success','Silindi !')  ;
    }

    public function main_destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->delete() ;


        return redirect()->back()->with('success','Silindi !')  ;
    }
}

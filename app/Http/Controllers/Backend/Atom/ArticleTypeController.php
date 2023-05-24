<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleTypeController extends Controller
{
    public function index_json() {
        $items = config_json('article-types');



        return  view('backend.atom.article-types.index-json',compact('items')) ;
    }

    public function json_create()
    {
        return  view('backend.atom.article-types.create-json') ;

    }

    public function json_store(Request $request) {


        $label = [] ;

        if (count($request->label))
        {
            foreach($request->label as $key =>  $value)
            {
                $label[$value] = true ;
            }
        }

        $file = base_path('config/article-types.json');

        if (file_exists($file)) {
            $json = json_decode(file_get_contents($file), true);
            $json[$request->category][$request->name] = array_filter($label) ;

            file_put_contents($file,json_encode($json,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT )) ;


        }

        return redirect()->route('article-types.index')->with('success','Əlavə edildi  !') ;

    }

    public function json_edit($id,$type)
    {
        $template = config_json('article-types.'. $id . '.' . $type  );
        $temp_name = $id ;
        $temp_category = $type ;
        return  view('backend.atom.article-types.edit-json',compact('template','temp_name','temp_category')) ;
    }

    public function json_update(Request $request , $id,$category)
    {


        $label = [] ;

        if (count($request->label))
        {
            foreach($request->label as $key =>  $value)
            {

                $label[$value] = true ;
            }
        }



        $file = base_path('config/article-types.json');

        if (file_exists($file)) {
            $json = json_decode(file_get_contents($file), true);
            $json[$id][$category] = array_filter($label) ;



            file_put_contents($file,json_encode($json,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT )) ;


        }


        return redirect()->route('article-types.index')->with('success','Dəyişdirildi !') ;
    }

    public function json_destroy($id,$category)
    {

        $file = base_path('config/article-types.json');

        if (file_exists($file)) {
            $json = json_decode(file_get_contents($file), true);
            unset($json[$id][$category]) ;

            if (!count($json[$id])) unset( $json[$id]);


            file_put_contents($file,json_encode($json,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT )) ;


        }






        return redirect()->route('article-types.index')->with('success','Silindi !') ;
    }
}

<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\Page;
use Barryvdh\Debugbar\Facade as DebugBar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ExtraController extends Controller
{
    public function removePhoto($model_value,$id,$field = null,$path = null) {

        if($model_value == 'SpatieMedia'){
        $media = Media::find($id);

        $media->delete();
        return back()->with('success','Silindi!');
    }

        $model = '\App\Models\Atom\\'.$model_value;

        $model = $model::findOrFail($id);

        if ($model_value == 'Article')
        {
            $path   =  public_path() .  $model->$field;

        }
        else{

            $path   =  base_path() . '/storage/app/public/'.$path.'/' . $model->$field;
        }



        if( @unlink($path) ) {


//            if($relation) {
//
//                $model->delete();
//            }
//            else{

                $model->$field = null;
                $model->save();
//            }


            return back()->with('success','Silindi!');

        }
        else {
            return back()->withErrors(['error' =>'Fayl silinmədi!']);
        }

    }




    public function clear_cache()
    {
        \Artisan::call('cache:clear');
        return redirect()->back();
    }



    public function test() {

//        $news = DB::connection('mysql2')->table('news')->get();
//
//
//
//        foreach ($news as $n)
//        {
//            $request = new \stdClass() ;
//
//            $request->date = Carbon::parse($n->datePublic) ;
//            $request->status = 1 ;
//            $request->type = 'news';
//            $request->link = null ;
//            $request->iframe = null ;
//            $request->uniq_id = (string) Str::uuid() ;
//            $request->image = is_null($n->varImage) ? '/default.png' : str_replace('news/','/storage/articles/news/',$n->varImage) ;
//            $request->title['az'] = $n->varTitle_az ?? null ;
//            $request->title['en'] = ( empty($n->varTitle_en) ? null : $n->varTitle_en ) ?? null ;
//            $request->title['ru'] = ( empty($n->varTitle_ru) ? null : $n->varTitle_ru ) ?? null ;
//            $request->description['az'] = $n->varText_az ?? null ;
//            $request->description['en'] = ( empty($n->varText_en) ? null : $n->varText_en ) ?? null ;
//            $request->description['ru'] = ( empty($n->varText_ru) ? null : $n->varText_ru ) ?? null ;
//            $request->subtitle['az'] = $n->varShortText_az ?? null ;
//            $request->subtitle['en'] = ( empty($n->varShortText_en) ? null : $n->varShortText_en ) ?? null ;
//            $request->subtitle['ru'] = ( empty($n->varShortText_ru) ? null : $n->varShortText_ru ) ?? null ;
//
//
//
//
//                $article = new Article() ;
//
//
//            foreach(config('app.locales') as $lang => $locale)
//            {
//                foreach ($article->translatedAttributes as $label)
//                {
//                    $article->translateOrNew($lang)->$label = $request->$label[$lang] ?? null  ;
//                }
//
//            }
//
//            $article->date =    Carbon::parse($request->date) ;
//            $article->status = $request->status ?? 1 ;
//            $article->type =   $request->type ;
//            $article->link =   $request->link ;
//            $article->iframe = $request->iframe;
//            $article->uniq_id = Str::uuid() ;
//            $article->image = $request->image ;
//
//            $article->save() ;
//
//
//        }
//
//        echo  1 ;
//
//        return  1;


    }
}

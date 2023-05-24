<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\SimpleItem;
use App\Rules\PhotoGalleryRule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $validator = array() ;


    public function hasArticleType(Request $request)
    {





       if(!in_object($request->type,'article-types.' . $request->category) )
          abort(404);
    }


    public function validateRequestWithTypes(Request $request)
    {
        $validate = [
            'title.'.config('app.fallback_locale') => ['sometimes','required','string'],
//            'subtitle.'.config('app.fallback_locale') => ['sometimes','required','string'],
            'description.'.config('app.fallback_locale') => ['sometimes','required'],
            'photo-is-gallery'   => ['sometimes',!$request->hasFile('image') ?  'required' : null] ,
            'photo-is-gallery'   => ['sometimes'] ,
//            'checkGallery' => ['sometimes', new PhotoGalleryRule($request->checkGallery)] ,
            'link'   => 'sometimes',
            'iframe' => 'sometimes|required',
//            'image' => ['sometimes', 'image','mimes:jpg,bmp,png,jpeg,svg'],
        ];


        return array_filter($validate) ;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->hasArticleType($request);


        $items = Article::where('type',$request->type)->orderByDate()->paginate20() ;
//        $items = Article::where('type',$request->type)->orderBy("id","desc")->paginate20() ;

        return view('backend.atom.articles.index',compact('items')) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->hasArticleType($request);


        $id=DB::select("ANALYZE TABLE `articles`");
        $id=DB::select("SHOW TABLE STATUS LIKE 'articles'");

         $uniq_iq = session()->has('uniq_id') ? session('uniq_id') : session(['uniq_id'=> (string) Str::uuid() ]); ;




        $idForSimpleItem=$id[0]->Auto_increment;




        return view('backend.atom.articles.create',compact('idForSimpleItem')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {








//        $this->hasArticleType($request);

        $this->validate($request, $this->validateRequestWithTypes($request));





            $article =  new Article() ;

            $this->multiLanguageFieldsCreator($request,$article);
            $article->date =    Carbon::parse($request->date) ;
            $article->status = $request->status ?? 1 ;
            $article->type =   $request->type ;
            $article->link =   $request->link ;
            $article->iframe = $request->iframe;
            $article->uniq_id = session('uniq_id') ;




            if ($request->image)
            {



                $file=$request->image;
                $fileName = Str::uuid().'.'.$file->guessClientExtension();

                $file->move(storage_path('app/public/articles/news'), $fileName);


                $article->image='/storage/articles/news/'.$fileName;










            }



            if($article->save()) session()->forget('uniq_id');











        $appends = [
            'type'         => request()->get('type'),
            'category'     => request()->get('category')

        ];




        return redirect()->route('article.index',$appends)->with('success','Əlavə edildi !') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request  , $id)
    {
        $this->hasArticleType($request);
        $item = Article::findOrFail($id) ;


        return view('backend.atom.articles.edit',compact('item')) ;

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



//        $this->hasArticleType($request);


        $this->validate($request, $this->validateRequestWithTypes($request));

        $article =  Article::findOrFail($id) ;



        $this->multiLanguageFieldsCreator($request,$article);

        $article->date = Carbon::parse($request->date) ;
        $article->status = $request->status ?? 1 ;
        $article->type = $request->type;
        $article->link =   $request->link ;
        $article->iframe = $request->iframe;




        if ($request->image)
        {
            if( file_exists(public_path($article->image)) && !strstr($article->image,'/storage/media/') && !is_null($article->image) && $article->image!="/default.png" && strstr($article->image, "default.png")=='')
            {
                unlink(public_path($article->image));
            }


//            $base64_image = $request->input('image_file'); // your base64 encoded
//            @list($type, $file_data) = explode(';', $base64_image);
//            @list(, $file_data) = explode(',', $file_data);
//            $imageName = Str::random(10).'.'.'png';
//            \Storage::disk('public')->put('/articles/news/'.$imageName, base64_decode($file_data));
//            $article->image   =   '/storage/articles/news/' . $imageName;



            $file=$request->image;
            $fileName = Str::uuid().'.'.$file->guessClientExtension();

            $file->move(storage_path('app/public/articles/news'), $fileName);


            $article->image='/storage/articles/news/'.$fileName;

//            $hashName = $request->file('image')->hashName() ;
//            $article->image   =   '/storage/articles/news/' . $request->file('image')->hashName();
//            $request->image->storeAs('articles/news', $hashName, 'public' );



        }
//        else if($request->type !== 'videogallery')
//        {
//            if( file_exists(public_path($article->image)) && $article->image !== $request['photo-is-gallery']
//                && !strstr($article->image,'/storage/media/') && !is_null($article->image))
//            {
////                unlink(public_path($article->image));
//            }
////            $article->image = $request['photo-is-gallery'] ;
//        }

        $article->update() ;

        $appends = [
            'type'         => request()->get('type'),
            'category'     => request()->get('category')

        ];


        return redirect()->route('article.index',$appends)->with('success','Əlavə edildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {


        $article = Article::findOrFail($id);


        if( file_exists(public_path($article->image)) && !strstr($article->image,'/storage/media/') && !is_null($article->image) && $article->image!="/default.png" && strstr($article->image, "default.png")=='')
        {
            unlink(public_path($article->image));
        }

//       $a =  SimpleItem::where('uniq_id',$article->uniq_id)->get() ;
//
//        foreach ($a as $b) $b->delete() ;

        $article->delete() ;

        $appends = [
            'type'         => request()->get('type'),
            'category'     => request()->get('category')

        ];

        return redirect()->route('article.index',$appends)->with('success','Silindi !') ;


    }





    }

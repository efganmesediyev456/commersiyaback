<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Page;
use App\Models\Atom\SimpleItem;
use Barryvdh\Debugbar\Facade as DebugBar;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use function GuzzleHttp\Promise\all;

class SimpleItemController extends Controller
{

    public $type , $page_id , $model ;


    public function checkHasPage(Request $request)

    {


        $this->type = $request->type;
        $this->page_id = $request->page_id;
        $this->model = $request->model;
        $this->uniq_id = $request->uniq_id;

        if (strtolower($request->model) === 'home')
        {
            $page = new \stdClass() ;
            $page->template = 'home' ;

        }
        elseif (strtolower($request->model) === 'article')
        {
            $page = new \stdClass() ;
            $page->template = 'article' ;
        }
        else {

            $page = Page::findOrFail( $this->page_id) ;
        }



        if(!in_object( $this->type,'simple-items') ||
            !in_object( $this->type,'templates.' . $page->template . '.simple_items' ) )
        {
            abort(404);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->checkHasPage($request) ;


        $items = SimpleItem::where('type',$this->type)
            ->where(function ($query) {
                if ($this->model == 'Article') $query->where('uniq_id',$this->uniq_id) ;
                else $query->where('page_id',$this->page_id) ;
            })
            ->where('model', $this->model)
            ->paginate20();


        return view('backend.atom.simple-items.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->checkHasPage($request) ;
        $ordering = SimpleItem::where('type',$request->type)->where('page_id',$request->page_id)->max('ordering') + 1;


        return view('backend.atom.simple-items.create',compact('ordering')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkHasPage($request) ;

//        dd($request->all());

        $validator = ['title.'.config('app.fallback_locale') => 'required',] ;

        if(in_object('images', 'simple-items.'.request()->get('type').'.labels'))
        {
            $validator['images'] = 'required' ;
            $validator['images.*'] = 'image|mimes:jpg,png,jpeg,svg' ;
            $validator['title.'.config('app.fallback_locale')] = 'nullable' ;

        }

        $this->validate($request,$validator) ;



        $simpleItem = new SimpleItem() ;

        $itemID = SimpleItem::where('type',$request->type)->where('page_id',$request->page_id)->max('ordering') + 1;

        $this->multiLanguageFieldsCreator($request,$simpleItem);

        $simpleItem->item_id = $itemID ;
        $simpleItem->model   = $request->model ;
        $simpleItem->page_id = $request->page_id;
        $simpleItem->type    = $request->type ;
        $simpleItem->ordering = $request->ordering ;
        $simpleItem->status = $request->status ?? 0 ;
        $simpleItem->text = $request->text ;
        $simpleItem->A = $request->A ;
        $simpleItem->B = $request->B ;
        $simpleItem->C = $request->C ;
        $simpleItem->uniq_id = $request->type == 'gallery' ? $request->uniq_id : null  ;
        $simpleItem->date =    Carbon::parse($request->date) ;


        if($request->hasFile('file')){

            $simpleItem->addMedia($request->file)
                ->setFileName($request->file->hashName())
                ->usingFileName($request->file->hashName())
                ->toMediaCollection($this->type);
        }

        if($request->hasFile('image')){

            $simpleItem->addMedia($request->image)
                ->setFileName($request->image->hashName())
                ->usingFileName($request->image->hashName())
                ->toMediaCollection($this->type);
        }



        if(in_object('images', 'simple-items.'.request()->get('type').'.labels')) {

            $this->storeImages($request) ;     //Yalnız şəkillərin yüklənməsi multiple
        }
        else
        {
            $simpleItem->save();
        }

        $appends = [
            'model'        => request()->get('model'),
            'page_id'      => request()->get('page_id'),
            'type'         => request()->get('type'),
            'on_iframe'    => request()->get('on_iframe'),
            'uniq_id'    => request()->get('uniq_id'),
        ] ;

        return redirect()->route('simple-item.index',$appends)->with('success','Əlavə edildi !') ;


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
    public function edit(Request $request, $id)
    {
        $this->checkHasPage($request) ;
        $item = SimpleItem::findOrFail($id) ;


        return view('backend.atom.simple-items.edit',compact('item')) ;
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
        $this->checkHasPage($request) ;

        $validator = ['title.'.config('app.fallback_locale') => 'required',] ;

        if(in_object('images', 'simple-items.'.request()->get('type').'.labels'))
        {
            $validator['image'] = 'required' ;
            $validator['image'] = 'image|mimes:jpg,png,jpeg,svg' ;
            $validator['title.'.config('app.fallback_locale')] = 'nullable' ;

        }

        $this->validate($request,$validator) ;


        $simpleItem = SimpleItem::findOrFail($id);



        $this->multiLanguageFieldsCreator($request,$simpleItem);

        $simpleItem->ordering = $request->ordering ;
        $simpleItem->status = $request->status ?? 0 ;
        $simpleItem->text = $request->text ;
        $simpleItem->A = $request->A ;
        $simpleItem->B = $request->B ;
        $simpleItem->C = $request->C ;
        $simpleItem->uniq_id = request()->get('type') == 'gallery' ? $request->uniq_id : null  ;
        $simpleItem->date =    Carbon::parse($request->date) ;

        if($request->hasFile('file')){

            foreach ($simpleItem->getMedia($simpleItem->type) as $media)
            {
                if(!is_null($media) && !str_contains($media->mime_type,'image'))
                {
                    $deleteOldMedia = Media::where('id',$media->id)->first() ;
                    $deleteOldMedia->delete() ;
                }
            }

            $simpleItem->addMedia($request->file)
                ->setFileName($request->file->hashName())
                ->usingFileName($request->file->hashName())
                ->toMediaCollection($this->type);
        }

        if($request->hasFile('image')){

            foreach ($simpleItem->getMedia($simpleItem->type) as $media)
            {
                if(!is_null($media) && str_contains($media->mime_type,'image'))
                {
                    $deleteOldMedia = Media::where('id',$media->id)->first() ;
                    $deleteOldMedia->delete() ;
                }
            }

            $simpleItem->addMedia($request->image)
                ->setFileName($request->image->hashName())
                ->usingFileName($request->image->hashName())
                ->toMediaCollection($this->type);
        }


        $simpleItem->update() ;


        $appends = [
            'model'        => request()->get('model'),
            'page_id'      => request()->get('page_id'),
            'type'         => request()->get('type'),
            'on_iframe'    => request()->get('on_iframe'),
            'uniq_id'    => request()->get('uniq_id'),
        ] ;

        return redirect()->route('simple-item.index',$appends)->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $this->checkHasPage($request) ;

        $simpleItem= SimpleItem::findOrFail($id);
        $simpleItem->delete() ;

        $appends = [
            'model'        => request()->get('model'),
            'page_id'      => request()->get('page_id'),
            'type'         => request()->get('type'),
            'on_iframe'    => request()->get('on_iframe'),
            'uniq_id'    =>   request()->get('uniq_id'),
        ] ;

        return redirect()->route('simple-item.index',$appends)->with('success','Silindi !') ;
    }

    /**
     * @param Request $request
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     *
     *
     * Yalnız Şəkillər yükləmək üçün (başqa bir field  olmadan)
     */

    public function storeImages(Request $request)
    {
        if($request->hasFile('images')){

            foreach ($request->images as $img)
            {
                $itemID = SimpleItem::where('type',$request->type)->where('page_id',$request->page_id)->max('ordering') + 1;

                $simpleItem = new SimpleItem() ;
                $simpleItem->item_id = $itemID ;
                $simpleItem->ordering = $itemID ;
                $simpleItem->model   = $request->model ;
                $simpleItem->page_id = $request->page_id;
                $simpleItem->type    = $request->type ;
                $simpleItem->uniq_id    = $request->uniq_id ?? null ;

                $simpleItem->addMedia($img)
                    ->setFileName($img->hashName())
                    ->usingFileName($img->hashName())
                    ->toMediaCollection($this->type);

                $simpleItem->save();
            }

        }
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * WORK WITH JSON FILE
     */

    public function index_json() {
        $items = config_json('simple-items');

        return  view('backend.atom.simple-items.index-json',compact('items')) ;
    }


    public function json_create()
    {
        return  view('backend.atom.simple-items.create-json') ;

    }

    public function json_store(Request $request) {
        $this->validate($request,[
            'title' => 'required',
            'name' => 'required',
        ]);

        $label = [] ;

        if (count($request->label))
        {
            foreach($request->label as $key =>  $value)
            {
                $label[$key] = $value ;
            }
        }

        $tempalte = [
            "name"               => $request->title,
            "labels"             => array_filter($label)

        ] ;
        if (!count($label)) unset($tempalte['labels']) ;


        config_json_add('simple-items',$request->name,$tempalte);

        return redirect()->route('simple-json.index')->with('success','Əlavə edildi  !') ;

    }

    public function json_edit($id)
    {
        $template = config_json('simple-items.'.$id);
        $temp_name = $id ;
        return  view('backend.atom.simple-items.edit-json',compact('template','temp_name')) ;
    }

    public function json_update(Request $request , $id)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        $label = [] ;

        if (count($request->label))
        {
            foreach($request->label as $key =>  $value)
            {
                $label[$key] = $value ;
            }
        }

        $tempalte = [
            "name"               => $request->title,
            "labels"             => array_filter($label)

        ] ;
        if (!count($label)) unset($tempalte['labels']) ;


        config_json_add('simple-items',$id,$tempalte);

        return redirect()->route('simple-json.index')->with('success','Dəyişdirildi !') ;
    }

    public function json_destroy($id)
    {


//        $simpleItem = SimpleItem::where('type',$id)->get();
//        foreach ($simpleItem as $sp)
//        {
//            $sp->delete() ;
//        }

        config_json_delete('simple-items',$id) ;



        return redirect()->route('simple-json.index')->with('success','Silindi !') ;
    }
}

<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Atom\Page;
use App\Rules\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $page = Page::whereNull('parent_id')->orderBy('ordering')->paginate20();

        return view('backend.atom.pages.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::orderBy('id')->get();

        return view('backend.atom.pages.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {



        $this->validate($request,[
           'title.'.config('app.fallback_locale') => ['required',new Slug($request)],
           'template'                                 => 'required'
        ]);


        $page =new Page() ;

        $order = Page::where('parent_id',$request->parent_id)->max('ordering') + 1 ;



        $this->multiLanguageFieldsCreator($request,$page);


       $page->slug      =  Str::slug($request->title[config('app.fallback_locale')]);
       $page->template  = $request->template ;
       $page->parent_id = $request->parent_id ;
       $page->ordering  = $order ;
       $page->status    = $request->status ;
       $page->article_type    = $request->article_type ?? null ;

       $page->save();


        return  redirect()->route('page.edit',$page->id)->with('success','Əlavə edildi !') ;



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
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $pages = Page::orderBy('ordering')->where('id','<>',$id)->get();
        return view('backend.atom.pages.edit',compact('pages','page'));
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

        $page = Page::findOrFail($id);

        $this->validate($request,[
            'title.'.config('app.fallback_locale') => ['required',new Slug($request,$id)],
            'template'                                 => 'required',
//            'image'                                    => ['sometimes','image','file','max:1024','mimes:jpg,bmp,png,jpeg,svg'],
            'icon'                                    => ['sometimes','image','file','max:1024','mimes:jpg,bmp,png,jpeg,svg']
        ]);

        if ($request->hasFile('image'))
        {
            $oldImage = $page->image ;
            $page->image   =    $request->file('image')->hashName();
            $request->image->storeAs('pages', $page->image, 'public' );

            if( !is_null($oldImage) && file_exists(public_path('storage/pages/' . $oldImage)))
            {
                unlink(public_path('storage/pages/' . $oldImage));
            }

        }

        if ($request->hasFile('icon'))
        {
            $oldIcon = $page->icon ;
            $page->icon   =    $request->file('icon')->hashName();
            $request->icon->storeAs('pages', $page->icon, 'public' );

            if(!is_null($oldIcon) && file_exists(public_path('storage/pages/' . $oldIcon)))
            {
                unlink(public_path('storage/pages/' . $oldIcon));
            }

        }



        $this->multiLanguageFieldsCreator($request,$page);
        $page->slug                  = Str::slug($request->slug ?? $request->title[config('app.fallback_locale')]);
        $page->template              = $request->template ;
        $page->parent_id             = $request->parent_id ;
        $page->ordering              = $request->ordering ;
        $page->status                = $request->status ;
        $page->visible_in_sidebar    = $request->visible_in_sidebar == 1 ? 1 : null ;
        $page->child_visible_in_sidebar    = $request->child_visible_in_sidebar == 1 ? 1 : 0 ;
        $page->url                  = Helper::linkGenerator($page) ;
        $page->article_type    = $request->article_type ?? null ;


        $page->update();


        return redirect()->route('page.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $page = Page::findOrFail($id);
        if (Storage::exists('pages/'. $page->image))
        {
            Storage::delete('pages/'. $page->image);
        }
        $page->delete() ;


        return redirect()->route('page.index')->with('success','Silindi !') ;
    }







}

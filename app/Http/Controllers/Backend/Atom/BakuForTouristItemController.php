<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;

use App\Models\BakuItem;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class BakuForTouristItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = BakuItem::orderBy('id','DESC')->where("baku_for_tourist_id",$request->type)->paginate20() ;

        return view('backend.atom.baku-for-tourist-item.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.atom.baku-for-tourist-item.create') ;
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
            'title' => 'required|array',
            'title.az' => 'required|string',
            'order' => 'required',

//            'answers.az.0' => 'required|string',
//            'answers.az.1' => 'required|string',
        ]);



        $surveyQuestion = new BakuItem() ;

        $this->multiLanguageFieldsCreator($request,$surveyQuestion);

        $surveyQuestion->status = $request->status ?? 1 ;

        $surveyQuestion->baku_for_tourist_id = $request->query('type') ;
        $surveyQuestion->ordering = $request->order ;






        if ($request->hasFile('image'))
        {
            $hashName = $request->file('image')->hashName() ;
            $surveyQuestion->image   =   '/storage/articles/baku-for-tourist-item/' . $request->file('image')->hashName();
            $request->image->storeAs('articles/baku-for-tourist-item', $hashName, 'public' );
        }



        $surveyQuestion->save() ;

        return redirect()->route('baku-for-tourist-item.index',['type'=>$request->query('type') ])->with('success','Əlavə edildi !') ;
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

        $item = BakuItem::findOrFail($id) ;

        return view('backend.atom.baku-for-tourist-item.edit',compact('item')) ;

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

        $this->validate($request,[
            'title' => 'required|array',
            'title.az' => 'required|string',
            'order'=>'required'
        ]);






        $surveyQuestion = BakuItem::findOrFail($id) ;



        if ($request->hasFile('image'))
        {
            if(file_exists(public_path($surveyQuestion->image))){
                unlink(public_path($surveyQuestion->image));
            }
            $hashName = $request->file('image')->hashName() ;
            $surveyQuestion->image   =   '/storage/articles/baku-for-tourist-item/' . $request->file('image')->hashName();
            $request->image->storeAs('articles/baku-for-tourist-item', $hashName, 'public' );
        }



        $this->multiLanguageFieldsCreator($request,$surveyQuestion);

        $surveyQuestion->status = $request->status ?? 1 ;
        $surveyQuestion->ordering = $request->order ?? 1 ;

        $surveyQuestion->update() ;


        return redirect()->route('baku-for-tourist-item.index',['type'=>$request->query('type') ])->with('success','Dəyişdirildi !') ;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=BakuItem::find($id);
        if(file_exists(public_path($item->image))){
            unlink(public_path($item->image));
        }

        $item->delete();
        return redirect()->route('baku-for-tourist-item.index',['type'=>request()->query('type') ])->with('success','Silindi !') ;

    }
}

<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\BakuForTourist;
use Illuminate\Http\Request;

class BakuForTouristController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BakuForTourist::orderBy('id','DESC')->get() ;


        return view('backend.atom.baku-for-tourist.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.atom.baku-for-tourist.create') ;
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
            "order"=>"required"
        ]);

        $bakufortourist = new BakuForTourist() ;

        $this->multiLanguageFieldsCreator($request,$bakufortourist);
        $bakufortourist->status = $request->status ?? 1 ;
        $bakufortourist->ordering = $request->order ;

        $bakufortourist->save() ;

        return redirect()->route('baku-for-tourist.index')->with('success','Əlavə edildi !') ;
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
        $item = BakuForTourist::findOrFail($id) ;

        return view('backend.atom.baku-for-tourist.edit',compact('item')) ;
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

        $surveySubject =  BakuForTourist::findOrFail($id) ;

        $this->multiLanguageFieldsCreator($request,$surveySubject);
        $surveySubject->status = $request->status ?? 1 ;
        $surveySubject->ordering = $request->order ?? 1 ;



        $surveySubject->update() ;


        return redirect()->route('baku-for-tourist.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bakufortourist=BakuForTourist::find($id);








        $bakufortourist->delete() ;

        $appends = [
            'type'         => request()->get('type'),
            'category'     => request()->get('category')

        ];

        return redirect()->route('baku-for-tourist.index',$appends)->with('success','Silindi !') ;

    }
}

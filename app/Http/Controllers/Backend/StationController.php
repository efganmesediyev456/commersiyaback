<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Station::all() ;

        return  view('backend.atom.stations.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.atom.stations.create') ;
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
            'title' => 'array',
            'title.az' => 'string',
            'color' => 'required|string',
            'distance' => 'numeric',
            'time' => 'numeric',
            'before' => 'nullable|string',
            'after' => 'nullable|string',
            'formal_id' => 'string'
        ]);

        $station = new Station();

        $this->multiLanguageFieldsCreator($request,$station);
        $station->distance = $request->distance ;
        $station->time = $request->time;
        $station->before = $request->before;
        $station->after = $request->after;
        $station->formal_id  = $request->formal_id ;
        $station->color  = $request->color ;


        $station->save();


        return redirect()->route('stations.index')->with('success','Əlavə edildi !') ;
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
        $item = Station::findOrFail($id);

        return  view('backend.atom.stations.edit',compact('item'));
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
            'title' => 'array',
            'title.az' => 'string',
//            'color' => 'required|string',
            'distance' => 'numeric',
            'time' => 'numeric',
//            'before' => 'nullable|string',
//            'after' => 'nullable|string',
//            'formal_id' => 'string'
        ]);

        $station = Station::findOrFail($id);

        $this->multiLanguageFieldsCreator($request,$station);
        $station->distance = $request->distance ;
        $station->time = $request->time;
//        $station->before = $request->before;
//        $station->after = $request->after;
//        $station->formal_id  = $request->formal_id ;
//        $station->color  = $request->color ;


        $station->update();


        return redirect()->route('stations.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Station::destroy($id);

        return redirect()->route('stations.index')->with('success','Silindi !') ;
    }
}

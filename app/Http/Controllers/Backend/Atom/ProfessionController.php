<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Position;
use App\Models\Atom\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Profession::orderBy('id','DESC')->paginate20() ;

        return view('backend.atom.professions.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all() ;

        return view('backend.atom.professions.create',compact('positions')) ;
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

        ]);

        $profession = new Profession() ;

        $this->multiLanguageFieldsCreator($request,$profession);
        $profession->position_id = $request->parent_id  ;
        $profession->status = $request->status ?? 1 ;
        $profession->ordering = $request->ordering ?? 1 ;


        $profession->save() ;

        return redirect()->route('profession.index')->with('success','Əlavə edildi !') ;
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
        $item = Profession::findOrFail($id) ;
        $positions = Position::all() ;

        return view('backend.atom.professions.edit',compact('item','positions')) ;
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

        ]);

        $profession =  Profession::findOrFail($id) ;

        $this->multiLanguageFieldsCreator($request,$profession);
        $profession->position_id = $request->parent_id  ;
        $profession->status = $request->status ?? 1 ;
        $profession->ordering = $request->ordering ?? 1 ;

        $profession->update() ;

        return redirect()->route('profession.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profession = Profession::findOrFail($id);


        $profession->delete() ;

        return redirect()->route('profession.index')->with('success','Silindi !') ;
    }
}

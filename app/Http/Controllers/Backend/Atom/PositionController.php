<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Position::orderBy('id','DESC')->paginate20() ;

        return view('backend.atom.positions.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('backend.atom.positions.create') ;
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

        ]);

        $position = new Position() ;

        $this->multiLanguageFieldsCreator($request,$position);
        $position->status = $request->status ?? 1 ;
        $position->ordering = $request->ordering ?? 1 ;


        if ($request->hasFile('icon'))
        {
            $hashName = $request->file('icon')->hashName() ;
            $position->icon   =   '/storage/vacancy/' . $hashName;
            $request->icon->storeAs('vacancy', $hashName, 'public' );
        }

        $position->save() ;

        return redirect()->route('position.index')->with('success','Əlavə edildi !') ;
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
        $item = Position::findOrFail($id) ;


        return view('backend.atom.positions.edit',compact('item')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $position =  Position::findOrFail($id) ;


        $this->multiLanguageFieldsCreator($request,$position);
        $position->status = $request->status ?? 1 ;
        $position->ordering = $request->ordering ?? 1 ;


        if ($request->hasFile('icon'))
        {
            if( file_exists(public_path($position->icon))  && !is_null($position->icon))
            {
                unlink(public_path($position->icon));
            }


            $hashName = $request->file('icon')->hashName() ;
            $position->icon   =   '/storage/vacancy/' . $hashName;
            $request->icon->storeAs('vacancy', $hashName, 'public' );

        }

        $position->update() ;


        return redirect()->route('position.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);


        if( file_exists(public_path($position->icon))  && !is_null($position->icon))
        {
            unlink(public_path($position->icon));
        }


        $position->delete() ;

        return redirect()->route('position.index')->with('success','Silindi !') ;
    }
}

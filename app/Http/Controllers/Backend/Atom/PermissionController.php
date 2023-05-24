<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Permission::all() ;
        return  view('backend.atom.permissions.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.atom.permissions.create') ;
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
            'title' => 'required',
            'model' => 'required' ,
        ]);


        $permissions = new Permission() ;
        $permissions->create($request->all()) ;

        return redirect()->route('permission.create')->with('success','Əlavə edildi  !') ;

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
        $item = Permission::findOrFail($id);

        return  view('backend.atom.permissions.edit',compact('item')) ;
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
            'title' => 'required',
            'model' => 'required' ,
        ]);


        $permissions = Permission::findOrFail($id) ;

        $permissions->update([
            'title'       => $request->title ,
            'model'       => $request->model ,
            'description' => $request->description,
             'C'          => $request->C ?? 0,
             'R'          => $request->R ?? 0,
             'U'          => $request->U ?? 0,
             'D'          => $request->D ?? 0,
             'full'       => $request->full ?? 0,
        ]);


        return redirect()->route('permission.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete() ;

        return redirect()->route('permission.index')->with('success','Silindi !') ;
    }
}

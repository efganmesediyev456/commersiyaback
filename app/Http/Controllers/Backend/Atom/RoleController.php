<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Permission;
use App\Models\Atom\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Role::all();

        return  view('backend.atom.role.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('model')->get() ;

        return  view('backend.atom.role.create',compact('permissions')) ;
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
        ]);


        $role = new Role() ;

        $role->title = $request->title;
        $role->description = $request->description;

        $role->save() ;

        $role->permissions()->sync($request->permissions);

        return redirect()->route('role.index')->with('success','Əlavə edildi !') ;
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
        $item = Role::findOrFail($id);
        $currentPermissions = $item->permissions->pluck('id')->toArray() ;
        $permissions = Permission::orderBy('model')->get() ;

        return  view('backend.atom.role.edit',compact('item','permissions','currentPermissions')) ;
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
        ]);


        $role = Role::findOrFail($id) ;

        $role->update([
            'title'       => $request->title ,
            'description' => $request->description,

        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('role.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $role = Role::findOrFail($id) ;
            $role->delete() ;

            return redirect()->route('role.index')->with('success','Silindi !') ;
        }
    }
}

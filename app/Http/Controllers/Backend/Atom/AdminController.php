<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;

use App\Models\Atom\Admin;
use App\Models\Atom\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Admin::all() ;
        return  view('backend.atom.admins.index' , compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all() ;

        return  view('backend.atom.admins.create' , compact('roles')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'password' => 'required',
        ]);

        $admin = new Admin() ;

        $request['password'] = Hash::make($request->password);

        $admin->create($request->all());

        return redirect('/admin/admin-users')->with('success','Əlavə edildi  !') ;

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
        $roles = Role::all() ;
        $item  = Admin::findOrFail($id);
        return  view('backend.atom.admins.edit' , compact('roles','item')) ;
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
//        dd($request->all());

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
        ]);

        $admin = Admin::findOrFail($id) ;

        $request['password'] = $request->password ? Hash::make($request->password) : $admin->password;

        $admin->update($request->all());

         return redirect('/admin/admin-users')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id) ;
        $admin->delete() ;

        return redirect('/admin/admin-users')->with('success','Silindi !') ;
    }
}

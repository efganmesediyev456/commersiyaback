<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         // $items = Contact::orderBy('id','DESC')->paginate20() ;
         $items = Contact::query() ;

          if($request->name){
            $items->where("name","like","%".$request->name."%");
         }
         if($request->organization_name){
            $items->where("organization_name","like","%".$request->organization_name."%");
         }
          if($request->lastname){
            $items->where("lastname","like","%".$request->lastname."%");
         } 
         if($request->country){
            $items->where("country","like","%".$request->country."%");
         }  
         if($request->city){
            $items->where("city","like","%".$request->city."%");
         } 
         if($request->address){
            $items->where("address","like","%".$request->address."%");
         }
         if($request->type){
            $items->where("type",$request->type);
         }
         if($request->phone){
            $items->where("phone","like","%".$request->phone."%");
         }
         if($request->internal_phone){
            $items->where("internal_phone","like","%".$request->internal_phone."%");
         }
         if($request->email){
            $items->where("email","like","%".$request->email."%");
         }
         if($request->description){
            $items->where("description","like","%".$request->description."%");
         }
         $items=$items->orderBy('id','DESC')->paginate20();

        return view('backend.atom.contact.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::find($id);
        $contact->delete();
        return redirect()->back()->withSuccess("Ugurla silindi");
    }
}

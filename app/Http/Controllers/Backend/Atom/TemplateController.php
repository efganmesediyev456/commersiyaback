<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $items = config_json('templates');

        return  view('backend.atom.templates.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.atom.templates.create') ;
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
           'view' => 'required',
           'model' => 'required',
        ]);


        $label = [] ;
        $simple_items = [] ;

        if (isset($request->label) && count($request->label))
        {
            foreach($request->label as $lb)
            {
                $label[$lb] = true ;
            }
        }

        if (isset($request->simple_items) && count($request->simple_items))
        {
            foreach($request->simple_items as  $si)
            {
                $si = explode('&',$si) ;
                $simple_items[$si[0]] = $si[1] ;
            }
        }


        $tempalte = [
            "type"               => $request->model,
            "name"               => $request->title,
            "view"               => $request->view,
            "pagination_limit"   => $request->pagination_limit ?? null,
            "is_pagination"      => $request->pagination_limit ? true : false ,
            "labels"             => $label,
            "simple_items"       => $simple_items,

        ] ;
        if (!count($label)) unset($tempalte['labels']) ;
        if (!count($simple_items)) unset($tempalte['simple_items']) ;




        config_json_add('templates',Str::slug($request->json_name ?? $request->title),$tempalte);


        return redirect()->route('template.index')->with('success','Əlavə edildi  !') ;



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
        $template = config_json('templates.'.$id);
        $temp_name = $id ;
        return  view('backend.atom.templates.edit',compact('template','temp_name')) ;
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
        $label = [] ;
        $simple_items = [] ;

        if (!is_null($request->label) && count($request->label))
        {
            foreach($request->label as $lb)
            {
                $label[$lb] = true ;
            }
        }


        if (isset($request->simple_items) && count($request->simple_items))
        {
            foreach($request->simple_items as  $si)
            {
                $si = explode('&',$si) ;
                $simple_items[$si[0]] = $si[1] ;
            }
        }


        $tempalte = [
            "type"               => $request->model,
            "name"               => $request->title,
            "view"               => $request->view,
            "pagination_limit"   => $request->pagination_limit ?? null,
            "is_pagination"      => $request->pagination_limit ? true : false,
            "labels"             => $label,
            "simple_items"       => $simple_items,

        ] ;


        if (!count($label)) unset($tempalte['labels']) ;
        if (!count($simple_items)) unset($tempalte['simple_items']) ;

        config_json_add('templates',$id,$tempalte);


        return redirect()->route('template.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        config_json_delete('templates',$id) ;

        return redirect()->route('template.index')->with('success','Silindi !') ;
    }
}

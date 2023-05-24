<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Position;
use App\Models\Atom\Profession;
use App\Models\Atom\Vacancies;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Vacancies::orderBy('id','DESC')->paginate20() ;

        return view('backend.atom.vacancies.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = Profession::all() ;

        return view('backend.atom.vacancies.create',compact('professions')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $this->validate($request,[
//            "profession_id"=>"required"
//        ],[
//            'profession_id.required'=>"profession sahəsi mütləq seçilməlidir"
//        ]);

        $vacancy = new Vacancies() ;

        $this->multiLanguageFieldsCreator($request,$vacancy);
        $vacancy->active =    Carbon::parse($request->active) ;
        $vacancy->status = $request->status ?? 1 ;

        $vacancy->save() ;





        return redirect()->route('vacancy.index')->with('success','Əlavə edildi !') ;
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
        $item = Vacancies::findOrFail($id) ;
        $professions = Profession::all() ;

        return view('backend.atom.vacancies.edit',compact('item','professions')) ;
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

        $vacancy =  Vacancies::findOrFail($id) ;

        $this->multiLanguageFieldsCreator($request,$vacancy);
        $vacancy->active =    Carbon::parse($request->active) ;
        $vacancy->status = $request->status ?? 1 ;

        $vacancy->update() ;

        return redirect()->route('vacancy.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancies::findOrFail($id);


        $vacancy->delete() ;

        return redirect()->route('vacancy.index')->with('success','Silindi !') ;
    }
}

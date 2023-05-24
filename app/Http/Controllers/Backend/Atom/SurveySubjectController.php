<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\SurveySubject;
use Illuminate\Http\Request;

class SurveySubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SurveySubject::orderBy('id','DESC')->paginate20() ;

        return view('backend.atom.survey-subject.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.atom.survey-subject.create') ;
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
        ]);

        $surveySubject = new SurveySubject() ;

        $this->multiLanguageFieldsCreator($request,$surveySubject);
        $surveySubject->status = $request->status ?? 1 ;





        $surveySubject->save() ;

        return redirect()->route('survey-subject.index')->with('success','Əlavə edildi !') ;
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
        $item = SurveySubject::findOrFail($id) ;

        return view('backend.atom.survey-subject.edit',compact('item')) ;
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
        ]);

        $surveySubject =  SurveySubject::findOrFail($id) ;

        $this->multiLanguageFieldsCreator($request,$surveySubject);
        $surveySubject->status = $request->status ?? 1 ;



        $surveySubject->update() ;


        return redirect()->route('survey-subject.index')->with('success','Dəyişdirildi !') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SurveySubject::find($id)->delete();
        return redirect()->back()->withSuccess("Ugurla silindi");
    }
}

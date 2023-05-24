<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = SurveyQuestion::orderBy('id','DESC')->where("survey_subject_id",$request->type)->paginate20() ;

        return view('backend.atom.survey-question.index',compact('items')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.atom.survey-question.create') ;
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
           'title' => 'required|array',
           'title.az' => 'required|string',
           'answers.az.0' => 'required|string',
           'answers.az.1' => 'required|string',
        ]);





        $surveyQuestion = new SurveyQuestion() ;

        $this->multiLanguageFieldsCreator($request,$surveyQuestion);

        $surveyQuestion->status = $request->status ?? 1 ;

        $surveyQuestion->survey_subject_id = $request->query('type') ;




        $surveyQuestion->save() ;

        return redirect()->route('survey-question.index',['type'=>$request->query('type') ])->with('success','Əlavə edildi !') ;
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

        $item = SurveyQuestion::findOrFail($id) ;

        return view('backend.atom.survey-question.edit',compact('item')) ;

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
            'answers.az.0' => 'required|string',
            'answers.az.1' => 'required|string',
        ]);





        $surveyQuestion = SurveyQuestion::findOrFail($id) ;

        $this->multiLanguageFieldsCreator($request,$surveyQuestion);

        $surveyQuestion->status = $request->status ?? 1 ;

        $surveyQuestion->update() ;


        return redirect()->route('survey-question.index')->with('success','Dəyişdirildi !') ;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SurveyQuestion::find($id)->delete();
        return redirect()->back()->withSuccess("Ugurla silindi");
    }
}

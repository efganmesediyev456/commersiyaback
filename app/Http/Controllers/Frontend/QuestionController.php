<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\Page;
use App\Models\Atom\Position;
use App\Models\Atom\Profession;
use App\Models\Atom\Vacancies;
use App\Models\SurveyQuestion;
use App\Models\TranslatorModels\SurveyQuestionTranslation;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\SurveySubject;


class QuestionController extends Controller
{
    public function show($id)
    {




        $post = SurveySubject::findOrFail($id);



        $page = $this->articleParentPage('home') ;

        $breadCrumb = $this->breadCrumb($page,'dddd' . $post->id,0,null,true);





        $breadCrumb[]=(object)[
            'title.az'=>'Sorgular',
            'link'=>''
        ];

        $breadCrumb[] = (object)
        [
            'title.'. config('app.locale') => $post->title,
            'link' => null ,
        ];








//        $sidebar = $this->sideBar($page,[$page->parent->slug],$breadCrumb,0,$post->id);
//        return $sidebar;

//        $otherPosts =$this->otherArticles($id);

        $sidebar=[];
        $otherPosts=[];


        $compact= compact(['post','page','breadCrumb','sidebar','otherPosts']) ;

        return view('frontend.media.sorgu_item',$compact) ;
    }


    protected function articleParentPage($type)
    {
        return Page::where('template',$type)->firstOrFail() ;
    }


    public function voice(Request $request){


        $question= $request->question;
        $anskey=$request->anskey;

//        session()->forget("answers");
        session()->push("answers",$question);

        $question=SurveyQuestionTranslation::where("survey_question_id",$question)->get();



        $voice=$question[0]->voice;
        if($voice==null){
            for($i=0;$i<=5;$i++){
                if($i==$anskey){
                    $voice[$i]=1;
                }else{
                    $voice[$i]=0;
                }
            }

        }else{
            $voice=json_decode($voice,true);

            for($i=0;$i<=5;$i++){
                if($i==$anskey){

                    $voice[$i]=$voice[$i]+1;
                }
            }
        }

        foreach ($question as $que){
            $que->voice=$voice;
            $que->save();
        }

        return $voice;

    }
}

<?php

namespace App\Http\Controllers\Backend\Atom;

use App\Http\Controllers\Controller;
use App\Models\Atom\Article;
use App\Models\Atom\Page;
use App\Models\Atom\Position;
use App\Models\Atom\Profession;
use App\Models\Atom\Vacancies;
use App\Models\BakuForTourist;
use App\Models\BakuItem;
use App\Models\SurveyQuestion;
use App\Models\SurveySubject;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("search") && !empty($request->search)){


            $sehifeler=Page::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%")->
                orWhere("second_title","like","%".$request->search."%")->
                orWhere("description","like","%".$request->search."%")->
                orWhere("subtitle","like","%".$request->search."%");
            })->get();


            $articles=Article::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%")->
                orWhere("description","like","%".$request->search."%")->
                orWhere("subtitle","like","%".$request->search."%");
            })->get();



            $vacancies=Vacancies::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%")->
                orWhere("description","like","%".$request->search."%")->
                orWhere("subtitle","like","%".$request->search."%");
            })->get();


            $professions=Profession::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%")->
                orWhere("description","like","%".$request->search."%")->
                orWhere("subtitle","like","%".$request->search."%");
            })->get();

            $positions=Position::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%")->
                orWhere("subtitle","like","%".$request->search."%");
            })->get();


            $sorgular=SurveySubject::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%");
            })->get();


            $sorgular2=SurveyQuestion::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%")
                    ->orWhere("answers","like","%".$request->search."%");
            })->get();


          $baku_for_tourist=BakuForTourist::whereHas("translations",function($query) use($request){
                $query->where("title","like","%".$request->search."%")
                    ->orWhere("content","like","%".$request->search."%");
            })->get();


          $baku_for_tourist_items=BakuItem::whereHas("translations",function($query) use($request){
                $query->where("about","like","%".$request->search."%")
                    ->orWhere("content_key","like","%".$request->search."%")
                    ->orWhere("content_value","like","%".$request->search."%")->
                    orWhere("title","like","%".$request->search."%");
            })->get();





        }else{
            $sehifeler=[];
            $articles=[];
            $vacancies=[];
            $professions=[];
            $positions=[];
            $sorgular=[];
            $sorgular2=[];
            $baku_for_tourist=[];
            $baku_for_tourist_items=[];
        }



        return view("backend.atom.search.index",compact('sehifeler', 'baku_for_tourist_items','articles','vacancies','professions','positions','sorgular','sorgular2','baku_for_tourist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}

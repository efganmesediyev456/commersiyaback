@section('title', $page->second_title ?? $page->title)
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')


@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="ministry">
        <div class="container-fluid">
            <h1 class="section-title"> {{$page->second_title ?? $page->title}}</h1>
            <div class="row">
                <div class="col-md-3 position-relative">


                    <div class="left-bar">
                        <x-Sidebar.Sidebar :sidebar="$sidebar" />
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="content-block">
                        <div class="content-block__text">

                            <div class="content-block__accordion">
                                @foreach($page->child as $questionPages)
                                        @php
                                            $questions = Cache::remember('question_page_' . $questionPages->id , config('app.cache_time') , fn() => $questionPages->get_simple_items('questions') )
                                        @endphp
                                        @foreach($questions as $question )
                                        <div class="content-block__accordion__item">
                                            <h4 class="content-block__accordion__title" >
                                                {{$question->title}}
                                            </h4>
                                            <div class="text" >
                                                <div class="text-with-border" >
                                                    <p class="mb-0">
                                                        {{$question->medium_text1}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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
                        <x-Sidebar.Sidebar :sidebar="$sidebar" :simple="$simple_item_slug"/>
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="content-block">
                        <div class="content-block__text">
                            <p class="date">{{ $doc->date }}</p>
                            {!! $doc->text_field !!}

                            {{--
                            <div class="read-more">
                                <a href="#">
                                    Qərarın tam mətninə istinad:<br>
                                    Azərbaycan Respublikasının ərazisində xüsusi karantin rejiminin müddətinin uzadılması barədə
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16">
                                    <use xlink:href="#svg-arrow-right"></use>
                                </svg>
                            </div>
                           --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

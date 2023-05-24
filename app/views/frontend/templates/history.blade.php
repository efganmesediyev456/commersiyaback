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
                        <div class="history__slider">
                            @php
                                $history = Cache::remember('history_' . $page->id , config('app.cache_time') , fn() => $page->parent->parent->child )

                            @endphp

                            @foreach($history as $h)
                                <div class="history__slider__item">
                                    <a href="/{{config('app.locale') . '/' . $h->url }} " class="history__block @if($h->slug == $page->parent->slug) active @endif ">
                                        <div class="history__lines">
                                            <span></span><span></span><span></span><span></span><span></span>
                                        </div>
                                        <div class="history__date">{{$h->title}}</div>
                                    </a>
                                </div>
                            @endforeach






                        </div>
                        <div class="history__links">
                            @foreach($page->parent->child as $stations)
                                <a  @if($page->slug == $stations->slug) class="active"  @endif href="/{{config('app.locale') . '/' .$stations->url}}">{{$stations->title}}</a>
                            @endforeach


                        </div>
                        <div class="content-block__text">
                            <img src="{{asset('/storage/pages/' . $page->image)}}" alt="">
                            <ul class="without-dots d-flex justify-content-between flex-wrap">
                                @php
                                    $info = $page->get_simple_items('history_information') ;
                                    $accordions = $page->get_simple_items('history_accordion') ;
                                    $workers = $page->get_simple_items('history_workers') ;
                                @endphp

                                @foreach($info as $i)
                                    <li>
                                        <h2>{{$i->title}}</h2>
                                        {{$i->medium_text1 ?? ''}} km
                                    </li>
                                @endforeach


                            </ul>
                            <div class="content-block__accordion">
                                @foreach($accordions as $about)
                                    <div class="content-block__accordion__item">
                                        <h4 class="content-block__accordion__title">
                                            {{optional($about)->title}}
                                        </h4>
                                        <div class="text" >
                                            <div class="text-with-border">
                                                <p class="mb-0">
                                                    {{optional($about)->medium_text1}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach




                                @if($workers->count())
                                    @foreach($workers as $worker)
                                            <div class="content-block__accordion__item">
                                                <h4 class="content-block__accordion__title">
                                                    Metropolitenin fəxrləri
                                                </h4>
                                                <div class="text">
                                                    <div class="text-with-border">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <img src="{{$worker->image->first()->getFullUrl()}}" alt="">
                                                            </div>
                                                            <div class="col-md-7">
                                                                <ul class="without-dots">
                                                                    <li>
                                                                        <h3 class="h2">Əsgərin adı</h3>
                                                                        {{$worker->title}}
                                                                    </li>
                                                                    <li>
                                                                        <h3 class="h2">Vəzifəsi</h3>
                                                                        {{$worker->subtitle}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h3 class="h2">Haqqında</h3>
                                                        <p>
                                                            {!! $worker->text_field !!}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                    @endforeach
                                @endif



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

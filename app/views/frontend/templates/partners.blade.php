

@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="partners">
        <div class="container-fluid">
            <h1 class="section-title"> {{$page->second_title ?? $page->title}}</h1>
            <div class="row">
                <div class="col-md-3 position-relative">


                    <div class="left-bar">
                        <x-Sidebar.Sidebar :sidebar="$sidebar"/>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content-block">
                        <div class="row ">
                        @foreach($page->get_simple_items() as $partner)
                                <div class="col-md-6">
                                    <a href="{{ $partner->text }}" class="partners__item">
                                        <div class="partners__text">
                                            <span class="partners__title">{{$partner->title}}</span>
                                            <img src="images/partners1.png" alt="">
                                        </div>
                                        @php($title = preg_split('/\//', trim(preg_replace('/http(s):\/\//', '', $partner->text),'/')))
                                        <span class="partners__link">{{$title[0]}}</span>
                                    </a>
                                </div>
                        @endforeach


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>



     @if($search)
    <section class="news-section tab-block">
        <div class="container-fluid position-relative slider-container">
            <div class="tab-links">
                <a href="#" class="title active tab-link" data-tab="tab1">
                    Xəbərlər
                </a>

                @if($actual->count())
                    <a href="#" class="title tab-link" data-tab="tab2">
                        Aktual xəbər
                    </a>
                @endif
                @if($media->count())
                    <a href="#" class="title tab-link" data-tab="tab3">
                        Media
                    </a>
                @endif

            </div>

            <div class="tab-content">
                <div class="tab-content__item active" data-tab="tab1">
                    <div class="row news-section__slider"
                            data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>

                        @foreach($news as $post)
                            <div class="col-md-4">
                                <a href="{{ route('article',[$post->type,$post->id,$post->slug]) }}"
                                        class="administration__item">
                                    <div class="administration__image">
                                        <img src="{{ config('app.url') . $post->image}}"
                                                alt="{{ mb_strimwidth($post->title,0,90,'...') }}">
                                    </div>
                                    <div class="administration__text">
                                        <span class="administration__date"> {{ $post->date }}</span>
                                        <span class="administration__title"
                                                style="height: 48px">{{ mb_strimwidth($post->title,0,52,'...') }}</span>
                                        <span class="administration__position"
                                                style="height: 40px">{{ mb_strimwidth($post->subtitle,0,100,'...') }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach


                    </div>
                </div>
                @if($actual->count())
                    <div class="tab-content__item" data-tab="tab2">
                        <div class="row news-section__slider"
                                data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>


                            @foreach($actual as $post)
                                <div class="col-md-4">
                                    <a href="{{ route('article',[$post->type,$post->id,$post->slug]) }}"
                                            class="administration__item">
                                        <div class="administration__image">
                                            <img src="{{ config('app.url') . $post->image}}"
                                                    alt="{{ mb_strimwidth($post->title,0,90,'...') }}">
                                        </div>
                                        <div class="administration__text">
                                            <span class="administration__date"> {{ $post->date }}</span>
                                            <span class="administration__title"
                                                    style="height: 48px">{{ mb_strimwidth($post->title,0,52,'...') }}</span>
                                            <span class="administration__position"
                                                    style="height: 40px">{{ mb_strimwidth($post->subtitle,0,100,'...') }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                @endif

                @if($media->count())
                    <div class="tab-content__item" data-tab="tab3">
                        <div class="row news-section__slider"
                                data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>


                            @foreach($media as $post)
                                <div class="col-md-4">
                                    <a href="{{ route('article',[$post->type,$post->id,$post->slug]) }}"
                                            class="administration__item">
                                        <div class="administration__image">
                                            @if($post->type === 'videogallery')
                                                @php(preg_match('/watch\?v=(.*)/', $post->iframe, $link))
                                                @php($image = 'https://i3.ytimg.com/vi/' . ($link[1] ?? '') . '/maxresdefault.jpg' )
                                                <img src="{{ $post->image ?? $image }}"
                                                        alt="{{ mb_strimwidth($post->title,0,90,'...') }}">
                                            @else
                                                <img src="{{ config('app.url') . $post->image}}"
                                                        alt="{{ mb_strimwidth($post->title,0,90,'...') }}">
                                            @endif
                                        </div>
                                        <div class="administration__text">
                                            <span class="administration__date"> {{ $post->date }}</span>
                                            <span class="administration__title"
                                                    style="height: 48px">{{ mb_strimwidth($post->title,0,52,'...') }}</span>
                                            @if($post->subtitle)
                                                <span class="administration__position"
                                                        style="height: 40px">{{ mb_strimwidth($post->subtitle,0,100,'...') }}</span>
                                            @endif

                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif


            </div>
        </div>
    </section>
    @endif
@endsection

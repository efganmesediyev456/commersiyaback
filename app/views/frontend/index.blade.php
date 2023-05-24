@extends('frontend.layouts.default')

@push('css')
    <style>
        .main-links__item img {
            margin-right: 2rem;
            width: 28px;
            height: 28px;
            object-fit: contain;
        }
    </style>
@endpush

@section('content')
    <!-- Banner -->
    <section class="banner">
        <div class="banner__image">
            @php
                $cover = explode('.',settings('cover'));
                $ext = end($cover);
            @endphp
            @if(in_array($ext,['jpg','jpeg','svg','png','gif']))
                <img src="{{config('app.url') .'/storage/' . settings('cover') }}" alt="">
            @else
                <video playsinline loop muted autoplay src="{{config('app.url') .'/storage/' . settings('cover') }}"></video>
            @endif
        </div>
        <div class="banner__filter filter">
            <div class="container-fluid">
                <h1 class="banner__title">
                    Marşrut istiqamətiniz seçin
                </h1>
                <div class="filter__row d-none d-md-flex">
                    <div class="filter__item">
                        <select>
                            <option value="0">Gediş stansiyası</option>
                            <option value="0">Test</option>
                            <option value="0">Test</option>
                        </select>
                    </div>
                    <div class="filter__item">
                        <select>
                            <option value="0">Gəliş stansiyası</option>
                            <option value="0">Test</option>
                            <option value="0">Test</option>
                        </select>
                    </div>
                    <div class="filter__item">
                        <button class="filter__btn">
                            Nəticəni göstər
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                    <use xlink:href="#svg-arrow-right"></use>
                                </svg>
                            </span>
                        </button>

                    </div>
                </div>

                <a href="#" class="filter__btn d-md-none">
                    Marşrut istiqaməti
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                            <use xlink:href="#svg-arrow-right"></use>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
    <!-- End Banner -->

    <!-- Links -->
    <section class="main-links">
        <h2 class="title d-md-none">Əsas keçidlər</h2>
        <div class="row g-0 main-links__row">
            @foreach($topLinks as $link)
                @switch($loop->iteration)
                    @case(1)
                    @php($color = "filter__btn--green")
                    @break

                    @case(2)
                    @php($color = "filter__btn--yellow")
                    @break

                    @case(3)
                    @php($color = "filter__btn--blue")
                    @break

                    @default
                    @php($color = "filter__btn--red")
                @endswitch

                <div class="col-md-3">
                    <a href="{{$link->link}}" class="filter__btn {{$color}}">
                        {!! preg_replace("/[\\\]/", '<br>', $link->title )    !!}

                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                            <use xlink:href="#svg-arrow-right"></use>
                        </svg>
                    </span>
                    </a>
                </div>


            @endforeach


        </div>
        <div class="main-links__bottom">
            <div class="container-fluid">
                <div class="row g-0 align-items-center">
                    @foreach($bottomLinks as $link)
                        <div class="col-md-6">
                            <a href="{{$link->link}}" class="main-links__item">

                                <img src="{{  optional($link->image)->first()->getFullUrl() }}" alt="">
                                <span>
                                    {!! preg_replace('/\[b\](.*)\[\/b\]/', '<strong>$1</strong>', $link->title); !!}
                            </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                    <use xlink:href="#svg-arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- End Links -->

    <!-- News section -->
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
    <!-- End News section -->

    <!-- Participation -->
    <section class="participation">
        <div class="container-fluid">
            <div class="row">
                @foreach($banner as $b)
                    <div class="col-md-6">
                        <a href="{{$b->link}}" class="administration__item">
                            <div class="administration__text">
                                <span class="administration__title">{{$b->title}}</span>
                                <span class="administration__position">{{$b->medium_text1}}</span>
                                <span class="administration__link">
                                {{$b->medium_text2}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17">
                                    <use xlink:href="#svg-arrow-right"></use>
                                </svg>
                            </span>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- End Participation -->

    <!-- Socials section -->
    <section class="socials tab-block">
        <div class="container-fluid position-relative slider-container">
            <div class="tab-links">
                @if($instagram->count())
                    <a href="#" class="title active tab-link" data-tab="tab1">
                        Instagram
                    </a>
                @endif

                @if($facebook->count())
                    <a href="#" class="title tab-link" data-tab="tab2">
                        Facebook
                    </a>
                @endif

                @if($twitter->count())
                    <a href="#" class="title tab-link" data-tab="tab3">
                        Twitter
                    </a>
                @endif

            </div>

            <div class="tab-content">
                @if($instagram->count())
                    <div class="tab-content__item active" data-tab="tab1">
                        <div class="row services-section__slider"
                             data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>


                            @foreach($instagram as $i)
                                <div class="col-md-3 five-items">
                                    <a href="{{ route('article',[$i->type,$i->id,$i->slug]) }}" class="socials__item">
                                        <div class="socials__image">
                                            <img src="{{ config('app.url') . $i->image}}"
                                                 alt="{{ mb_strimwidth($i->title,0,90,'...') }}">
                                        </div>
                                        <div class="socials__text">
                                        <span class="socials__title">
                                            {{ mb_strimwidth($i->title,0,40,'...') }}
                                        </span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif

                @if($facebook->count())
                    <div class="tab-content__item" data-tab="tab2">
                        <div class="row services-section__slider"
                             data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>

                            @foreach($facebook as $f)
                                <div class="col-md-3 five-items">
                                    <a href="{{ route('article',[$f->type,$f->id,$f->slug]) }}" class="socials__item">
                                        <div class="socials__image">
                                            <img src="{{ config('app.url') . $f->image}}"
                                                 alt="{{ mb_strimwidth($f->title,0,90,'...') }}">
                                        </div>
                                        <div class="socials__text">
                                        <span class="socials__title">
                                            {{ mb_strimwidth($f->title,0,40,'...') }}
                                        </span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                @endif


                @if($twitter->count())
                    <div class="tab-content__item" data-tab="tab3">
                        <div class="row services-section__slider"
                             data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>


                            @foreach($twitter as $t)
                                <div class="col-md-3 five-items">
                                    <a href="{{ route('article',[$t->type,$t->id,$t->slug]) }}" class="socials__item">
                                        <div class="socials__image">
                                            <img src="{{ config('app.url') . $t->image}}"
                                                 alt="{{ mb_strimwidth($t->title,0,90,'...') }}">
                                        </div>
                                        <div class="socials__text">
                                        <span class="socials__title">
                                            {{ mb_strimwidth($t->title,0,40,'...') }}
                                        </span>
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
    <!-- End Socials section -->

    <!-- History section -->
    <section class="history-section">
        <div class="container-fluid">
            <h2 class="title">Metro tarixi</h2>
        </div>
        <div class="history-section__container">
            <div class="row g-0 align-items-center">
                @if(isset($metroHistory[0]))
                    <div class="col-md-4">
                        <a href="{{$metroHistory[0]->link}}" class="history-section__item history-section__item--blue">
                            <div class="history-section__image"><img
                                    src="{{ optional($metroHistory[0])->image->first()->getFullUrl() }}" alt="">
                            </div>
                            <div class="history-section__text">{{$metroHistory[0]->subtitle}}
                            </div>
                        </a>
                    </div>
                @endif
                @if(isset($metroHistory[1]))
                    <div class="col-md-4">
                        <div class="history-section__double-items">
                            <a href="{{$metroHistory[1]->link}}" class="history-section__item">
                                <div class="history-section__image"><img
                                        src="{{ optional($metroHistory[1])->image->first()->getFullUrl() }}"
                                        alt=""></div>
                                <div class="history-section__text">{{$metroHistory[1]->subtitle}}
                                </div>
                            </a>

                            @if(isset($metroHistory[2]))
                                <a href="{{$metroHistory[2]->link}}"
                                   class="history-section__item history-section__item--yellow">
                                    <div class="history-section__image"><img
                                            src="{{ optional($metroHistory[2])->image->first()->getFullUrl() }}"
                                            alt=""></div>
                                    <div class="history-section__text">{{$metroHistory[2]->subtitle}}
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>
                @endif
                @if(isset($metroHistory[3]))
                    <div class="col-md-4">
                        <a href="{{$metroHistory[3]->link}}" class="history-section__item history-section__item--red">
                            <div class="history-section__image"><img
                                    src="{{ optional($metroHistory[3])->image->first()->getFullUrl() }}" alt="">
                            </div>
                            <div class="history-section__text">{{$metroHistory[3]->subtitle}}
                            </div>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- End History section -->

    <!-- İnnovasiya section -->
    <section class="news-section">
        <div class="container-fluid position-relative slider-container">
            <h2 class="title">İnnovasiya şöbəsi</h2>

            <div class="row news-section__slider"
                 data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>


                @foreach($innovative as $post)
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
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- End İnnovasiya section -->

    <!-- Schema section -->
    <section class="schema">
        <div class="schema__image">
            <img src="{{asset('frontend/images/bg-map.png')}}" alt="">
        </div>
        <div class="schema__text">
            <div class="container-fluid">
                <h2 class="title">Metro sxeminə keçid</h2>
                @foreach($metroSchema as $schema)
                    <a href="{{config('app.url') . '/' . config('app.locale') . '/' . $schema->link }}" class="filter__btn filter__btn--green">
                        {{$schema->title}}
                        <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                        <use xlink:href="#svg-arrow-right"></use>
                    </svg>
                </span>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Schema section -->

    <!-- FAQ section -->
    <section class="faq-section tab-block">
        <div class="container-fluid">
            <h2 class="title">Tez-tez verilən suallar</h2>
            <a href="#" class="link faq-section__link">
                Bütün suallar
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17">
                    <use xlink:href="#svg-arrow-right"></use>
                </svg>
            </a>
            <div class="row">
                <div class="col-md-3">
                    <div class="left-bar">
                        <ul>
                            @foreach($questionAll as $question)
                                <li><a class="tab-link @if($loop->iteration === 1 ) active @endif" href="#"
                                       data-tab="tab{{$loop->iteration}}">{{$question->title}}</a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content-block">
                        <div class="content-block__text tab-content">
                            @foreach($questionAll as $question)
                                <div data-tab="tab{{$loop->iteration}}"
                                     class="content-block__accordion tab-content__item @if($loop->iteration === 1 ) active @endif ">

                                    @php(  $questions = Cache::remember('question_home_' . $question->id , config('app.cache_time') , fn() => $question->get_simple_items('questions') ))


                                    @foreach($questions as $q )
                                        <div class="content-block__accordion__item">
                                            <h4 class="content-block__accordion__title">
                                                {{$q->title}}
                                            </h4>
                                            <div class="text">
                                                <div class="text-with-border">
                                                    <p class="mb-0">
                                                        {{$q->medium_text1}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ section -->



    <section class="links-section">
        <div class="container-fluid">
            <div class="row" data-flickity='{ "cellAlign": "left","contain":true, "pageDots": false,"wrapAround":true,"autoPlay":true,"prevNextButtons": false }'>
                @foreach($usefulLinks as $link)
                    <div class="col-2">
                        <a href="{{$link->text}}" class="links-section__item">
                            {!! preg_replace("/[\\\]/", '<br>', $link->title )    !!}
                        </a>
                    </div>
                @endforeach
            </div>





        </div>
    </section>



    <div class="appointment">
        <div class="container-fluid">
            <p>
                {!! preg_replace('/<script>.*<\/script>/', '', setting('apply_slogan_'. config('app.locale')))    !!}
            </p>
            <a href="#" class="btn btn-white btn--small">Qəbula yazılın</a>
        </div>
    </div>
@endsection

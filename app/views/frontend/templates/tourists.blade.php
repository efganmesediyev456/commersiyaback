@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="lines">
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
                        <div class="content-block__text">
                            @php($monument = $page->get_simple_items('monument'))
                            @php($museums = $page->get_simple_items('museums'))
                            @php($mosques = $page->get_simple_items('mosques'))
                            @php($parks = $page->get_simple_items('parks'))
                            @php($sportArena = $page->get_simple_items('sport-arena'))




                            <div class="content-block__accordion">

                                @if($monument->count())
                                    <div class="content-block__accordion__item">
                                        <h4 class="content-block__accordion__title">
                                            Qədimi abidələr
                                        </h4>
                                        <div class="text">
                                            @foreach($monument as $item)
                                                <div class="text-with-border">
                                                    <h2 class="section-title">{{optional($item)->title}}</h2>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="{{optional(optional($item)->image)->first()->getFullUrl() }}" alt="">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <ul class="without-dots">
                                                                <li>
                                                                    <h3 class="h2">Yaxın stansiya</h3>
                                                                    {{optional($item)->subtitle}}
                                                                </li>
                                                                <li>
                                                                    <h3 class="h2">Ünvanı</h3>
                                                                    {{optional($item)->medium_text1}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h3 class="h2">Haqqında</h3>
                                                    <p>{{optional($item)->medium_text2}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if($museums->count())
                                    <div class="content-block__accordion__item">
                                    <h4 class="content-block__accordion__title">
                                        Muzey və teatlar
                                    </h4>
                                    <div class="text">
                                        @foreach($museums as $item)
                                            <div class="text-with-border">
                                                <h2 class="section-title">{{optional($item)->title}}</h2>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <img src="{{optional(optional($item)->image)->first()->getFullUrl() }}" alt="">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <ul class="without-dots">
                                                            <li>
                                                                <h3 class="h2">Yaxın stansiya</h3>
                                                                {{optional($item)->subtitle}}
                                                            </li>
                                                            <li>
                                                                <h3 class="h2">Ünvanı</h3>
                                                                {{optional($item)->medium_text1}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <br>
                                                <h3 class="h2">Haqqında</h3>
                                                <p>{{optional($item)->medium_text2}}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                @if($mosques->count())
                                    <div class="content-block__accordion__item">
                                        <h4 class="content-block__accordion__title ">
                                            Məscidlər
                                        </h4>
                                        <div class="text" >
                                            @foreach($mosques as $item)
                                                <div class="text-with-border">
                                                    <h2 class="section-title">{{optional($item)->title}}</h2>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="{{optional(optional($item)->image)->first()->getFullUrl() }}" alt="">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <ul class="without-dots">
                                                                <li>
                                                                    <h3 class="h2">Yaxın stansiya</h3>
                                                                    {{optional($item)->subtitle}}
                                                                </li>
                                                                <li>
                                                                    <h3 class="h2">Ünvanı</h3>
                                                                    {{optional($item)->medium_text1}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h3 class="h2">Haqqında</h3>
                                                    <p>{{optional($item)->medium_text2}}</p>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endif

                                @if($parks->count())
                                        <div class="content-block__accordion__item">
                                            <h4 class="content-block__accordion__title ">
                                                Parklar
                                            </h4>
                                            <div class="text" >
                                                @foreach($parks as $item)
                                                    <div class="text-with-border">
                                                        <h2 class="section-title">{{optional($item)->title}}</h2>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <img src="{{optional(optional($item)->image)->first()->getFullUrl() }}" alt="">
                                                            </div>
                                                            <div class="col-md-7">
                                                                <ul class="without-dots">
                                                                    <li>
                                                                        <h3 class="h2">Yaxın stansiya</h3>
                                                                        {{optional($item)->subtitle}}
                                                                    </li>
                                                                    <li>
                                                                        <h3 class="h2">Ünvanı</h3>
                                                                        {{optional($item)->medium_text1}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h3 class="h2">Haqqında</h3>
                                                        <p>{{optional($item)->medium_text2}}</p>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endif


                                @if($sportArena->count())
                                        <div class="content-block__accordion__item">
                                            <h4 class="content-block__accordion__title ">
                                                İdman obyektləri
                                            </h4>
                                            <div class="text" >
                                                @foreach($sportArena as $item)
                                                    <div class="text-with-border">
                                                        <h2 class="section-title">{{optional($item)->title}}</h2>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <img src="{{optional(optional($item)->image)->first()->getFullUrl() }}" alt="">
                                                            </div>
                                                            <div class="col-md-7">
                                                                <ul class="without-dots">
                                                                    <li>
                                                                        <h3 class="h2">Yaxın stansiya</h3>
                                                                        {{optional($item)->subtitle}}
                                                                    </li>
                                                                    <li>
                                                                        <h3 class="h2">Ünvanı</h3>
                                                                        {{optional($item)->medium_text1}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h3 class="h2">Haqqında</h3>
                                                        <p>{{optional($item)->medium_text2}}</p>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection

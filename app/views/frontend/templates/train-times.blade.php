@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="passengers">
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
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <h2>İş vaxtı</h2>
                                    <ul>
                                        @foreach($page->get_simple_items('work-time') as $hour)
                                            <li> {{$hour->title}}
                                                <br><br>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6 col-6">
                                    <h2>Gur saatlar</h2>
                                    <ul>
                                        @foreach($page->get_simple_items('busy-hours') as $hour)
                                            <li> {{$hour->title}}
                                                <br><br>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                            <h2>Qatarların “Bakmil” stansiyasına hərəkət cədvəli</h2>
                            <ol>
                                @foreach($page->get_simple_items('to-bakmil') as $station)
                                    <li>
                                        <a href="{{optional($station->getFirstMedia('to-bakmil'))->getFullUrl()}}">{{$station->title}}</a>
                                    </li>
                                @endforeach
                            </ol>
                            <h2>Qatarların “Bakmil” stansiyasının əksinə hərəkət cədvəli</h2>
                            <ol>
                                @foreach($page->get_simple_items('from-bakmil') as $station)
                                    <li>
                                        <a href="{{optional($station->getFirstMedia('from-bakmil'))->getFullUrl()}}">{{$station->title}}</a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection

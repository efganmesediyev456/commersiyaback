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
                        <x-Sidebar.Sidebar :sidebar="$sidebar"/>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content-block">
                        <div class="administration__main">
                            <div class="row">
                                @if($page->image)
                                <div class="col-md-5">
                                    <img src="{{asset('/storage/pages/' . $page->image)}}">
                                </div>
                                @endif
                                <div class="col-md-7">
                                    <div class="administration__title">
                                        Haqqında
                                    </div>
                                    <div class="content-block__text">
                                        {!! $page->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="other-block">
                        <h2>Digər</h2>
                        <div class="content-block">
                            <div class="row">

                                @foreach($otherItems as $others)
                                    <div class="col-md-4 col-6">
                                        <a href="{{link_generator($others)}}" class="administration__item administration__item--two-col">
                                            <div class="administration__image">
                                                <img src="{{asset('/storage/pages/' . $others->image)}}" alt="">
                                            </div>
                                            <div class="administration__text">
                                                <span class="administration__title">{{$others->title}}</span>
                                                <span class="administration__position">{{$others->subtitle}}</span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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
                        <div class="row">
                            @php
                            $sp = Cache::remember('supervisory' , config('app.cache_time') , fn() => $page->child )

                            @endphp

                            @foreach($sp as $supervisor)
                                <div class="col-md-4 col-6">
                                    <a href="{{request()->url() .  '/' . $supervisor->slug}}" class="administration__item administration__item--two-col">
                                        <div class="administration__image">
                                            <img src="{{asset('/storage/pages/' . $supervisor->image)}}" alt="">
                                        </div>
                                        <div class="administration__text">
                                            <span class="administration__title">{{$supervisor->title}}</span>
                                            <span class="administration__position">{{$supervisor->subtitle}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

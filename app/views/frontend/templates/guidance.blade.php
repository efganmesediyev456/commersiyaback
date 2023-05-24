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
                            @if($page->child->count())
                                    @if($page->child->first()->status)
                                        <div class="col-md-8">
                                            <div class="administration__main">
                                                <a href="{{request()->url() .  '/' . $page->child->first()->slug}}" class="administration__main__image">
                                                    <img src="{{asset('/storage/pages/' . $page->child->first()->image)}}" alt="">
                                                </a>
                                                <div class="administration__main__text">
                                                    <a href="#" class="administration__main__text__title">
                                                        {{$page->child->first()->title}}
                                                    </a>
                                                    <p class="administration__main__text__position">
                                                        {{$page->child->first()->subtitle}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                            @endif



                                <div class="col-md-4">
                                    <div class="row">
                                        @foreach($page->child->slice(1) as $child)
                                            @if($child->status)
                                            <div class="col-md-12 col-6">
                                                <a href="{{request()->url() .  '/' . $child->slug}}" class="administration__item administration__item--two-col">
                                                    <div class="administration__image">
                                                        <img src="{{asset('/storage/pages/' . $child->image)}}" alt="">
                                                    </div>
                                                    <div class="administration__text">
                                                        <span class="administration__title">    {{$child->title}}</span>
                                                        <span class="administration__position">     {{$child->subtitle}}</span>
                                                    </div>
                                                </a>
                                            </div>
                                            @endif
                                        @endforeach


                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

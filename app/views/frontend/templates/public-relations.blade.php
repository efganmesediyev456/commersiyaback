@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="contacts">
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
                        <div class="contacts__item">
                            <span>Əlaqə nömrələrİ</span>
                            <ul class="d-flex">
                                @php
                                    $count = 0 ;
                                    $phones = explode(',' , $page->subtitle);
                                    $blockCount = ceil(count($phones) / 2);

                                @endphp

                                @for($i = 1 ; $i <= $blockCount ; $i++)
                                    <li>
                                        @for($count ; $count < $i * 2 ; $count++)
                                            @if(isset($phones[$count]))
                                                <a href="tel:{{$phones[$count]}}">{{$phones[$count]}}</a>
                                            @endif
                                        @endfor
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    @foreach($page->get_simple_items() as $other)

                    @endforeach
                    <div class="other-block">
                        <h2>{{$other->subtitle}}</h2>
                        <div class="content-block">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="w-100" src="{{optional($other->image)->first()->getFullUrl()}}" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="content-block__text">
                                        <h2>{{$other->title}}</h2>
                                        {!! $other->text_field !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

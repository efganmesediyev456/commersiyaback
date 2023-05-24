@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url')  . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')
@push('css')
    <style>

        .content-block__slider img{
            width: 100%;
            height: 100%;
            object-fit: cover;

        }
    </style>
@endpush
@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="administration">
        <div class="container-fluid">
            <h1 class="section-title"> {{$post->second_title ?? $post->title}}</h1>
            <div class="row">
                <div class="col-md-3 position-relative">


                    <div class="left-bar">

                        <x-sidebar.sidebar :sidebar="$sidebar" :template="'vacancies'" />
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="content-block">
                        <div class="content-block__text">




                            <p class="date">{{ $post->date }}</p>
                            {!!  $post->description !!}





                            <div class="read-more">
                                <a href="{{url(config('app.locale') .'/page/karyera/elektron-erize?vacancy=' . $post->id  ) }}">
                                    Müraciət edin
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16">
                                        <use xlink:href="#svg-arrow-right"></use>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="other-block slider-container">
                        <h2>Digər</h2>
                        <div class="content-block">
                            <div class="row news-section__slider"
                                 data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>
                                @if($otherPosts->count())

                                    @foreach($otherPosts as $p)
                                        <div class="col-md-4">
                                            <a href="{{route('professdsion-front.show',[$post->id,$p->id])}}" class="structure-inner__item">

                                                <h2 class="structure-inner__title">{{$p->title}}</h2>
                                                <p class="structure-inner__desc">{{$p->subtitle ?? ''}}</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16">
                                                    <use xlink:href="#svg-arrow-right"></use>
                                                </svg>
                                            </a>
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



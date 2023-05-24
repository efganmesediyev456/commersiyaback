@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url')  . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')
@push('css')
    <style>

        iframe.video{
            width: 100%;
            min-height: 400px;

        }

        @media only screen and (max-width: 576px) {
            iframe.video{

                min-height: 200px;

            }
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
                        <x-sidebar.sidebar :sidebar="$sidebar" :post="$post" />
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="content-block">
                        <div class="content-block__text">



                            <p class="date">{{ $post->date }}</p>


                            @php
                                $query = preg_split('/\?/', $post->iframe);
                                $query = preg_split('/&/', $query[1]);
                                preg_match('/v=(.*)/', $query[0], $link);
                            @endphp


                            @php($image = 'https://i3.ytimg.com/vi/' . ($link[1] ?? '') . '/maxresdefault.jpg' )
                            <iframe class="video mb-4" src="https://www.youtube.com/embed/{{$link[1]}}" title="" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



                                @if($post->link)
                                    <ul class="sosial-list">

                                        <li>
                                            <a href="{{$post->link}}">
                                                @if(str_contains($post->link,'twitter.com'))
                                                    <img src="{{asset('frontend/images/svg-icons/sosial-1.svg')}}" alt="">
                                                @elseif( str_contains($post->link,'facebook.com') )
                                                    <img src="{{asset('frontend/images/svg-icons/sosial-2.svg')}}" alt="">
                                                @elseif( str_contains($post->link,'instagram.com') )
                                                    <img src="{{asset('frontend/images/svg-icons/sosial-5.svg')}}" alt="">
                                                @endif

                                                Posta buradan keçid edə bilərsiniz
                                            </a>
                                        </li>

                                    </ul>
                                @endif



                            <x-Share />

                        </div>
                    </div>

                    <div class="other-block slider-container">
                        <h2>Digər</h2>
                        <div class="content-block">
                            <div class="row news-section__slider"
                                 data-flickity='{ "cellAlign": "left", "contain": true,"pageDots": false,"wrapAround":true }'>
                                <x-Article.Other-articles :posts="$otherPosts" :more="$breadCrumb" />


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



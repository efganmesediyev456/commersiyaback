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
                        <div class="row">


                            @foreach($posts as $post)
                                <div class="col-md-4">
                                    <a href="{{ route('article',[$post->type,$post->id,$post->slug]) }}" class="administration__item ">
                                        <div class="administration__text administration__text--with-icon">
                                            <span class="administration__date">{{ $post->date }}</span>
                                            <span class="administration__title">{{ mb_strimwidth($post->title,0,90,'...') }}</span>
                                            <span class="administration__position">{{ mb_strimwidth($post->subtitle,0,100,'...') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16">
                                                <use xlink:href="#svg-arrow-right"></use>
                                            </svg>
                                        </div>
                                    </a>
                                </div>

                            @endforeach


                        </div>
                        {{$posts->WithQueryString()->links()}}
                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection




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
                                <div class="col-md-6">
                                    <a href="{{ route('article',[$post->type,$post->id,$post->slug]) }}" class="administration__item">
                                        <div class="administration__image">

                                            @if($page->article_type === 'videogallery')
                                                @php(preg_match('/watch\?v=(.*)/', $post->iframe, $link))
                                                @php($image = 'https://i3.ytimg.com/vi/' . ($link[1] ?? '') . '/maxresdefault.jpg' )
                                                <img src="{{ $post->image ?? $image }}" alt="{{ mb_strimwidth($post->title,0,90,'...') }}">
                                            @else
                                                <img src="{{ config('app.url') . $post->image}}" alt="{{ mb_strimwidth($post->title,0,90,'...') }}">
                                            @endif

                                        </div>
                                        <div class="administration__text">
                                            <span class="administration__date">
                                                @if(str_contains($post->link,'twitter.com'))
                                                    <img src="{{asset('frontend/images/svg-icons/sosial-1.svg')}}" alt="">
                                                @elseif( str_contains($post->link,'facebook.com') )
                                                    <img src="{{asset('frontend/images/svg-icons/sosial-2.svg')}}" alt="">
                                                @elseif( str_contains($post->link,'instagram.com') )
                                                    <img src="{{asset('frontend/images/svg-icons/sosial-5.svg')}}" alt="">
                                                @endif

                                                {{ $post->date }}
                                            </span>
                                            <span class="administration__title" style="height: 48px">{{ mb_strimwidth($post->title,0,56,'...') }}</span>
                                            @if($post->subtitle)
                                                <span class="administration__position" style="height: 40px" >{{ mb_strimwidth($post->subtitle,0,100,'...') }}</span>
                                            @endif

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




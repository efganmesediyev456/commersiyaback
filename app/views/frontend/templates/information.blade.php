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


                </div>


                <div class="col-md-9">
                    <div class="content-block">
                        <div class="row ">

                            @foreach($page->child as $p)
                                <div class="col-md-4">
                                    <a href="{{$p->url ? '/' . config('app.locale') . '/' . $p->url : config('app.url') . '/' . config('app.locale') . '/page/' . $page->slug . '/' . $p->slug }}" class="structure-inner__item">
                                        <span class="structure-inner__icon">
                                           @if($p->icon)
                                                <img src="{{asset('/storage/pages/' . $p->icon)}}">
                                            @endif
                                        </span>
                                        <h2 class="structure-inner__title">{{$p->title}}</h2>
                                        <p class="structure-inner__desc">{{$p->subtitle ?? ''}}</p>
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

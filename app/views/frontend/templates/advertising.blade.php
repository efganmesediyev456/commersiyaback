@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="structure-inner">
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
                        <div class="row ">
                            <div class="">

                                {!! $page->description !!}
                            </div>

                            <div class="content-block__text">
                                <h2>Reklam yayımına icazə (razılıq) verilməsi qaydaları</h2>
                                <div class="content-block__accordion">
                                    @foreach($page->get_simple_items() as $item)
                                        <div class="content-block__accordion__item">
                                            <h4 class="content-block__accordion__title ">
                                                {{$item->title}}
                                            </h4>
                                            <div class="text" >
                                                <div class="text-with-border" >
                                                    <p class="mb-0">
                                                        {{$item->medium_text1}}

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
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

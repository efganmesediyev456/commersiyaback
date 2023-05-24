@section('title',  $page->title ?? ($page->second_title ?? '') )
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
                        <div class="content-block__text">
                            @if($page->image)
                                <img src="{{asset('/storage/pages/' . $page->image)}}">
                            @endif

                                @foreach($page->get_simple_items('file') as $files)
                                    <div class="content-block__pdf">
                                        <h2>{{ $files->title }}</h2>
                                        <a href="{{optional($files->getFirstMedia('file'))->getFullUrl()}}" download="{{$files->title}}" class="pdf-file">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18">
                                                <use xlink:href="#svg-pdf"></use>
                                            </svg>
                                            {{optional($files->getFirstMedia('file'))->name}}
                                            <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16">
                                            <use xlink:href="#svg-arrow-download"></use>
                                        </svg>
                                    </span>
                                        </a>
                                    </div>
                                @endforeach



                            <h2>Metropolitendə təhlükəsizlik qaydaları</h2>
                            <div class="content-block__accordion">

                                @foreach($page->get_simple_items('accordions') as $item)
                                    <div class="content-block__accordion__item">
                                        <h4 class="content-block__accordion__title ">
                                            {{$item->title}}
                                        </h4>
                                        <div class="text" >
                                            <div class="text-with-border" >
                                                <p class="mb-0">
                                                    {!! $item->text_field !!}

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
    </section>
@endsection

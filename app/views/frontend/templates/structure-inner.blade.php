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
                    <div class="content-block tab-block">
                        <div class="content-block__text">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="#" data-tab="tab1" class="structure-inner__item tab-link active">
                                        <span class="structure-inner__icon"><img
                                                src="{{asset('frontend/images/svg-icons/main.svg')}}" alt=""></span>
                                        <p class="structure-inner__title">Əsas məlumat</p>
                                    </a>
                                </div>

                                @foreach($page->get_simple_items('file') as $files)

                                    <div class="col-md-4">
                                        <a href="{{optional($files->getFirstMedia('file'))->getFullUrl()}}" class="structure-inner__item">
                                        <span class="structure-inner__icon"><img
                                                src="{{asset('frontend/images/svg-icons/sxem.svg')}}" alt=""></span>
                                            <p class="structure-inner__title">{{ $files->title }}</p>
                                        </a>
                                    </div>
                                @endforeach



                                <div class="col-md-4">
                                    <a href="#" data-tab="tab2" class="structure-inner__item tab-link">
                                        <span class="structure-inner__icon"><img
                                                src="{{asset('frontend/images/svg-icons/diger.svg')}}" alt=""></span>
                                        <p class="structure-inner__title">Digər</p>
                                    </a>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="tab-content__item active" data-tab="tab1">
                                    {!! $page->description !!}

                                </div>

                                <div class="tab-content__item" data-tab="tab2">
                                    @if($page->get_simple_items('structure-areas')->count())
                                        <h2>Sahələr</h2>
                                        @foreach($page->get_simple_items('structure-areas') as $area)
                                            <a class="content-block__link"
                                               href="{{$area->link ?? '#'}}">{{$area->title}}</a>
                                        @endforeach
                                    @endif





                                    @if($page->get_simple_items('structure-actions')->count())

                                        @foreach($page->get_simple_items('structure-actions') as $action)
                                            <h2>{{$action->title}}</h2>
                                            {!! $action->text_field !!}
                                        @endforeach
                                    @endif


                                    @if($page->get_simple_items('structure-guidance')->count())
                                        <div class="row">
                                            <h2>Rəhbərlik</h2>
                                            @foreach($page->get_simple_items('structure-guidance') as $guidance)
                                                <div class="col-md-4 col-6">
                                                    <a href="#"
                                                       class="administration__item administration__item--two-col">
                                                        <div class="administration__image">
                                                            <img src="{{optional($guidance->image)->first()->getFullUrl()}}" alt="">
                                                        </div>
                                                        <div class="administration__text">
                                                            <span class="administration__title">{{$guidance->title}}</span>
                                                            <span class="administration__position">{{$guidance->subtitle}}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="other-block">
                        <h2>Digər</h2>
                        <div class="content-block">
                            <div class="row ">
                                @foreach($otherItems as $item )
                                    <div class="col-md-4">
                                        <a href="{{link_generator($item)}}" class="structure__item">
                                            <h3>{{$item->title}}</h3>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16">
                                                <use xlink:href="#svg-arrow-right"></use>
                                            </svg>
                                        </a>
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

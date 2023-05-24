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
                        <div class="content-block__text">
                            <div class="lines__image">
                                @if($page->image)
                                    <img src="{{asset('/storage/pages/' . $page->image)}}">
                                @endif

                            </div>
                            <ul class="lines__info">
                                @php($line_info = $page->get_simple_items('lines_info')->first())

                                @if(optional($line_info)->A)
                                    <li>
                                        <h2>Ümumi uzunluğu</h2>
                                        {{$line_info->A}} km
                                    </li>
                                @endif
                                @if(optional($line_info)->B)
                                    <li>
                                        <h2>Stansiya sayı</h2>
                                        {{$line_info->B}} stansiya
                                    </li>
                                @endif

                                @if(optional($line_info)->medium_text1)
                                    <li>
                                        <h2>Pilləkən zolağı</h2>
                                        {{$line_info->medium_text1}}
                                    </li>
                                @endif
                                @if(optional($line_info)->medium_text2)
                                    <li>
                                        <h2>Mövcud xətlər</h2>
                                        {{$line_info->medium_text2}}
                                    </li>
                                @endif

                            </ul>



                            {!! $page->description !!}

                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection

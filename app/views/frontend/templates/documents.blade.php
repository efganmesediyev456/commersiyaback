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
                    <div class="content-block">
                        <div class="content-block__text">
                            @php
                                    $currentPage = request()->get('page') ?? 1 ;
                                    $docs = Cache::remember('documents_' . $page->id . '_' . $currentPage , config('app.cache_time') , fn() => $page->get_simple_items('documents',null,null,6) )

                            @endphp
                            @foreach($docs as $d)
                                <a href="{{$d->text ??  route('document-id' , $d->id) }}" @if($d->text) target="_blank"  @endif class="content-block__link">
                                    <span>{{$d->date}}</span>
                                    {{$d->title}}

                                </a>
                            @endforeach





                        </div>
                    </div>
                    {{$docs->WithQueryString()->links()}}

                </div>
            </div>
        </div>
    </section>
@endsection

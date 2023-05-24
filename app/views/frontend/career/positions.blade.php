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
                        <x-Sidebar.Sidebar :sidebar="$sidebar" />
                    </div>


                </div>


                <div class="col-md-9">
                    <div class="content-block">
                        <div class="row ">
                            @php
                                $currentPage = request()->get('page') ?? 1 ;
                                $paginate = config_json('templates.'. $page->template . '.pagination_limit');
                                $positions = Cache::remember('positions_' . $page->id . '_' . $currentPage , config('app.cache_time') , function () use ($paginate,$page) {
                                        return  \App\Models\Atom\Position::orderBy('id','DESC')->paginate($paginate) ;
                                    } );


                            @endphp


                            @foreach($positions as $p)
                                <div class="col-md-4">
                                    <a href="{{route('profession-front',$p->id)}}" class="structure-inner__item">

                                        <span class="structure-inner__icon">
                                           @if($p->icon)
                                                <img src="{{ $p->icon }}">
                                            @endif
                                        </span>
                                        <h2 class="structure-inner__title">{{$p->title}}</h2>
                                        <p class="structure-inner__desc">{{$p->subtitle ?? ''}}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16">
                                            <use xlink:href="#svg-arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>



                {{$positions->WithQueryString()->links()}}
            </div>
        </div>
    </section>
@endsection

@section('title',  __('frontend.search') )
@section('keywords', "Search")
@section('description', request()->query('q') )
@section('image',  config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')
    <section class="inpage">
        <div class="container">
            <div class="row">
                <x-sidebar.sidebar :sidebar="is_null($result) ? 0 : $result->total()"/>
                <div class="col-xl-9 offset-xl-1 p-xs-0 p-lg-12">
                    <div class="page-body p-xl-56 p-lg-48 p-md-36 p-xs-16">
                        <div class="container p-xs-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title">
                                        @lang('frontend.search')
                                        <span>{{request()->query('q')}}</span>
                                    </div>
                                </div>
{{--                                <form action="{{route('search')}}">--}}
{{--                                    <input type="text" name="input">--}}

{{--                                </form>--}}

                                <div class="col-12 search">
                                    <ul>
                                        @if( !is_null($result) )
                                            @if($result->total() !== 0)
                                                @foreach($result as $r)
                                                    <li> <a href="/{{config('app.locale') .'/'. $r->slug }}">{{$r->title}}</a></li>
                                                @endforeach
                                            @else
                                                <h3 class="not-found">@lang('frontend.not-found')</h3>
                                            @endif
                                        @else
                                            <h3 class="not-found">@lang('frontend.not-found')</h3>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!is_null($result))
                    {{$result->appends(request()->query())->links('vendor.pagination.frontend')}}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

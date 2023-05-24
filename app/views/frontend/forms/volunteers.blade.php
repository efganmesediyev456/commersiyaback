@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')
    <section class="inpage">
        <div class="container">
            <div class="row">
{{--                @include('frontend.includes.sidebar')--}}
                <x-sidebar.sidebar :sidebar="$sidebar"/>
                <div class="col-xl-9 offset-xl-1 p-xs-0 p-lg-12">
                    <div class="page-body p-xl-56 p-lg-48 p-md-36 p-xs-16">
                        <div class="container p-xs-0">
                            <div class="row">
                                @if (session('success'))
                                    <div class="col-12 mb-24">
                                        <div class="success-sent">{{session('success')}}</div>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <div class="title">
                                        {{$page->second_title ?? $page->title}}
                                    </div>
                                </div>
                                <div class="col-12 content-body">
                                   {!! $page->description !!}
                                </div>

                                <div class="col-12 form">
                                    <form action="{{route('volunteers')}}" method="post" id="biscolab-recaptcha-invisible-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-lg-24 gy-xs-20">
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label>@lang('frontend.name')</label>
                                                    <div class="input-control @if($errors->has('name')) error @endif">
                                                        <input class="form-control" value="{{old('name')}}" type="text" placeholder="" name="name">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('name'))
                                                            @foreach($errors->get('name') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label> @lang('frontend.last-name') </label>
                                                    <div class="input-control @if($errors->has('lastname')) error @endif">
                                                        <input class="form-control" value="{{old('lastname')}}" type="text"  name="lastname">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('lastname'))
                                                            @foreach($errors->get('lastname') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label>@lang('frontend.father-name')</label>
                                                    <div class="input-control @if($errors->has('f-name')) error @endif">
                                                        <input class="form-control" value="{{old('f-name')}}" type="text" placeholder="" name="f-name">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('f-name'))
                                                            @foreach($errors->get('f-name') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label>@lang('frontend.city')</label>
                                                    <div class="input-control @if($errors->has('city')) error @endif">
                                                        <input class="form-control" value="{{old('city')}}" type="text" placeholder="" name="city">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('city'))
                                                            @foreach($errors->get('city') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label>@lang('frontend.address')</label>
                                                    <div class="input-control @if($errors->has('address')) error @endif">
                                                        <input class="form-control" value="{{old('address')}}" type="text" placeholder="" name="address">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('address'))
                                                            @foreach($errors->get('address') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label>@lang('frontend.fin')
                                                        <div class="info">
                                                            <i></i>
                                                            <img src="{{asset('assets/images/fin.png')}}" alt="fin" />
                                                        </div>
                                                    </label>
                                                    <div class="input-control @if($errors->has('fin')) error @endif">
                                                        <input class="form-control" value="{{old('fin')}}" type="text" placeholder="" name="fin" data-inputmask="'mask': '*******'">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('fin'))
                                                            @foreach($errors->get('fin') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label>@lang('frontend.email')</label>
                                                    <div class="input-control @if($errors->has('email')) error @endif">
                                                        <input class="form-control" value="{{old('email')}}" type="email" placeholder="" name="email">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('email'))
                                                            @foreach($errors->get('email') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="group">
                                                    <label>@lang('frontend.telephone')</label>
                                                    <div class="input-control @if($errors->has('phone')) error @endif">
                                                        <input class="form-control" value="{{old('phone')}}" type="text" placeholder="" name="phone" data-inputmask="'mask': '(099)-999-99-99'">
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('phone'))
                                                            @foreach($errors->get('phone') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="group">
                                                    <label>@lang('frontend.form-description')</label>
                                                    <div class="input-control @if($errors->has('description')) error @endif">
                                                        <textarea class="form-control " name="description">{{old('description')}}</textarea>
                                                    </div>
                                                    <div class="errors">
                                                        @if($errors->has('description'))
                                                            @foreach($errors->get('description') as $message)
                                                                <span>{{$message}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="group">
                                                    {!! htmlFormButton(__('frontend.send'),['value'=>'submit']) !!}

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

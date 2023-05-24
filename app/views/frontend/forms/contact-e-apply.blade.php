@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')
@push('css')
    <style>
        .errors-form {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;


        }

        .errors-form span{
            color: red;
            font-size: 14px;
        }
    </style>
@endpush
@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="contacts">
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
                        {!! $page->description !!}


                            @if($errors->any())
                            <div class="other-block">
                                <div class="errors-form">
                                    @foreach($errors->all() as $message)
                                        <span>{{$message}}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif




                        <form action="{{route('contact-e-apply')}}" method="post" id="biscolab-recaptcha-invisible-form"  enctype="multipart/form-data" class="application">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Ad *" required>
                                        <label for="input1">Ad *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="text" class="form-control" name="lastname" value="{{old('lastname')}}" placeholder="Soyad *" required>
                                        <label for="input1">Soyad *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Əlaqə nömrəsi *" required>
                                        <label for="input1">Əlaqə nömrəsi *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="text" class="form-control" name="internal_phone" value="{{old('internal_phone')}}" placeholder="Daxili nömrə *" required>
                                        <label for="input1">Daxili nömrə *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="E-poçt *" required>
                                        <label for="input1">E-poçt *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <select id="select1" name="type" class="form-control">
                                            @foreach($page->get_simple_items('subject') as $subject)
                                                <option value="{{$subject->title}}">{{$subject->title}}</option>
                                            @endforeach
                                        </select>
                                        <label for="select1">Məktubun mövzusu *</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group form-floating">
                                        <textarea id="input7" rows="5" class="form-control" name="description" placeholder="Məktubun mətni *" required>{{old('description')}}</textarea>
                                        <label for="input7">Məktubun mətni *</label>
                                    </div>
                                    {!! htmlFormButton(__('frontend.send'),['value'=>'submit','class' =>'btn w-100']) !!}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

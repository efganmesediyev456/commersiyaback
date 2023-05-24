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
                        {!! $page->description !!}
                        <div class="other-block">

                            @if($errors->any())
                                <div class="errors-form">
                                    @foreach($errors->all() as $message)
                                        <span>{{$message}}</span>
                                    @endforeach
                                </div>
                            @endif


                            <h2>Bizimlə əməkdaşlıq</h2>
                            <div class="content-block"></div>
                        </div>
                        <form action="{{route('cooperation-e-apply')}}" method="post" id="biscolab-recaptcha-invisible-form"  enctype="multipart/form-data" class="application">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <select id="select1" name="type" class="form-control">
                                            @foreach($page->get_simple_items('subject') as $subject)
                                                <option value="{{$subject->title}}">{{$subject->title}}</option>
                                            @endforeach

                                        </select>
                                        <label for="select1">Əməkdaşlıq növü *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="text" class="form-control" name="organization_name" placeholder="Təşkilatın tam adı" required>
                                        <label for="input1">Təşkilatın tam adı</label>
                                    </div>
                                </div>
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
                                        <input id="input1" type="text" class="form-control" name="country" value="{{old('country')}}" placeholder="Ölkə *" required>
                                        <label for="input1">Ölkə *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="Şəhər *" required>
                                        <label for="input1">Şəhər *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Qeydiyyat ünvanı *" required>
                                        <label for="input1">Qeydiyyat ünvanı *</label>
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
                                <div class="col-md-12">
                                    <div class="form-group form-floating">
                                        <input id="input1" type="email" class="form-control" name="description" value="{{old('description')}}" placeholder="Əməkdaşlığın məqsədi və təsviri *" required>
                                        <label for="input1">Əməkdaşlığın məqsədi və təsviri *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group--file ">
                                        <input type="file" name="file" id="file" class="d-none">
                                        <label for="file"><img src="images/svg-icons/file.svg" alt="">Fayl əlavə et</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
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

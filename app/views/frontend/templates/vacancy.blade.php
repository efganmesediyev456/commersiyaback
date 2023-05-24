@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@push('css')
    <link rel="stylesheet" href="{{asset('frontend/css/multi-step-form.css')}}">
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

                            {!! $page->description !!}
                        </div>
                        @if($errors->any())
                            @foreach($errors->all() as $er)
                                <div class="errors-form">
                                    @foreach($errors->all() as $message)
                                        <span>{{$message}}</span>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif

                        {{debug(old())}}

                        <form class="application msf" action="{{route('vacancy',['vacancy' => request()->get('vacancy')])}}" method="post" id="biscolab-recaptcha-invisible-form"  enctype="multipart/form-data">
                                @csrf

                            <div class="msf-content">
                                <!--1 General Information-->
                                <x-vacancy.general-information />

                                <!--2 Education-->
                                <x-vacancy.education />

                                <!--3 Work Experience-->
                               <x-vacancy.work-experience />

                                <!--4 Language-->
                                <x-vacancy.foreign-language />

                                <!--5 Computer knowledge's-->
                                <x-vacancy.computer-knowledge />

                                <!--6 Work requirements-->
                                <x-vacancy.work-requirements />

                                <!--7 Health information-->
                               <x-vacancy.health-information />

                                <!--8 Other-->
                               <x-vacancy.other />


                            </div>


                            <div class="msf-navigation">
                                <div class="row">


                                    <div class="col-md-12">
                                        <button type="button" data-type="next" class="btn w-100 msf-nav-button">növbəti
                                            addım
                                        </button>

                                    </div>

                                    <div class="col-md-12 mt-5">
                                        <button type="button" data-type="back" class="btn w-100 msf-nav-button">Geriyə
                                        </button>


                                    </div>


                                </div>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection


@push('js')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.6/jquery.validate.unobtrusive.min.js"></script>

    <script src="node_modules/multi-step-form-js/src/multi-step-form.js"></script>
    <script src="{{asset('frontend/js/multi-step-form.js')}}"></script>
    <script src="{{asset('frontend/js/form.js')}}"></script>

    <script type="text/javascript">
        function ViewModel() {
            var self = this;


        }

        var viewModel = new ViewModel();


        $(".msf:first").multiStepForm({
            activeIndex: 0,
            validate: {},
            hideBackButton: false,
            allowUnvalidatedStep: false,
            allowClickNavigation: true,

        });
    </script>
@endpush

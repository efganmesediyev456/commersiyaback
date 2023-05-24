@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

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
                        <div class="contacts__block">
                            @php($contact = $page->get_simple_items()->first())
                            @php($phone = explode(',',$contact->text))
                            @php($corona = explode(',',$contact->medium_text1))


                            <ul>
                                <li class="contacts__item">
                                    <span>Ünvan</span>
                                    {{$contact->title}}
                                </li>
                                <li class="contacts__item">
                                    <span>Əlaqə</span>
                                    <a href="tel:{{$phone[0] ?? ''}}">{{$phone[0] ?? ''}}</a>
                                </li>

                                @if(isset($phone[1]))
                                    <li class="contacts__item">
                                        <span>Faks</span>

                                        <a href="tel:{{$phone[1] ?? ''}}">{{$phone[1] ?? ''}}</a>
                                    </li>
                                @endif

                                <li class="contacts__item">
                                    <span>Korona vİrusla əlaqədar qaynar xətt</span>
                                    @foreach($corona as $phone )
                                        <a href="tel:{{$phone}}">{{$phone}}</a>
                                    @endforeach

                                </li>
                            </ul>
                            <div class="contacts__map">
                                <iframe
                                    width="100%"
                                    height="400"
                                    frameborder="0"
                                    scrolling="no"
                                    marginheight="0"
                                    marginwidth="0"
                                    src="{{$contact->medium_text2}}"
                                >
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

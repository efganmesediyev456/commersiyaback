@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="passengers">
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
                        @php($balance = $page->get_simple_items('balance')->first())

                        <div class="content-block__text">
                            <h2>Gediş haqqının ödənilməsi</h2>
                            <p>
                                {{optional($balance)->medium_text3}}
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="passengers__item">
                                        <h2>Sizə ən yaxın ödəmə vasitələri</h2>
                                        <iframe
                                            width="100%"
                                            height="160"
                                            frameborder="0"
                                            scrolling="no"
                                            marginheight="0"
                                            marginwidth="0"
                                            src="{{optional($balance)->medium_text2}}"
                                        >
                                        </iframe>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="passengers__item">
                                        <h2>BakıKart analiz mərkəzləri</h2>
                                        <iframe
                                            width="100%"
                                            height="160"
                                            frameborder="0"
                                            scrolling="no"
                                            marginheight="0"
                                            marginwidth="0"
                                            src="{{optional($balance)->medium_text1}}"
                                        >
                                        </iframe>
                                    </div>
                                </div>



                                @foreach($cashPoints = $page->get_simple_items('cash-points') as $points)
                                    <div class="col-md-4">
                                        <a  class="structure-inner__item">
                                        <span class="structure-inner__icon">
                                            <img src="{{$points->image->first()->getFullUrl()}}" alt=""></span>
                                            <h2 class="structure-inner__title">{{$points->title}}</h2>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <div class="passengers__item">
                                <ul>
                                    <li>
                                        <h2>Bir gediş haqqı</h2>
                                        {{number_format(optional($balance)->A, 2, '.', '')  }} AZN

                                    </li>
                                    <li>
                                        <h2>Onlayn ödəniş</h2>
                                        <a href="http://{{optional($balance)->link}}"> {{optional($balance)->link}}</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="http://{{optional($balance)->link}}" class="btn btn--with_icon w-100">
                                Balans artır
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                    <use xlink:href="#svg-arrow-link"></use>
                                </svg>
                            </a>
                            <br><br>
                            <h2>Tarix</h2>
                            <p>
                                Nulla convallis accumsan urna sit amet volutpat. Nullam ut nibh rutrum, consectetur
                                tellus porttitor, volutpat odio. Sed a magna velit. Nam lectus urna, tristique a
                                tincidunt ut, maximus in libero. Curabitur metus nibh, placerat iaculis scelerisque ac,
                                euismod auctor odio. Nam varius nunc diam, sed efficitur tortor egestas a. Maecenas
                                tincidunt nibh nec leo luctus, at ultrices ex hendrerit.
                            </p>
                            <p>
                                In hac habitasse platea dictumst. Praesent et ultrices metus, quis varius tortor.
                                Pellentesque mattis, nunc sed elementum cursus, dolor velit scelerisque ex, et
                                vestibulum lorem tellus non neque.
                            </p>
                            <p>
                                Etiam eget fermentum neque. Interdum et malesuada fames ac ante ipsum primis in
                                faucibus. Nullam vitae interdum magna, quis feugiat ipsum. Vivamus facilisis hendrerit
                                velit. Nam rhoncus odio vitae efficitur euismod.
                            </p>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection

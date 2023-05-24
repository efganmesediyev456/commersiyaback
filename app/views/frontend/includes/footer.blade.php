<!-- footer -->



<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="footer__logo">
                    <img src="{{config('app.url') .'/storage/' . settings('footer_logo') }}" alt="">
                    <p>
                        {!! preg_replace('/<script>.*<\/script>/', '', setting('slogan_'. config('app.locale')))    !!}
                    </p>

                </div>
            </div>
            @foreach($dropdown_menu as $menu)
                <div class="col-md-2">
                    <div class="footer__item">
                        <h3 class="footer__title">{{$menu->title}}</h3>
                        <ul class="footer__nav">
                            @if($menu->children)
                                @foreach($menu->children as $child_menu)
                                    <li>
                                        <a href="{{ preg_match('/https?:\/\//i', $child_menu->link) ? $child_menu->link : '/'. config('app.locale') .'/' . $child_menu->link }}"
                                           @if($menu->on_blank) target="_blank" @endif >{{$child_menu->title}}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            @endforeach



            <div class="col-md-2">
                <div class="app-download mb-5">
                    <a class="mb-3" href="#" target="_blank" aria-label="appstore">
                        <img src="{{asset('frontend/images/appstore.svg')}}" alt="">
                    </a>
                    <a class="mb-3" href="#" target="_blank" aria-label="playstore">
                        <img src="{{asset('frontend/images/playstore.svg')}}" alt="">
                    </a>
                    <a href="#" target="_blank" aria-label="playstore">
                        <img src="{{asset('frontend/images/app-gallery.svg')}}" alt="">
                    </a>
                </div>



                <div class="social-media-links">
                    @if(setting('facebook'))
                        <a href="{{ setting('facebook') }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                <use xlink:href="#svg-fb"></use>
                            </svg>
                        </a>
                    @endif


                    @if(setting('twitter'))
                            <a href="{{ setting('twitter') }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                    <use xlink:href="#svg-twitter"></use>
                                </svg>
                            </a>
                     @endif


                    @if(setting('youtube'))
                            <a href="{{ setting('youtube') }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                    <use xlink:href="#svg-youtube-white"></use>
                                </svg>
                            </a>
                        @endif

                    @if(setting('instagram'))
                            <a href="{{ setting('instagram') }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                    <use xlink:href="#svg-insta"></use>
                                </svg>
                            </a>
                        @endif

                    @if(setting('telegram'))
                            <a href="{{ setting('telegram') }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                    <use xlink:href="#svg-telegram-white"></use>
                                </svg>
                            </a>
                        @endif

                    @if(setting('tiktok'))
                            <a href="{{ setting('tiktok') }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                    <use xlink:href="#svg-tiktok"></use>
                                </svg>
                            </a>
                        @endif





                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container-fluid">
            <p>© {{ date('Y') }}, @lang('frontend.copyright') </p>
            <p class="cprght">Sayt <a href="https://safaroff.com/" target="_blank">Safaroff Agency</a> tərəfindən hazırlanıb.</p>
        </div>
    </div>
</footer>
<!-- end footer -->


<script src="{{asset('frontend/js/main.js')}}"></script>

@stack('js')

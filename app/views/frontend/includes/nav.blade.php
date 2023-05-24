<header class="header">
    <div class="header__fixed">
        <div class="header__top">
            <div class="container-fluid d-flex justify-content-between align-items-center position-relative">
                <a href="/" class="header__logo">
                    <img src="{{config('app.url') .'/storage/' . settings('logo') }}"
                         alt='"Bakı Metropoliteni" Qapalı Səhmdar Cəmiyyəti' width="277" height="48">
                </a>
                <nav class="header__nav">
                    <ul class="header__menu">

                        @foreach($header_menu as $menu)
                            <li><a href="/{{ config('app.locale') . '/' .  $menu->link}}"  @if($menu->on_blank) target="_blank" @endif >{{$menu->title}} </a></li>
                        @endforeach
                    </ul>
                </nav>
                <form class="header__search">
                    <div class="form-group">
                        <button class="header__search__btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                <use xlink:href="#svg-search"></use>
                            </svg>
                        </button>
                        <input type="text" class="form-control" placeholder="Axtar...">
                    </div>
                    <div class="header__close-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12">
                            <use xlink:href="#svg-close"></use>
                        </svg>
                    </div>
                </form>
                <ul class="header__tools">
                    <li class="header__tools__item header__tools__item--lang">
                        <a href="javascript:void(0)">
                            {{ strtoupper(config('app.locale')) }}
                        </a>
                        <ul class="header__lang">
                            @foreach(config('app.menu_locales') as $code => $locale)
                                @if($code !== config('app.locale'))
                                    <li><a href="{{ \Str::replaceFirst(env('APP_DOMAIN', '') . '/' . config('app.locale'), env('APP_DOMAIN', '') . '/' . $code, Request::url()) }}">{{ strtoupper($code) }}</a></li>
                                @endif
                            @endforeach


                        </ul>
                    </li>

                    {{--
                    <li class="header__tools__item header__tools__item--disabled d-none d-md-flex">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                <use xlink:href="#svg-disabled"></use>
                            </svg>
                        </a>
                    </li>
                    --}}

                    <li class="header__tools__item header__tools__item--settings d-none d-md-flex">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="13">
                                <use xlink:href="#svg-glasses"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="header__tools__item header__tools__item--search d-none d-md-flex">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15">
                                <use xlink:href="#svg-search"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="header__tools__item header__tools__item--burger">
                        <label for="butger-toggle" aria-label="burger"><i></i></label>
                    </li>
                </ul>
                <div class="header__settings settings">
                    <div class="settings__item">
                        <span>ŞRİFTİN ÖLÇÜSÜ</span>
                        <div class="settings__font-size">
                            <a class="small" href="#">A</a>
                            <a class="normal active" href="#">A</a>
                            <a class="large" href="#">A</a>
                        </div>
                    </div>
                    <div class="settings__item">
                        <span>ŞRİFTİN NÖVÜ</span>
                        <div class="settings__font-family">
                            <a class="san-serif active" href="#">San-Serif</a>
                            <a class="serif" href="#">Serif</a>
                        </div>
                    </div>
                    <div class="settings__item">
                        <span>ŞƏKİLLƏRİN TƏSVİRİ</span>
                        <div class="settings__switcher settings__switcher--hide-image">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="toggle"></span>
                            </label>
                        </div>
                    </div>
                    <div class="settings__item">
                        <span>RƏNGİN TƏSVİRİ</span>
                        <div class="settings__switcher settings__switcher--colors">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="toggle"></span>
                            </label>
                        </div>
                    </div>
                    <div class="header__close-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12">
                            <use xlink:href="#svg-close"></use>
                        </svg>
                    </div>
                </div>
            </div>

            @include('frontend.includes.dropdown-menu')
        </div>
    </div>
</header>

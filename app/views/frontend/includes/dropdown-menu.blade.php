<div class="burger-menu footer mt-0">
    <div class="container-fluid">
        <div class="header__tools__item header__tools__item--burger">
            <label for="butger-toggle" aria-label="burger"><i></i></label>
        </div>
        <div class="row justify-content-center">
            @foreach($dropdown_menu as $menu)
                <div class="col-md-3">
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
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
@include('frontend.includes.head')
<body>
<div class="svg-placeholder" style="border: 0; clip: rect(0 0 0 0); height: 1px;
        margin: -1px; overflow: hidden; padding: 0;
        position: absolute; width: 1px;"></div>
<script>
    document
        .querySelector('.svg-placeholder')
        .innerHTML = SVG_SPRITE;
</script>

<input type="checkbox" class="d-none" id="butger-toggle">



{{--@include('frontend.includes.preloader')--}}
{{--@include('frontend.includes.usability-block')--}}
@include('frontend.includes.nav')
{{--<div class="dropdown-menu">--}}
{{--    @include('frontend.includes.dropdown-items')--}}
{{--    @include('frontend.includes.dropdown-menu')--}}
{{--</div>--}}


@yield('content')




@include('frontend.includes.footer')
</body>
</html>

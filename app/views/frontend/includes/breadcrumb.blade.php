<div class="container-fluid">
    <ul class="breadcrumbs">
        <li><a href="/">@lang('frontend.homepage')</a></li>
        @if(route_name() !== 'search')

            @foreach($breadCrumb as $bc)
                @if(is_null($bc->link))
                    <li>{{mb_strimwidth($bc->{'title.'. config('app.locale')},0,80,'...') }}</li>
                @else
                    <li>
                        <a href="/{{rtrim(config('app.locale') . '/' . $bc->link,'/')}} ">{{mb_strimwidth($bc->{'title.'. config('app.locale')},0,100,'...') }}</a>
                    </li>
                @endif
            @endforeach
        @else

            <li>@lang('frontend.search')</li>
            <li> {{mb_strimwidth(request()->get('q'),0,80,'...') }}</li>

        @endif


    </ul>
</div>

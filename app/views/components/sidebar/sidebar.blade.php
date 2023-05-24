
<ul>

    {{debug(str_replace('/'. config('app.locale') . '/' , '' , request()->getPathInfo()))}}
    @if(route_name() !== 'search')

        @foreach($sidebar as $sb)
            {{debug($sb->slug)}}
            <li >

                <a @if($sb->active) class="active" @endif href="/{{config('app.locale')}}/{{$sb->slug}}">{{$sb->title}} </a>
            </li>
        @endforeach

    @else

        <li @if($sidebar != 0) class="active" @endif  >
            <a>{{$sidebar ?? 0 }} @lang('frontend.search-result') </a>
        </li>

    @endif

</ul>

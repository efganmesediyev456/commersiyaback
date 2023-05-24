@if ($paginator->hasPages())
<div class="pagination">
    <ul>

        <li>
            @if ($paginator->onFirstPage())
                <a>
            @else
            <a href="{{ $paginator->previousPageUrl() }}">
            @endif
                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.10449 13.875L8.32324 13.6562C8.47949 13.5 8.47949 13.2812 8.32324 13.125L2.22949 7L8.32324 0.90625C8.47949 0.75 8.47949 0.53125 8.32324 0.375L8.10449 0.15625C7.94824 0 7.72949 0 7.57324 0.15625L0.979492 6.75C0.823242 6.90625 0.823242 7.125 0.979492 7.28125L7.57324 13.875C7.72949 14.0312 7.94824 14.0312 8.10449 13.875Z"/>
                </svg>
            </a>
        </li>
        @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><a>{{ $page }}</a></li>
                @else
                    <li ><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
        @endforeach

        <li>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
            @else
                <a>
            @endif
                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.865234 0.15625L0.646484 0.375C0.490234 0.53125 0.490234 0.75 0.646484 0.90625L6.74023 7L0.646484 13.125C0.490234 13.2812 0.490234 13.5 0.646484 13.6562L0.865234 13.875C1.02148 14.0312 1.24023 14.0312 1.39648 13.875L7.99023 7.28125C8.14648 7.125 8.14648 6.90625 7.99023 6.75L1.39648 0.15625C1.24023 0 1.02148 0 0.865234 0.15625Z" />
                </svg>
            </a>
        </li>

    </ul>
</div>
@endif

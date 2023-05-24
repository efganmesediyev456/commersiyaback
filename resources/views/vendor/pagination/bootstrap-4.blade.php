@if ($paginator->hasPages())


    <div class="page">

        <ul>
            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a disabled href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11">
                            <use xlink:href="#svg-arrow-left"></use>
                        </svg>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11">
                            <use xlink:href="#svg-arrow-left"></use>
                        </svg>
                    </a>
                </li>
            @endif


                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a href="" class="active">{{ $page }}</a></li>
                            @else
                                <li ><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $paginator->nextPageUrl() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11">
                                <use xlink:href="#svg-arrow-right2"></use>
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="page-item" >
                        <a href="" disabled="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11">
                                <use xlink:href="#svg-arrow-right2"></use>
                            </svg>
                        </a>
                    </li>
                @endif

        </ul>
    </div>

@endif

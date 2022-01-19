@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="item">
                    <span class="link disabled">&lsaquo;</span>
                </li>
            @else
                <li class="item">
                    <a class="link" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="item"><span class="link disabled">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="item"><span class="link active">{{ $page }}</span></li>
                        @else
                            <li class="item"><a class="link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="item">
                    <a class="link" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
                </li>
            @else
                <li>
                    <span class="link disabled">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

@if ($paginator->hasPages())
    <ul class="pagination custom-pagination justify-content-center">

        {{-- Previous Button --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            @if ($paginator->onFirstPage())
                <span class="page-link">
                    <i class="ti-angle-left"></i>
                </span>
            @else
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="ti-angle-left"></i>
                </a>
            @endif
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            {{-- Three Dots --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Page Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        @if ($page == $paginator->currentPage())
                            <span class="page-link">{{ $page }}</span>
                        @else
                            <a class="page-link" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        @endif
                    </li>
                @endforeach
            @endif

        @endforeach

        {{-- Next Button --}}
        <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
            @if ($paginator->hasMorePages())
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="ti-angle-right"></i>
                </a>
            @else
                <span class="page-link">
                    <i class="ti-angle-right"></i>
                </span>
            @endif
        </li>

    </ul>
@endif
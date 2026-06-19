@if ($paginator->hasPages())
<nav class="mt-5 wow fadeInUp">
    <ul class="pagination justify-content-center">

        {{-- Previous --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            @if ($paginator->onFirstPage())
                <span class="page-link">
                    <i class="bi bi-chevron-left"></i>
                </span>
            @else
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="bi bi-chevron-left"></i>
                </a>
            @endif
        </li>

        {{-- Page Numbers --}}
        @foreach ($elements as $element)

            {{-- Dots --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Links --}}
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

        {{-- Next --}}
        <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
            @if ($paginator->hasMorePages())
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="bi bi-chevron-right"></i>
                </a>
            @else
                <span class="page-link">
                    <i class="bi bi-chevron-right"></i>
                </span>
            @endif
        </li>

    </ul>
</nav>
@endif
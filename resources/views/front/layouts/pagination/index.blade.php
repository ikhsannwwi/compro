<style>
    .disabled {
        pointer-events: none;
        color: #777;
    }
</style>

@if ($paginator->haspages())
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-lg m-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link rounded-0" href="javascript:void(0)" aria-label="Previous">
                        <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-0" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif
                @if (is_array($element))
                    @php
                        $currentPage = $paginator->currentPage();
                        $lastPage = $paginator->lastPage();
                    @endphp
                    @foreach ($element as $page => $url)
                        @if ($page === 1)
                            <li class="page-item {{($page === $currentPage) ? 'active' : ''}}"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page === $currentPage - 1)
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page === $currentPage)
                            <li class="page-item active"><a class="page-link"
                                    href="javascript:void(0)">{{ $page }}</a></li>
                        @elseif ($page === $currentPage + 1)
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page === $lastPage)
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->onLastPage())
                <li class="page-item disabled">
                    <a class="page-link rounded-0" href="javascript:void(0)" aria-label="Next">
                        <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-0" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
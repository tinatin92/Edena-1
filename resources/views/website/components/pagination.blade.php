@if ($paginator->hasPages())
    <section class="container">
        <div class="pagination">
                @if ($paginator->onFirstPage())
                <span class="icon-Vector-41"></span>

                @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    <span>
                        <span class="icon-Vector-41"></span>
                    </span>
                </a>
               @endif

            <ul>
                @if ($paginator->currentPage() > 3)
                    <li class="active pageNumber"><a href="{{ $paginator->url(1) }}" class="active">1</a></li>
                @endif
                @if ($paginator->currentPage() > 4)
                    <li><span>...</span></li>
                @endif

                @foreach (range(1, $paginator->lastPage()) as $i)
                    @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="active"><span>{{ $i }}</span></li>
                        @else
                            <li><a href="{{ $paginator->url($i) }}" class="active">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach

                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li><span>...</span></li>
                @endif
                @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li><a href="{{ $paginator->url($paginator->lastPage()) }}"
                            class="active">{{ $paginator->lastPage() }}</a></li>
                @endif
            </ul>
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span class="icon-Vector-51"></span>
                </a>
                @else
                <span class="icon-Vector-51"></span>

                @endif
            </span>
        </div>
    </section>

@endif


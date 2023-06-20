<div class="container">
    <div class="pagination">
        <a href="{{ $paginator->previousPageUrl() }}">
            <span>
                <span class="icon-Vector-41"></span>
            </span>
        </a>
        <ul>
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li @if($paginator->currentPage() == $page) class="active" @endif>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>
        <a href="{{ $paginator->nextPageUrl() }}">
            <span class="icon-Vector-51"></span>
        </a>
    </div>
</div>

@if ($paginator->hasPages())
    <section class="pagination">
        <div class="pagination__container">
            <p>Показано {{ $paginator->lastItem() }} из {{ $paginator->total() }}</p>
            <div class="pagination__items">
                @if (!$paginator->onFirstPage())
                    <a class="pagination__arrow" href="{{ $paginator->previousPageUrl() }}" title="first">
                        <img src="/temple/images/component/pagination/arrow.svg" alt="arrow">
                    </a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <p class="pagination__activ">{{ $element }}</p>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <p class="pagination__activ">{{ $page }}</p>
                            @else
                                <span class="page">
                                    <a href="{{ $url }}" title="{{ $page }}">
                                       {{ $page }}
                                    </a>
                                </span>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a class="pagination__arrow right" href="{{ $paginator->nextPageUrl() }}" title="last">
                        <img src="/temple/images/component/pagination/arrow.svg" alt="arrow">
                    </a>
                @endif
            </div>
        </div>
    </section>
@endif

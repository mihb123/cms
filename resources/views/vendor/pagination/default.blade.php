@if ($paginator->hasPages())

    <div class="kc-pagination {{ $pagiClass ?? '' }}">
        <div class="paginate">
            @if ($paginator->onFirstPage())
                <a href="#" class="page-number page-prev disabled">
                    〈 前へ
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="page-number page-prev ">
                    〈 前へ
                </a>
            @endif
            @if ($paginator->currentPage() > 2)
                @if ($paginator->currentPage() > 3)
                    <a href="{{ $paginator->currentPage() }}" class="page-number disabled">...</a>
                @endif
            @endif

            @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->currentPage() + 2, $paginator->lastPage()); $i++)
                @if ($i == $paginator->currentPage())
                    <a href="{{ $paginator->url($i) }}" class="page-number current-page">{{ $i }}</a>
                @else
                    <a href="{{ $paginator->url($i) }}" class="page-number">{{ $i }}</a>
                @endif
            @endfor

            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <a href="{{ $paginator->currentPage() }}" class="page-number disabled">...</a>
                @endif
                <a href="{{ $paginator->url($paginator->lastPage()) }}"
                    class="page-number">{{ $paginator->lastPage() }}</a>
            @endif
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-number page-next">
                    次へ 〉
                </a>
            @else
                <a href="#" class="page-number page-next disabled">
                    次へ 〉
                </a>
            @endif

        </div>
        <div class="page-count"><span class="current">{{ $paginator->currentPage() }}</span> /
            {{ $paginator->lastPage() }}
            ページ
        </div>
    </div>
@endif

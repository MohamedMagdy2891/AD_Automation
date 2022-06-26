@if ($paginator->hasPages())
    <div class="row">
        <div class="col-md-12 text-center ">
            <nav class="text-center">
                <ul class="pagination text-center" style="text-align: center !important;display: flex;justify-content: center;">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link pt-2 pb-2 pr-5 pl-5" style="background-color: #543a79;color:#fff;border-radius: 50px">→ السابق </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link pt-2 pb-2 pr-5 pl-5" style="background-color: #543a79;color:#fff;border-radius: 50px" href="{{ $paginator->previousPageUrl() }}" rel="prev">→ السابق</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link mr-2 pt-2 pb-2 pr-5 pl-5" style="background-color: #543a79;color:#fff;border-radius: 50px" href="{{ $paginator->nextPageUrl() }}" rel="next">التالى ←</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link mr-2 pt-2 pb-2 pr-5 pl-5" style="background-color: #543a79;color:#fff;border-radius: 50px">التالى ←</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endif

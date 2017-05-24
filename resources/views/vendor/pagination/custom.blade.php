@if ($paginator->hasPages())
  <div class="d-flex justify-content-center">
    <ul class="pagination pagination-primary">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item arrow-margin-left">
              <a href="#" class="page-link" aria-label="Previous">
                <span aria-hidden="true">
                  <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                </span>
              </a>
            </li>
        @else
            <li class="page-item arrow-margin-left">
              <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"  class="page-link">
                <span aria-hidden="true">
                  <i class="fa fa-angle-double-left"></i>
                </span>
              </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><a  class="page-link">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item arrow-margin-right">
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next" class="page-link">
                  <span aria-hidden="true">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>
                </a>
            </li>
        @else
            <li class="disabled page-item arrow-margin-right">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">
                  <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </span>
              </a>
            </li>
        @endif
    </ul>
  </div>
@endif
{{--
<div class="justify-content-center">
    <ul class="pagination pagination-primary">
        <li class="page-item arrow-margin-left">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
            </a>
        </li>


        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item active"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>



        <li class="page-item arrow-margin-right">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true"></span>
            </a>
        </li>
    </ul>
</div> --}}

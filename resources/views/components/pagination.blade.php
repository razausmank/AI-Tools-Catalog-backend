

@if ($paginator->hasPages())
<div class="card card-custom">
    <div class="card-body">
        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">

                {{-- First Page --}}
                <a href="{{ $paginator->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>

                {{-- Previous Page Link --}}

                @if ($paginator->onFirstPage())
                    <a  class="disabled btn btn-icon btn-sm btn-light-primary mr-2 my-1" >
                        <i class="ki ki-bold-arrow-back icon-xs"></i>
                    </a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-back icon-xs"></i>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif

                @endforeach


                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                @else
                    <a  class=" disabled btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                @endif

                {{-- Last Page --}}
                <a href="{{ $paginator->url( $paginator->lastPage() ) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                </a>

            </div>

            <div class="d-flex align-items-center">
                <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;" onchange="location = this.value;">
                    <option value="{{ $paginator->path().'?results=10'}}" >10</option>
                    <option value="{{ $paginator->path().'?results=20'}}" >20</option>
                    <option value="{{ $paginator->path().'?results=30'}}" >30</option>
                    <option value="{{ $paginator->path().'?results=50'}}" >50</option>
                    <option value="{{ $paginator->path().'?results=100'}}" >100</option>
                </select>
                <span class="text-muted">Displaying 10 of 230 records</span>
            </div>
        </div>
        <!--end:: Pagination-->
    </div>
</div>
@endif

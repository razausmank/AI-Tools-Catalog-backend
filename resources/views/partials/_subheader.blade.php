@if ($attributes['title'])
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7  subheader-transparent " id="kt_subheader">
        <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Heading-->
                <div class="d-flex flex-column">

                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">
                        {{ $attributes['title'] ?? '' }} </h2>

                    <!--end::Title-->
                    @if (isset($breadcrumbs))

                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">

                            <!--begin::Item-->
                            <a href="{{ route('dashboard') }}" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>

                            <!--end::Item-->

                            @foreach ($breadcrumbs as $name => $link)
                                <!--begin::Item-->
                                <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                                <a href="{{ $link != '#' ? route($link) : '#' }}"
                                    class="text-white text-hover-white opacity-75 hover-opacity-100">
                                    {{ $name }} </a>

                                <!--end::Item-->
                            @endforeach


                        </div>
                    @endif

                    <!--end::Breadcrumb-->
                </div>

                <!--end::Heading-->
            </div>

            <!--end::Details-->

            <!--begin::Toolbar-->
            <div class="d-flex ">

                {{ $custom_sub_header ?? '' }}

            </div>

            <!--end::Toolbar-->
        </div>
    </div>
@endif
<!--end::Subheader-->

<!--begin::Col-->
 <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
            <div class="d-flex justify-content-end">
                <span class="label label-lg font-weight-bold  label-light-{{ $attributes['info-bg'] }} label-inline">{{ $attributes['info'] }}</span>
            </div>

            <!--begin::User-->
            <div class="d-flex align-items-center mb-7">
                <!--begin::Pic-->
                <div class="flex-shrink-0 mr-4">
                    <div class="symbol symbol-circle symbol-lg-75">
                        <img src="{{ $item->image ? asset(Storage::url($item->image)) : asset('assets/media/users/blank.png') }} " alt="image" />
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Title-->
                <div class="d-flex flex-column">
                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $item->name }}</a>
                    <span class="text-muted font-weight-bold">Place Holder Text</span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::User-->
            <!--begin::Desc-->
            <p class="mb-7">{{ $item->description }}</p>
            <!--end::Desc-->
            <!--begin::Info-->
            <div class="mb-7">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-dark-75 font-weight-bolder mr-2">Barcode:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ $item->barcode }}</a>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-1">
                    <span class="text-dark-75 font-weight-bolder mr-2">Price:</span>
                    <a href="#" class="text-muted text-hover-primary">${{ $item->price }}</a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-dark-75 font-weight-bolder mr-2">Quantity:</span>
                    <span class="text-muted font-weight-bold">{{ $item->quantity }}</span>
                </div>
            </div>
            <!--end::Info-->
            <a href="#" class="btn btn-block btn-sm btn-light-success font-weight-bolder text-uppercase py-4">write message</a>
        </div>
        <!--end::Body-->
    </div>
    <!--end:: Card-->
</div>
<!--end::Col-->

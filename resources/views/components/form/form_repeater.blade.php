
<div id="{{ $attributes['id'] }}" class="form_repeater {{ $attributes['parent_class'] }}">
    <hr />
    <br />
    <h3 class="card-title font-size-h3">
        {{ $attributes['title'] }}
    </h3>
    @if (!$attributes['edit'])
        <div class="form-group row" id="{{ $attributes['id'] }}">
            <div data-repeater-list="{{ $attributes['data_repeater_list'] }}" class="{{ $attributes['class'] }}">
                <div data-repeater-item class="form-group row d-flex align-items-end">

                    {{ $slot }}


                    <div class="col-md-2">
                        <a href="javascript:;" data-repeater-delete="{{ $attributes['data_repeater_list'] }}" class="btn btn-sm font-weight-bolder btn-light-danger">
                            <i class="la la-trash-o"></i>Delete
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group row">
            <label class="col-lg-2 col-form-label text-right"></label>
            <div class="col-lg-4">
                <a href="javascript:;" data-repeater-create="{{ $attributes['data_repeater_list'] }}" class="btn btn-sm font-weight-bolder btn-light-primary">
                    <i class="la la-plus"></i>Add
                </a>
            </div>
        </div>
    @else
        <div class="form-group row" id="{{ $attributes['id'] }}">
            <div data-repeater-list="{{ $attributes['data_repeater_list'] }}" class="{{ $attributes['class'] }}">
                        {{ $slot }}

            </div>

        </div>
    @endif
</div>

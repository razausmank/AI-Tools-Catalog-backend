<!--begin::Group-->
<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-md-4 col-form-label">{{ $attributes['label'] }}</label>
    <div class="col-lg-9 col-xl-9 col-md-8 ">
        {{ $slot }}
        <x-form.form_field_error field="{{ $attributes['error'] }}" />
    </div>
</div>
<!--end::Group-->

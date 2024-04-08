<div class="image-input" id="{{ $attributes['id'] }}">
    <div class="image-input-wrapper" style="background-image: url({{ isset($image) ? asset(Storage::url($image)) :  asset('assets/media/users/default.jpg') }})"></div>

    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{ $attributes['add_title'] ? $attributes['add_title'] : 'Add Image' }}">
        <i class="fa fa-pen icon-sm text-muted"></i>
        <input type="file" name="{{ $attributes['name'] }}" accept=".png, .jpg, .jpeg"/>
        <input type="hidden" name="profile_avatar_remove"/>
    </label>

    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="{{ $attributes['remove_title'] ? $attributes['remove_title'] : 'Remove Picture' }}">
        <i class="ki ki-bold-close icon-xs text-muted"></i>
    </span>
</div>

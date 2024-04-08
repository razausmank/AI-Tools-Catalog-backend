<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title ">
            <h3 class="card-label">
                {{ $attributes['title'] }}
                @if ($attributes['subtitle'])
                    <small>{{ $attributes['subtitle'] }}</small>
                @endif
            </h3>
        </div>
        <div class="card-title">
            @if ($attributes['button_link'])
                <a href="{{ route($attributes['button_link']) }}"
                    class="btn btn-primary mr-2">{{ $attributes['button_text'] }}</a>
            @endif

            {{ $custom_element ?? '' }}
        </div>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    @if ($footer ?? '')
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>



{{-- Thats how you insert another component

 <x-slot name="title">
        message
    </x-slot> --}}

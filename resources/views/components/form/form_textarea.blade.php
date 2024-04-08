


<textarea class="form-control  {{ $attributes['class'] ?? ''}}"

@if( $attributes['name'] )
    name = "{{ $attributes['name']  }}"
@endif



@if( $attributes['id'] )
    id = "{{ $attributes['id']  }}"
@endif

@if( $attributes['placeholder'] )
    placeholder="{{ $attributes['placeholder'] }}"
@endif

    {{ $attributes['custom_attributes'] ?? ''}}
>
@if( $attributes['value'] )
{{ $attributes['value']  }}
@endif</textarea>


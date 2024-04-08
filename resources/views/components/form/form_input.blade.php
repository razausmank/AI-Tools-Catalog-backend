
<input class="form-control  {{ $attributes['class'] ?? ''}}"

    @if( $attributes['name'] )
        name = "{{ $attributes['name']  }}"
    @endif

    @if( $attributes['type'] )
        type = "{{ $attributes['type']  }}"
    @endif

    @if( $attributes['value'] )
        value = "{{ $attributes['value']  }}"
    @endif

    @if( $attributes['id'] )
        id = "{{ $attributes['id']  }}"
    @endif

    @if( $attributes['placeholder'] )
        placeholder="{{ $attributes['placeholder'] }}"
    @endif

        {{ $attributes['custom_attributes'] ?? ''}}
>

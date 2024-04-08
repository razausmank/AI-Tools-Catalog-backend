
<select class="form-control  {{ $attributes['class'] ?? ''}}"

@if( $attributes['name'] )
    name = "{{ $attributes['name']  }}"
@endif


@if( $attributes['id'] )
    id = "{{ $attributes['id']  }}"
@endif


    {{ $attributes['custom_attributes'] ?? ''}}
>
    @if( $model ?? '')

        @if( $attributes['dropdown_default_option'] || $attributes['dropdown_default_option_value'])
        <option  value="{{ $attributes['dropdown_default_option_value'] ?? ''}}">{{ $attributes['dropdown_default_option'] ?? '---'}}</option>
        @endif
        @foreach ($model as $item)
            <option value="{{ $item->id }}"
                @isset($modeledit)
                    {{ $modeledit == $item->id  ? 'selected' : '' }}
                @endisset >

                {{ $item->name }}
            </option>
        @endforeach
    @endif

    {{ $custom_element ?? '' }}

</select>


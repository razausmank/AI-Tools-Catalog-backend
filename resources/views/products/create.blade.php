<x-master title="New Product"
    :breadcrumbs="[ 'Products' => 'product.index', 'New Product' => 'product.create'  ]">

    <x-cards.basic-card title="New Product">
        {{-- @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif --}}
        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                    id="product_create_form">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Product's name" value="{{ old('name') }}"/>
            </x-form.form_group>

            <x-form.form_group label="Image" error="image">
                <x-form.form_image_input id="image_field" name="image" add_title="Add Product Image"
                    remove_title="Remove Product Image" />
            </x-form.form_group>

            <x-form.form_group label="Short Description" error="short_description">
                <x-form.form_textarea type="text" name="short_description" placeholder="Enter Product's Description" value="{{ old('short_description') }}"/>
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea id="description_tinymce" type="text" name="description"  custom_attributes='rows=10' placeholder="Enter Product's  Detailed Description"  value="{{ old('description') }}"/>
            </x-form.form_group>

            <x-form.form_group label="Pricing Model" error="pricing_model">

                <x-form.form_dropdown name="pricing_model" id="create_product_pricing_model_select">

                    <x-slot name="custom_element">
                        @foreach ($pricing_models as $pricing_model)
                            <option value="{{ $pricing_model }}"> {{ $pricing_model }} </option>
                        @endforeach
                    </x-slot>

                </x-form.form_dropdown>

            </x-form.form_group>

            <x-form.form_group label="URL" error="url">
                <x-form.form_input type="text" name="url" placeholder="Enter Product's URL" value="{{ old('url') }}" />
            </x-form.form_group>


            <x-form.form_group label="Categories" error="categories_id[]">

                <x-form.form_dropdown class="select_two" name="categories_id[]" id="create_product_categories_id_select" custom_attributes='data-control="select2" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple"'>

                    <x-slot name="custom_element">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </x-slot>

                </x-form.form_dropdown>

            </x-form.form_group>

            <hr  style="border-top: 1px solid rgba(0, 0, 0, 0.474);     margin-bottom: 2.75rem;"/>

            @foreach($socialMediaPlatforms as $platform)
                <x-form.form_group label="{{$platform}}" error="platform[{{strtolower($platform)}}_url]">
                    <x-form.form_input type="text" name="platform[{{strtolower($platform)}}_url]" placeholder="Enter Product's {{$platform}} URL" value="{{ old('platform.'.strtolower($platform).'_url') }}" />
                </x-form.form_group>
            @endforeach

        </x-form.form>


    </x-cards.basic-card>
    <x-slot name="scripts">
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
        <script>
            $( document ).ready(function() {
                $('.select_two').select2({
                        placeholder: "Select a recipe",
                        allowClear: true
                });

                var image_field = new KTImageInput('image_field');

                var options = {selector: "#description_tinymce", height : "480"};

                tinymce.init(options);

            });

        </script>
    </x-slot>

</x-master>


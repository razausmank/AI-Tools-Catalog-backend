<x-master title="Product Category"
    :breadcrumbs="[ 'Product Categories' => 'category.index', 'Edit Product Category' => '#'  ]">

    <x-cards.basic-card title="Edit Product Category">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data"
                    id="product_category_edit_form">
                    @csrf
                    @method('PATCH')
            </x-slot>

            <x-form.form_group label="Category Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Product Category name" value="{{ $category->name }}" />
            </x-form.form_group>


        </x-form.form>


    </x-cards.basic-card>

</x-master>

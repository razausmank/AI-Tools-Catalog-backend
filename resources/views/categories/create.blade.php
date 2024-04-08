<x-master title="Product Category"
    :breadcrumbs="[ 'Product Categories' => 'category.index', 'New Product Category' => 'category.create'  ]">

    <x-cards.basic-card title="New Product Category">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"
                    id="product_category_create_form">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Category Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Product Category name" />
            </x-form.form_group>


        </x-form.form>


    </x-cards.basic-card>

</x-master>

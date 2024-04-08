<x-master title="Product Categories" :breadcrumbs="[ 'Product Categories' => 'category.index']">

    <x-flash />

    <x-datatable.basic title="List of Product Categories" button_link="category.create"
        button_text="New Product Category" table_id="product_categories_list_datatable">
        <x-slot name="header">
            <th>Name</th>
            <th>No. of Products </th>
            <th>Created At</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->name}}</a>
                    </td>
                    <td>{{ $category->products->count() }}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td class="d-flex">
                        <a href="{{ route('category.edit', $category) }}"
                            class="btn btn-sm btn-primary mr-1" title="Edit">
                            Edit
                        </a>

                        <form action="{{ route('category.destroy', $category) }}" method="POST" class="delete_product_category_form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger " title="Delete" >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </x-slot>
    </x-datatable.basic>

    <x-slot name="scripts">
        <script>


              $('.delete_product_category_form').on('submit', function(e) {
                e.preventDefault();

                var form = this;
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });

            });
        </script>

    </x-slot>

</x-master>

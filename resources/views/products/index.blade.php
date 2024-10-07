<x-master title="Products" :breadcrumbs="[ 'Products' => 'product.index']">

    <x-flash />

    <x-datatable.basic title="List of Products" button_link="product.create"
        button_text="New Product" table_id="products_list_datatable">
        <x-slot name="header">
            <th>Name</th>
            <th>Pricing Model</th>
            <th>Published</th>
            <th>Categories</th>
            <th>Updated at</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->name}}</a>
                    </td>
                    <td>{{ $product->pricing_model }}</td>
                    <td>{{ $product->is_published ? 'Yes' : 'No'}}</td>
                    <td>
                        @foreach ($product->categories as $product_category)
                            <span class="badge badge-primary">{{$product_category->name}}</span>
                        @endforeach
                    </td>
                    <td>{{ $product->updated_at->diffForHumans() }}</td>
                    <td class="d-flex">
                        @if($product->is_published)

                            <form action="{{ route('product.unpublish', $product) }}" method="POST" class="product_publish_unpublish_form mr-1">
                                @csrf
                                @method('POST')
                                <button type="submit" class=" btn btn-sm btn-warning" title="Unpublish">
                                    Unpublish
                                </button>
                            </form>
                        @else
                            <form action="{{ route('product.publish', $product) }}" method="POST" class="product_publish_unpublish_form mr-1">
                                @csrf
                                @method('POST')
                                <button type="submit" class=" btn btn-sm btn-success" title="Publish">
                                    publish
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('product.edit', $product) }}"
                            class="btn btn-sm btn-clean btn-primary mr-1" title="Edit">
                            Edit
                        </a>

                        <form action="{{ route('product.destroy', $product) }}" method="POST" class="delete_product_form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn btn-sm btn-danger" title="Delete">
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


            $('.delete_product_form').on('submit', function(e) {
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

            $('.deal_publish_unpublish_form').on('submit', function(e) {
                e.preventDefault();

                var form = this;
                Swal.fire({
                    title: "Are you sure?",
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });

            });
        </script>

    </x-slot>

</x-master>

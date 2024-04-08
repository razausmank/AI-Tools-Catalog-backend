<x-master title="Pages" :breadcrumbs="[ 'Pages' => 'page.index' ]">

    <x-flash />

    <x-datatable.basic title="List of Pages" button_link="page.create" button_text="New Page"
        table_id="pages_list_datatable">
        <x-slot name="header">
            <th>Name</th>
            <th>Url</th>
            <th>Description</th>
            <th>Sort Order</th>
            <th>Parent Page Id</th>
            <th>Created At</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">

            @foreach ($pages as $page)

                <tr>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->url }}</td>
                    <td>{{ $page->description }}</td>
                    <td>{{ $page->sort_order }}</td>
                    <td>{{ $page->parent_page_id }}</td>
                    <td>{{ $page->created_at->diffForHumans() }}</td>
                    <td class="d-flex">
                        <a href="{{ route('page.edit', $page) }}" class="btn btn-sm btn-primary mr-1 " title="Edit">
                            Edit
                        </a>

                        <form action="{{ route('page.destroy', $page) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger " title="Delete">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </x-slot>
    </x-datatable.basic>


</x-master>

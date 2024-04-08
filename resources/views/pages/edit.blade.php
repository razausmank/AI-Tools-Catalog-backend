<x-master title="Pages" :breadcrumbs="[ 'Pages' => 'page.index', 'Edit Page' => '#'  ]">
    <x-cards.basic-card title="Update Page" >


        <x-form.form >
            <x-slot name="form_tag">
                <form action="{{ route('page.update', $page) }}" method="POST" id="page_edit_form">
                    @csrf
                    @method('PATCH')
            </x-slot>

            <x-form.form_group label="Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Page Name" value="{{ $page->name }}"/>
            </x-form.form_group>

            <x-form.form_group label="URL" error="url">

                <x-form.form_dropdown name="url" id="create_page_url_select" >

                    <x-slot name="custom_element">
                        <option value="#" {{ $page->url == "#" ? 'selected' : '' }}>No Route</option>
                        @foreach ($routes as $route)
                            <option value="{{ $route }}" {{ $page->url == $route ? 'selected' : '' }}> {{ $route}} </option>
                        @endforeach
                    </x-slot>

                </x-form.form_dropdown>

            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_input type="text" name="description" placeholder="Enter Page Description" value="{{ $page->description }}" />
            </x-form.form_group>

            <x-form.form_group label="Parent Page" error="parent_page_id">
                <x-form.form_dropdown name="parent_page_id" id="create_page_parent_page_select" :modeledit="$page->parent_page_id" :model="$pages"  dropdown_default_option="No Parent Page" />
            </x-form.form_group>

        </x-form.form>








    </x-cards.basic-card>

</x-master>

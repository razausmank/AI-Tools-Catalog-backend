@if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif

@if(Session::has('failure'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('failure') }}</p>
@endif

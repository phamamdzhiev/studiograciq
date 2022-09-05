@if (\Session::has('msg'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ \Session::get('msg') }}
    </div>
@endif

@if (\Session::has('msg'))
    <div class="alert">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif

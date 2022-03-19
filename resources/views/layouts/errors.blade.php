@if (isset($errors) AND count($errors) > 0)
    <div class="global-errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="global-errors">
        <ul>
            <li style="color: green;">
                {{ session('status') }}
            </li>
        </ul>
    </div>
@endif

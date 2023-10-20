@auth
<div>
        @php
        $name= auth()->user()->name;
        @endphp
        <a href="/">{{$name}}</a>
            <a href="/logout" class="btn btn-primary">Logout</a>
</div>
@endauth
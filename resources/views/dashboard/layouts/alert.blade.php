    @if ($errors->any())
        <div class="bg-danger">
            <h3>Something went wrong</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-white">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

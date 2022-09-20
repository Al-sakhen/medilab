<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.layouts.head')
</head>

<body>
    {{-- navabr --}}
    @include('home.layouts.navbar')


    {{-- content --}}
    @yield('content')


    {{-- footer --}}
    @include('home.layouts.footer')
</body>

</html>

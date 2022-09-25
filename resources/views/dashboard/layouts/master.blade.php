<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layouts.head')

    @stack('styles')
    <style>
        #logout-form:hover {
            cursor: pointer;
        }
    </style>
    @vite(['resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('dashboard.layouts.navbar')
        <!-- /.navbar -->

        @include('dashboard.layouts.sidebar')

        <div class="content-wrapper">
            @include('dashboard.layouts.breadcrumb')

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('dashboard.layouts.footer')
    </div>



    <!-- jQuery -->
    <script src="{{  asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{  asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{  asset('dashboard/dist/js/adminlte.min.js')}}"></script>

    @stack('scripts')

    <script>
        $('#logout-icon').on('click' , function(){
            $('#logout-form').submit();
        })
    </script>
</body>

</html>

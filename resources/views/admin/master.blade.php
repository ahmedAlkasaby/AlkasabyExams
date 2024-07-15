<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('admin.layouts.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')


        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">

                    @yield('contect_header')
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    {{-- <div class="row"> --}}
                        @yield('contect_body')
                    {{-- </div> --}}
                </div>
            </div>

        </div>


        @include('admin.layouts.footer')
    </div>
    @include('admin.layouts.scripts')
</body>

</html>

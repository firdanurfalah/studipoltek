<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body class="alt-menu sidebar">
    {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}
    @include('admin.layout.navbar')


    <!--  BEGIN MAIN CONTAINER  -->
 

        @include('admin.layout.sidebar')


        @yield('content')


       
    <!-- END MAIN CONTAINER -->

    @include('admin.layout.script')
  

</body>

</html>
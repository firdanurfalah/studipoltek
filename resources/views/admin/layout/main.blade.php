<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body class="alt-menu sidebar">
    {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}
    @include('admin.layout.navbar')


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>
 

        @include('admin.layout.sidebar')


        @yield('content')

    </div>
       
    <!-- END MAIN CONTAINER -->

    @include('admin.layout.script')
  

</body>

</html>
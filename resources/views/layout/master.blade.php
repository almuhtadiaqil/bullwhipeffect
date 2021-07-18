<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Informasi Distribusi - CV Rabbani Asysa</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    @include('includes.style')
</head>

<body class="theme-red">
    @include('includes.loader')
    @include('includes.searchbar')
    @include('includes.navbar')
    @if (Auth::user()->role == 'Distributor')
        @include('includes.distributor.sidebar')
    @elseif (Auth::user()->role == 'Retailer')
        @include('includes.retailer.sidebar')
    @elseif (Auth::user()->role == 'Admin')
        @include('includes.admin.sidebar')
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                @yield('content')
            </div>
        </div>
    </section>
    @include('includes.footer')
    @include('includes.script')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    @vite(['resources/css/client/bootstrap.min.css', 'resources/icon/font/bootstrap-icons.css', 'resources/css/client/style.css'])
    <title> @yield('title')</title>

<body>

    @include('client.header')

    @yield('content')

    @include('client.footer')

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @stack('modal')
    @vite(['resources/js/client/bootstrap.bundle.js', 'resources/js/client/main.js'])

</body>

</html>

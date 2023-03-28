<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page.title')</title>


</head>
<body class="antialiased">
@include('includes.header')


<main>

    @yield('content')

</main>
@include('includes.footer')
</body>
</html>

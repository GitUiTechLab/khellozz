<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Khellozz</title>
    @include('links.css')
</head>

<body>
@include('partials.header')
@yield('main-content')
@include('partials.footer')

@include('links.js')
</body>

</html>
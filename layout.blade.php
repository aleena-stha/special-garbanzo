<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include('partials.header')

    <!-- dot is used in place of / slash for changing the path in balde or we can use slash as well -->

    <section>
        @yield('content')
        @yield('content2')
        @yield('new')
    </section>

    <footer>
        This is footer.
    </footer>
</body>
</html>
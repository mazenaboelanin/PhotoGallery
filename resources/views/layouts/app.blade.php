<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Photoshow</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @include('inc.navbar')
        <br><br>
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>


    </body>
</html>

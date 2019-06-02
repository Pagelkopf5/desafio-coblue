<html>
    <head>
        <title>Teste - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href={{asset("css/style.css")}}>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        @yield('head')
    </head>
    <body>
        <div class="conteudo">
            @yield('content')
        </div>
    </body>
</html>

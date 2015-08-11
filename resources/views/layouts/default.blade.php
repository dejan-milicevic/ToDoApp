<!DOCTYPE html>
<html>
    <head>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            html, body {
                height: 100%;
            }
            body,
            header,
            footer,
            h1 {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: bold;
                font-family: 'Lato';
            }
            label {
                display: inline-block;
                width: 150px;
            }
            input[type='text'],
            input[type='password']{
                width: 436px;
            }
            .container {
                padding: 20px;
                padding-top: 100px;
                display: table-cell;
             }
            .content {
                font-size: 1.5em;
                text-align: left;
                display: inline-block;
                width:100%;
            }
            .nav.navbar-nav {
                font-size: 20px;
            }
        </style>

        @yield('title')

    </head>
    <body>

        <header>
            @include('includes.header')
        </header>

        <div class="container">
            <div class="content">

                @yield('content')

            </div>
        </div>

        <footer>
            @include('includes.footer')
        </footer>

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{!! asset('js/vivify-script.js') !!}"></script>
    </body>
</html>

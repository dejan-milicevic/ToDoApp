<!DOCTYPE html>
<html>
    <head>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{!! asset('/bower_components/bootstrap/dist/css/bootstrap.css') !!}">
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
            .logreg input[type='text'],
            .logreg input[type='password']{
                width: 436px;
            }
            button:disabled {
                color: lightgrey;
            }
            select.repeat:disabled {
                color: lightgrey;
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
            .delButton {
                text-align: right;
            }
            .table {
                padding-bottom: 200px;
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

        <script src="{!! asset('/bower_components/angular/angular.min.js') !!}"></script>
        <script src="{!! asset('/bower_components/angular-route/angular-route.min.js') !!}"></script>
        <script src="{!! asset('/bower_components/angular-bootstrap/ui-bootstrap.min.js') !!}"></script>
        <script src="{!! asset('/js/angular-script.js') !!}"></script>
    </body>
</html>

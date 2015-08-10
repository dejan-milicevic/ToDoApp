<!DOCTYPE html>
<html>
    <head>
        
        @yield('title')

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            label {
                display: inline-block;
                width: 150px;
            }
            input[type='text'],
            input[type='password']{
                width: 307px;
            }
            .container {
                padding: 20px;
                display: table-cell;
            }
            .content {
                font-size: 1.5em;
                text-align: left;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">

                @yield('content')

            </div>
        </div>
    </body>
</html>

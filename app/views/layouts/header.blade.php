<html>
    <head>
        <meta charset="utf-8">
        {{ HTML::script('bootstrap/dist/js/bootstrap.min.js') }}
        {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') }}
        <!-- TODO Change jquery to local table-->
        {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
        
        <!-- CSS are placed here -->
        {{ HTML::style('bootstrap/dist/css/bootstrap.min.css') }}
        @yield('styles')
        <title>QueueServer</title>
    </head>
    <body>Header
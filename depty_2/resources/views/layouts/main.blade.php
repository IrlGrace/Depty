<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--CSS-->
        <link href="{{asset('css/homedesign.css')}}" rel="stylesheet" type="text/css" />
        
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container-fluid">
            @include('includes.menuhome')
            
            @yield('content')
            
        </div>
        
    </body>
</html>
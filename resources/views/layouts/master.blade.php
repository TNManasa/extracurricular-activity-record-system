<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap-theme.min.css') }}">
    <title>@yield('title')</title>

    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>

</head>
<body>
<div class="container" style="padding: 20px">
    @yield('content')
</div>

@yield('end_body')
</body>
</html>
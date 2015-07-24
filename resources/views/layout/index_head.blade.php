<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
    <title>Laravel</title>

    <link href="/css/amazeui.min.css" rel="stylesheet">
    <link rel="icon" href="/image/icon.png'" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" href="/image/icon.png">
    <link rel="shortcut icon" href="/image/icon.png" type="image/x-icon" />

    <!-- Fonts -->
    {{--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>--}}
    <script src="/js/lib/jquery/jquery-1.11.3.min.js"></script>
    <script src="/js/lib/amazeui/amazeui.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="padding-bottom: 49px;">

@yield('header')
@yield('content')
@yield('bottom_navbar')
@yield('footer')

</body>
</html>

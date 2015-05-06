<!DOCTYPE HTML>
<html>
<head>
    <title>FTC's Notebook</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/carousel.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body class="homepage">

    <!-- Header -->
    <div id="header-wrapper">
        <div id="header" class="container">

            <!-- Logo -->
            <h1 id="logo"><a href="/home">Fortune Cat's Notebook</a></h1>
            @if(Auth::check())
                <p>Welcome! <a href="{{url('dashboard')}}">{{Auth::user()->name}}</a>. Click to<a href="{{url('logout')}}"> Logout</a></p>
            @else
                <p>Hello, Guest. Want to <a href="/login">Login</a> or <a href="/signup">Sign Up</a> ?</p>
            @endif
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a class="icon fa-home" href="/home"><span>Home</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    @yield('content')
</body>
<footer>
    <div id="copyright" class="container">
        <ul class="links">
            <li>&copy; Anpin Shen. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer>
</html>
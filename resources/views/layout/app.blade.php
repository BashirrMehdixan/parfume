<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('front/plugins/glide/glide.core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/glide/glide.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <title>RT Parfume</title>
</head>
<body>
<header>
    <div class="container">
        <div class="navbar">
            <a href="{{ route('index') }}" class="logo">
                <img src="{{ asset('front/images/logo.png') }}" alt="">
            </a>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('brands.index') }}" class="nav-link">
                            Brands
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link">
                            Products
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="right-nav">

            </div>
        </div>
    </div>
</header>
@yield('content')
<script src="{{ asset('front/plugins/glide/glide.min.js') }}"></script>
<script src="{{ asset('front/js/slide.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
</body>
</html>

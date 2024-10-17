<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    @vite([])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('storage/'.$about->favicon) }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
                <img src="{{ asset('storage/'.$about->logo) }}" title="{{ $about->name }}" alt="{{ $about->name }}">
            </a>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link">
                            {{ __('home') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('brands.index') }}" class="nav-link">
                            {{ __('brands') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link">
                            {{ __('products') }}
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="right-nav">
                <div class="lang_box">
                    <button class="btn active_lang">
                        <i data-lucide="languages"></i>
                        {{ LaravelLocalization::getCurrentLocale() }}
                    </button>
                    <ul class="lang_items">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="lang_item">
                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="flex_item">
            <div class="w_full w_md_50 w_lg_33">
                <ul class="footer_widget">
                    <li class="footer_logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('storage/'.$about->logo) }}" alt="">
                        </a>
                    </li>
                    <li>
                        <h4 class="footer_title">
                            Subscribe to Our Newsletter:
                        </h4>
                        <p class="inner_text">
                            Receive Updates on New Arrivals and Special Promotions!
                        </p>
                    </li>
                    <li>
                        <form action="">
                            <input type="text" class="form_control" placeholder="Your email here">
                        </form>
                    </li>
                    <li>
                        <ul class="social_networks">
                            <li class="twitter">
                                <a href="">
                                    <i data-lucide="twitter"></i>
                                </a>
                            </li>
                            <li class="facebook">
                                <a href="">
                                    <i data-lucide="facebook"></i>
                                </a>
                            </li>
                            <li class="linkedin">
                                <a href="">
                                    <i data-lucide="linkedin"></i>
                                </a>
                            </li>
                            <li class="instagram">
                                <a href="">
                                    <i data-lucide="instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="{{ asset('front/plugins/glide/glide.min.js') }}"></script>
<script src="{{ asset('front/js/slide.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
</body>
</html>

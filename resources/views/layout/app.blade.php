<!doctype html>
<html lang="{{ session('locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('storage/'.$about->favicon) }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('front/plugins/material_design_icons/materialdesignicons.min.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css"
          integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('front/plugins/glide/glide.core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/glide/glide.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <title>RT Parfume</title>
</head>
<body>
<header>
    <div class="container">
        <div class="overlay"></div>
        <div class="navbar">
            <a href="{{ route('index') }}" class="logo">
                <img src="{{ asset('storage/'.$about->logo) }}" title="{{ $about->name }}" alt="{{ $about->name }}">
            </a>
            <nav>
                <ul class="nav-menu">
                    <li class="mobile_header">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('storage/'.$about->logo) }}" alt="{{ $about->name }}">
                            </a>
                        </div>
                        <button class="btn btn_close">
                            <i data-lucide="circle-x"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link">
                            {{ __('home') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('brands_'.session('locale')) }}" class="nav-link">
                            {{ __('brands') }}
                        </a>
                    </li>
                    @foreach($collections as $collection)
                        <li class="nav-item">
                            <a href="{{ route('products_category_'.session('locale'), $collection->slug) }}"
                               class="nav-link">
                                {{ $collection->name }}
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="{{ route('contact_'.session('locale')) }}" class="nav-link">
                            {{ __('contact') }}
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="right-nav">
                <div class="lang_box">
                    <button class="btn active_lang">
                        <span class="mdi mdi-translate"></span>
                        {{ session('locale') }}
                    </button>
                    <ul class="lang_items">
                        @foreach($langs as $lang)
                            <li class="lang_item">
                                <a rel="alternate"
                                   href="{{ $lang['url'] }}">
                                    {{ $lang['code'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <button class="btn btn_mobile">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="footer_top">
            <div class="footer_logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('storage/'.$about->logo) }}" alt="">
                </a>
            </div>
            <div class="flex_item">
                <div class="w_full w_md_50 w_lg_33">
                    <ul class="footer_widget">
                        <li>
                            <h4 class="footer_title fs_24">
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
                <div class="w_full w_md_50 w_lg_66">
                    <div class="flex_item">
                        <div class="w_full w_md_50 w_lg_25">
                            <div class="footer_widget">
                                <h5 class="footer_title">
                                    {{ __('brands') }}
                                </h5>
                                <ul class="footer_list">
                                    @foreach($brands as $brand)
                                        <li>
                                            <a href="{{ route('brands_show_'.session('locale'), $brand->slug) }}">
                                                {{ $brand->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="w_full w_md_50 w_lg_25">
                            <div class="footer_widget">
                                <h5 class="footer_title">
                                    Shopping
                                </h5>
                                <ul class="footer_list">
                                    <li>
                                        <a href="{{ route('index') }}">
                                            Payments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">
                                            Delivery options
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">
                                            Buyer protection
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w_full w_md_50 w_lg_25">
                            <div class="footer_widget">
                                <h5 class="footer_title">
                                    Customer care
                                </h5>
                                <ul class="footer_list">
                                    <li>
                                        <a href="{{ route('index') }}">
                                            Help center
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">
                                            Terms & Conditions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">
                                            Privacy policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">
                                            returns and refund
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">
                                            survey & feedback
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w_full w_md_50 w_lg_25">
                            <div class="footer_widget">
                                <h5 class="footer_title">
                                    {{ __('pages') }}
                                </h5>
                                <ul class="footer_list">
                                    <li>
                                        <a href="{{ route('index') }}">
                                            {{ __('about_us') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('brands_'.session('locale')) }}">
                                            {{ __('brands') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact_'.session('locale')) }}">
                                            {{ __('contact') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright text_center">
            &copy 2024 RT Parfume Inc. All rights reserved
        </div>
    </div>
</footer>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="{{ asset('front/plugins/glide/glide.min.js') }}"></script>
<script src="{{ asset('front/js/slide.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="{{ session('locale') }}">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="{{ asset('storage/' . $about->favicon) }}" type="image/x-icon">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
			integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="{{ asset('front/fonts/material_design_icons/materialdesignicons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/plugins/glide/glide.core.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/plugins/glide/glide.theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
		<title>RT Parfume</title>
	</head>

	<body>
		<div class="modal search_modal">
			<div class="overlay">
				<div class="modal_body">
					<div class="container">
						<form action="{{ route('search_' . session('locale')) }}" method="GET">
							<div class="search_form">
								<input type="text" name="search" class="form_control">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<header>
			<div class="container">
				<div class="overlay"></div>
				<div class="navbar">
					<a href="{{ route('index') }}" class="logo">
						<img src="{{ asset('storage/' . $about->logo) }}" title="{{ $about->name }}" alt="{{ $about->name }}">
					</a>
					<nav>
						<ul class="nav-menu">
							<li class="mobile_header">
								<div class="logo">
									<a href="{{ route('index') }}">
										<img src="{{ asset('storage/' . $about->logo) }}" alt="{{ $about->name }}">
									</a>
								</div>
								<button class="btn btn_close">
									<span class="mdi mdi-close"></span>
								</button>
							</li>
							<li class="nav-item">
								<a href="{{ route('index') }}" class="nav-link">
									{{ __('home') }}
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('brands_' . session('locale')) }}" class="nav-link">
									{{ __('brands') }}
								</a>
							</li>
							@foreach ($collections as $collection)
								<li class="nav-item">
									<a href="{{ route('products_category_' . session('locale'), $collection->slug) }}" class="nav-link">
										{{ $collection->name }}
									</a>
								</li>
							@endforeach
							<li class="nav-item">
								<a href="{{ route('contact_' . session('locale')) }}" class="nav-link">
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
								@foreach ($langs as $lang)
									<li class="lang_item">
										<a rel="alternate" href="{{ $lang['url'] }}">
											{{ $lang['code'] }}
										</a>
									</li>
								@endforeach
							</ul>
						</div>
						<button class="btn btn_main btn_search">
							<span class="mdi mdi-magnify"></span>
						</button>
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
							<img src="{{ asset('storage/' . $about->logo) }}" alt="">
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
										@isset($contact->instagram)
											<li class="instagram">
												<a href="{{ $contact->instagram }}">
													<span class="mdi mdi-instagram"></span>
												</a>
											</li>
										@endisset
										@isset($contact->tiktok)
											<li class="twitter">
												<a href="{{ $contact->tiktok }}">
													<i class="fa-brands fa-tiktok"></i>
												</a>
											</li>
										@endisset
										@isset($contact->twitter)
											<li class="twitter">
												<a href="{{ $contact->twitter }}">
													<span class="mdi mdi-twitter"></span>
												</a>
											</li>
										@endisset
										@isset($contact->facebook)
											<li class="facebook">
												<a href="{{ $contact->facebook }}">
													<span class="mdi mdi-facebook"></span>
												</a>
											</li>
										@endisset
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
											@foreach ($brands as $brand)
												<li>
													<a href="{{ route('brands_show_' . session('locale'), $brand->slug) }}">
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
											{{ __('main.collection') }}
										</h5>
										<ul class="footer_list">
											@foreach ($collections as $collection)
												<li>
													<a href="{{ route('products_category_' . session('locale'), $collection->slug) }}">
														{{ $collection->name }}
													</a>
												</li>
											@endforeach
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
												<a href="{{ route('brands_' . session('locale')) }}">
													{{ __('brands') }}
												</a>
											</li>
											<li>
												<a href="{{ route('contact_' . session('locale')) }}">
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

@extends('layout.app')
@section('content')
    {{-- Banner start --}}
    <section class="banner_section">
        <div class="banner_glide glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @if($slides->count() > 0)
                        @foreach($slides as $slide)
                            <li class="glide__slide">
                                <div class="banner_block"
                                     style="background-image: url('{{ asset('storage/'.$slide->image) }}')">
                                    <div class="container">
                                        <div class="flex_item">
                                            <div class="w-full w_lg_66">
                                                <h2 class="banner_title">
                                                    {{$slide->title}}
                                                </h2>
                                                <div class="inner_text">
                                                    {!! $slide->description !!}
                                                </div>
                                                @if($slide->title && $slide->description)
                                                    <a href="{{route('products.index')}}" class="btn btn_main">
                                                        Shop now
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </section>
    {{-- Banner end --}}

    {{-- About start --}}
    <section class="about_section section_padding">
        <div class="about_box">
            <div class="overlay"></div>
            <div class="container">
                <div class="flex_item">
                    <div class="w_full w_lg_66 mx-auto text_center">
                        <h4 class="section_title">
                            Welcome to Local Face
                        </h4>
                        <p class="inner_text">
                            Welcome to Local Face Perfumes, where the spirit of victory and triumph come alive through
                            scents that empower
                            and inspire. Our curated collection, aptly named "Victory Scented," is a celebration of
                            success and elegance,
                            designed to unleash your victorious essence. Indulge in the sweet taste of triumph with
                            captivating fragrances
                            that tell the tale of your achievements. At Local Face, we believe that every victory
                            deserves a signature
                            scent, and we are dedicated to providing unforgettable fragrances that elevate your spirit
                            and empower your
                            journey.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- About end --}}

    {{-- Values start --}}
    <section class="values_section section_padding">
        <div class="flex_item">
            <div class="w_full w_lg_50">
                <div class="section_img">
                    <img src="{{ asset('front/images/section_img/img-1.png') }}" alt="">
                </div>
            </div>
            <div class="w_full w_lg_50">
                <div class="content_box">
                    <h4 class="section_title text_center">
                        Our Values
                    </h4>
                    <p class="inner_text">
                        At Local Face, our perfume retail store is built on a foundation of passion and authenticity. We
                        believe in
                        celebrating the individuality of every customer, providing a diverse collection of scents that
                        resonate with their
                        unique personality and style. Our dedicated team of fragrance enthusiasts is committed to
                        creating a welcoming and
                        inclusive environment, where connections are forged, and inspiration thrives.
                    </p>
                    <p class="inner_text">
                        Embracing sustainability and continuous learning, Local Face strives to be more than just a
                        shopping destination; we
                        are a community that inspires and empowers individuals on their fragrance journey.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- Values end --}}

    {{-- Best selling start --}}
    <section class="best_selling section_padding">
        <div class="container">
            <h5 class="section_title text_center">
                Best selling products
            </h5>
            <div class="best_selling glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @if($bestSell->count() > 0)
                            @foreach($bestSell as $product)
                                <li class="glide__slide">
                                    <x-product-card
                                        :url=" route('products.show',['slug'=>$product->slug, 'category'=>$product->collection->slug]) "
                                        :product="$product"/>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                        <i data-lucide="chevron-left" color="rgba(var(--color_main), 1)"></i>
                    </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                        <i data-lucide="chevron-right" color="rgba(var(--color_main), 1)"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- Best selling end --}}

    <section class="home_collections section_padding">
        <div class="container">
            <h4 class="section_title text_center">
                Our collection
            </h4>
            <div class="flex_item">
                @forelse($brands as $brand)
                    <div class="collection_row">
                        <x-brand-card :brand="$brand"/>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    <section class="sale_section">
        <div class="container">
            <div class="sale_item">
                <div class="w_full w_lg_50">
                    <h2 class="banner_title">
                        Perfume Year-End Sale! Up to 50% OFF
                    </h2>
                    <p class="inner_text">
                        Discover an exquisite collection of premium perfumes at unbelievable prices during our exclusive
                        Perfume
                        Sale!
                    </p>
{{--                    <a href="{{ route('products.index') }}" class="btn btn_main">--}}
{{--                        Know more--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </section>


    @if($blogs->count() > 0)
        <section class="articles_section">
            <div class="container">
                <h2 class="section_title text_center">
                    Latest articles
                </h2>
                <div class="flex_item">
                    @foreach($blogs as $blog)
                        <div class="w_full w_md_50 w_lg_33">
                            <x-blog-component :blog="$blog"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

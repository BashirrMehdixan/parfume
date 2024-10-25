@extends('layout.app')
@section('content')
    <div class="container">
        {{--        {{ Breadcrumbs::render('product', $product) }}--}}
    </div>
    <section class="section_padding">
        <div class="container">
            <div class="flex_item items_center">
                <div class="w_full w_lg_40">
                    <div class="glide detail_glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                @foreach($product->image as $image)
                                    <li class="glide__slide">
                                        <img src="{{ asset('storage/'.$image) }}" alt="{{ $product->name }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            @foreach($product->image as $image)
                                <button class="glide__bullet" data-glide-dir="={{ $loop->index }}">
                                    <img src="{{ asset('storage/'.$image) }}" alt="{{ $product->name }}">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w_full w_lg_60">
                    <div class="detail_content">
                        <h4 class="product_title">
                            {{ $product->name }}
                        </h4>
                        <div class="inner_text">
                            {!! $product->description !!}
                        </div>
                        <div class="product_price_wrap">
                            <div @class(["price", "old_price"=>$product->discount])>
                                $ <span>{{ $product->price }}</span>
                            </div>
                            @if($product->discount)
                                <div class="price discount">
                                    $ {{ Illuminate\Support\Number::format($product->price - ($product->price * $product->discount/100), 2) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex items_center actions">
                            <div class="flex items_center left_actions">
                                <button class="btn btn_actions btn_decrement">
                                    <i data-lucide="minus"></i>
                                </button>
                                <input type="number" value="1" min="1" class="form_control count_control"
                                       name="product_count">
                                <button class="btn btn_actions btn_increment">
                                    <i data-lucide="plus"></i>
                                </button>
                            </div>
                            <div class="right_actions">
                                <button class="btn btn_heart">
                                    <i data-lucide="heart"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn_main btn_add_cart">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="similar_products section_padding">
        <div class="container">
            <h4 class="section_title">
                Similar perfumes
            </h4>
            <div class="best_selling glide pt_0">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @if($products->count() > 0)
                            @foreach($products as $product)
                                <li class="glide__slide">
                                    <x-product-card
                                        :url="route('products.show', ['slug'=>$product->slug, 'category'=>$product->collection->slug])"
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
@endsection

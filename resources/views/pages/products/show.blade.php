@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('product', $product) }}
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
                    <h4 class="product_title">
                        {{ $product->name }}
                    </h4>
                    <div class="inner_text">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

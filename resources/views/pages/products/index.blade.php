@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('products') }}
    </div>
    <section class="products_section section_padding">
        <div class="container">
            <ul class="filter_box flex_item">
                <li>
                    <form action="">
                        <ul class="filter_list">
                            <li>
                                {{ __('filter_by') }}:
                            </li>
                            <li>
                                <ul class="filter_item">
                                    <span class="active_filter">{{ __('gender') }}</span>
                                    <div class="filter_buttons">
                                        <button class="btn btn_filter" data-gender="male">
                                            {{ __('male') }}
                                        </button>
                                        <button class="btn btn_filter" data-gender="female">
                                            {{ __('female') }}
                                        </button>
                                        <button class="btn btn_filter" data-gender="unisex">
                                            {{ __('unisex') }}
                                        </button>
                                    </div>
                                </ul>
                            </li>
                            <li>
                                <ul class="filter_item">
                                    <span class="active_filter">
                                        {{ __('brands') }}
                                    </span>
                                    @foreach($brands as $brand)
                                        <div class="filter_buttons">
                                            <button class="btn btn_filter" data-brand="{{$brand->id}}">
                                                {{ $brand->name }}
                                            </button>
                                        </div>
                                    @endforeach
                                </ul>
                            </li>
                            <button class="btn filter_submit">
                                {{ __('submit') }}
                            </button>
                        </ul>
                    </form>
                </li>
                <li class="filter_list">
                    <form action="">
                        <ul class="filter_item">
                            <span class="active_filter">{{ __('sort_by') }}</span>
                            <div class="filter_buttons">
                                <button class="btn btn_filter" data-gender="male">
                                    {{ __('male') }}
                                </button>
                                <button class="btn btn_filter" data-gender="female">
                                    {{ __('female') }}
                                </button>
                                <button class="btn btn_filter" data-gender="unisex">
                                    {{ __('unisex') }}
                                </button>
                            </div>
                        </ul>
                    </form>
                </li>
            </ul>
            <div class="flex_item gap_30">
                @if($products->count())
                    @foreach($products as $product)
                        <div class="w_full w_lg_25">
                            <x-product-card :url="route('products.show', $product->slug)" :product="$product"/>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>
@endsection

@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('products') }}
    </div>
    <section class="products_section section_padding">
        <div class="container">
            <ul class="filter_box">
                <li>
                    Filter by
                </li>
                <li>
                    <form action="">
                        <ul class="filter_list">
                            <li>
                                <ul class="filter_item">
                                    <span class="active_filter">Gender</span>
                                    <div class="filter_buttons">
                                        <button class="btn btn_filter" data-gender="male">
                                            Male
                                        </button>
                                        <button class="btn btn_filter" data-gender="female">
                                            Female
                                        </button>
                                        <button class="btn btn_filter" data-gender="unisex">
                                            Unisex
                                        </button>
                                    </div>
                                </ul>
                            </li>
                            <li>
                                <ul class="filter_item">
                                    <span class="active_filter">Brands</span>
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
                                Submit
                            </button>
                        </ul>
                    </form>
                </li>
            </ul>
            <div class="flex_item gap_30">
                @if($products->count())
                    @foreach($products as $product)
                        <div class="w_full w_25">
                            <x-product-card :product="$product"/>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>
@endsection

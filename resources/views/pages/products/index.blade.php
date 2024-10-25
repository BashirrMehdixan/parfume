@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('products', $category) }}
    </div>
    <section class="products_section section_padding">
        <div class="container">
            <ul class="filter_box flex_item">
                <li>
                    <form action="{{ route('products_filter_'.session('locale'), ['category'=>$category->slug]) }}"
                          method="GET">
                        <ul class="filter_list">
                            <li>
                                {{ __('filter_by') }}:
                            </li>
                            <li>
                                <select name="gender">
                                    <option
                                        value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>{{ __('all') }}</option>
                                    <option
                                        value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>{{ __('male') }}</option>
                                    <option
                                        value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>{{ __('female') }}</option>
                                    <option
                                        value="unisex" {{ request('gender') == 'unisex' ? 'selected' : '' }}>{{ __('unisex') }}</option>
                                </select>
                            </li>
                            <li>
                                <select name="brand">
                                    <option
                                        value="all" {{ request('brand') == 'all' ? 'selected' : '' }}>{{ __('all') }}</option>
                                    @foreach($brands as $brand)
                                        <option
                                            value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </li>
                            <button type="submit" class="btn filter_submit">{{ __('submit') }}</button>
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
                            <x-product-card
                                :url="route('products_show_'.session('locale'), ['slug'=>$product->slug, 'category'=>$product->collection->slug])"
                                :product="$product"/>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>
@endsection

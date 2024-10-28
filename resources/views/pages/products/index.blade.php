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
                                <select name="gender" class="form_control select_control">
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
                                <select name="brand" class="form_control select_control">
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
                            <button type="submit" class="btn btn_main filter_submit">{{ __('submit') }}</button>
                        </ul>
                    </form>
                </li>
                <li class="filter_list">
                    <form action="{{ route('products_category_'.session('locale'), $category->slug) }}" method="GET">
                        <ul class="filter_item">
                            <span class="active_filter">{{ __('sort_by') }}</span>
                            <select name="sortBy" class="form_control select_control" onchange="this.form.submit()">
                                <option value="new" {{ request('sortBy') == 'new' ? 'selected' : '' }}>
                                    {{ __('new') }}
                                </option>
                                <option value="old" {{ request('sortBy') == 'old' ? 'selected' : '' }}>
                                    {{ __('old') }}
                                </option>
                                <option value="alph_asc" {{ request('sortBy') == 'alph_asc' ? 'selected' : '' }}>
                                    {{ __('alphabet') }} Z-A
                                </option>
                                <option value="alph_desc" {{ request('sortBy') == 'alph_desc' ? 'selected' : '' }}>
                                    {{ __('alphabet') }} A-Z
                                </option>
                                <option value="low_order" {{ request('sortBy') == 'low_order' ? 'selected' : '' }}>
                                    {{ __('cheapest') }}
                                </option>
                                <option value="high_order" {{ request('sortBy') == 'high_order' ? 'selected' : '' }}>
                                    {{ __('expensive') }}
                                </option>
                            </select>
                        </ul>
                    </form>
                </li>
            </ul>
            <div class="flex_item gap_30">
                @isset($products)
                    @if($products->count())
                        @foreach($products as $product)
                            <div class="w_full w_lg_25">
                                <x-product-card
                                    :url="route('products_show_'.session('locale'), ['slug'=>$product->slug, 'category'=>$product->collection->slug])"
                                    :product="$product"/>
                            </div>
                        @endforeach
                    @endif
                @endisset
            </div>
        </div>
    </section>
@endsection

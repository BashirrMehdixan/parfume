@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('brand', $brand) }}
    </div>
    <section class="section_padding">
        <div class="container">
            <div class="flex_item">
                @foreach($products as $product)
                    <div class="w_full w_md_50 w_lg_25">
                        <x-product-card
                            :url="route('products_show_'.session('locale'), ['slug'=>$product->slug, 'category'=>$product->collection->slug])"
                            :product="$product"/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

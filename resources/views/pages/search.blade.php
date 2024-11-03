@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('search') }}
    </div>
    <section class="section_padding search_section">
        <div class="container">
            <div class="flex_item">
                @forelse($products as $product)
                    <div class="w_full w_md_50 w_lg_33">
                        <x-product-card
                            :url="route('products_show_'.session('locale'), ['slug'=>$product->slug, 'category'=>$product->collection->slug])"
                            :product="$product"/>
                    </div>
                @empty
                    <h4 class="section_title">
                        Not found
                    </h4>
                @endforelse
            </div>
        </div>
    </section>
@endsection

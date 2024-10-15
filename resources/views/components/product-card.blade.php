@props(['product'])
<div class="product_card">
    <div class="thumbnail">
        <a href="{{ route('products.show', $product->slug) }}">
            @if($product->image)
                <img src="{{asset('storage/'.$product->image[0])}}" alt="{{$product->name}}">
            @endif
        </a>
    </div>
    <div class="card_body">
        <a href="{{ route('products.show', $product->slug) }}">
            <h5 class="p_title">
                {{$product->name}}
            </h5>
        </a>
        <div class="price_body">
            <div class="p_price">
                <span class="currency">$</span>
                <span>{{$product->price}}</span>
            </div>
            <span>
                {{$product->quantity}} ml
            </span>
        </div>
    </div>
</div>

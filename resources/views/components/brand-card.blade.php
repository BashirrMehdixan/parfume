@props(['brand'])
<a href="{{ route('brands.show', $brand->slug) }}">
    <div class="collection_item"
         data-bg="{{ asset('storage/'.$brand->image) }}">
        <div class="overlay"></div>
        <h5 class="brand_title">
            {{ $brand->name }}
        </h5>
    </div>
</a>

@props(['brand'])
<a href="{{ route('brands.show', $brand->slug) }}">
    <div class="collection_item"
         data-bg="{{ asset('storage/'.$brand->image) }}">
        {{ $brand->name }}
    </div>
</a>

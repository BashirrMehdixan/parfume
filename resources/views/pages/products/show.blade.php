@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('product', $product) }}
    </div>
@endsection

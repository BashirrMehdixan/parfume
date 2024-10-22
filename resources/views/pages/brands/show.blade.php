@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('brand', $brand) }}
    </div>
@endsection

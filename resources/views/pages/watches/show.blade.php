@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('watch', $watch) }}
    </div>
@endsection

@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('watches') }}
        @foreach($watches as $watch)
            <a href="{{ route('watches.show', $watch->slug) }}">
                {{ $watch->name }}
            </a>
        @endforeach
    </div>>
@endsection

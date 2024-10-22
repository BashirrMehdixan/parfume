@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('watches') }}
    </div>
    <section class="section_padding">
        <div class="container">
            <div class="flex_item">
                @foreach($watches as $watch)
                    <div class="w_full w_md_50 w_lg_25">
                        <x-product-card :url="route('watches.show', $watch->slug)" :product="$watch"/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

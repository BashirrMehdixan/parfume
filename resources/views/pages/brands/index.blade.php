@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('brands') }}
    </div>
    <section class="section_padding">
        <div class="container">
            <div class="flex_item">
                @foreach($brands as $brand)
                    <div class="w_full w_md_50 w_lg_33">
                        <x-brand-card :brand="$brand"/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

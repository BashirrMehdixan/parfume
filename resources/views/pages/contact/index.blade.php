@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('contact') }}
    </div>
    <section class="section_padding">
        <div class="container">
            <div class="flex_item">
                <div @class(['w_full w_md_50 w_lg_33'])>
                    <div class="contact_card">
                        <div class="icon">
                            <span class="mdi mdi-phone-outline"></span>
                        </div>
                        <a href="tel:{{ $contact->phone_number }}">
                            {{ $contact->phone_number }}
                        </a>
                    </div>
                </div>
                <div @class(['w_full w_md_50 w_lg_33'])>
                    <div class="contact_card">
                        <div class="icon">
                            <span class="mdi mdi-email-outline"></span>
                        </div>
                        <a href="mailto:{{ $contact->email }}">
                            {{ $contact->email }}
                        </a>
                    </div>
                </div>
                <div @class(['w_full w_md_50 w_lg_33'])>
                    <div class="contact_card">
                        <div class="icon">
                            <span class="mdi mdi-map-outline"></span>
                        </div>
                        <span href="tel:{{ $contact->phone_number }}">
                            {{ $contact->address }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

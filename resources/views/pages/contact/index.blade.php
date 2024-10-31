@extends('layout.app')
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('contact') }}
    </div>
    <section class="contact_section section_padding">
        <div class="container">
            <div class="flex_item">
                <div class="w_full w_lg_50">
                    <h5 class="section_title">
                        {{ __('main.contact_us') }}
                    </h5>
                    <div class="flex_item">
                        <div class="w_full w_lg_50">
                            <label for="name">
                                {{ __('main.firstname') }}
                            </label>
                            <input type="text" id="name" placeholder="{{ __('main.firstname') }}" class="form_control">
                        </div>
                        <div class="w_full w_lg_50">
                            <label for="name">
                                {{ __('main.lastname') }}
                            </label>
                            <input type="text" id="name" placeholder="{{ __('main.lastname') }}" class="form_control">
                        </div>
                        <div class="w_full w_lg_50">
                            <label for="name">
                                {{ __('main.email') }}
                            </label>
                            <input type="email" id="name" placeholder="{{ __('main.email') }}" class="form_control">
                        </div>
                        <div class="w_full w_lg_50">
                            <label for="name">
                                {{ __('main.phone_number') }}
                            </label>
                            <input type="text" id="name" placeholder="{{ __('main.phone_number') }}"
                                   class="form_control">
                        </div>
                        <div class="w_full">
                            <label for="message"></label>
                            <textarea
                                class="form_control"
                                placeholder="{{ __('main.message') }}"
                                name="message"
                                id="message"
                                cols="30"
                                rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="w_full w_lg_50">
                    <h6 class="section_title">
                        {{ __('main.our_address') }}
                    </h6>
                    <ul class="contact_list">
                        @isset($contact->address)
                            <li>
                                <span class="mdi mdi-map-marker-outline"></span>
                                <span>{{ $contact->address }}</span>
                            </li>
                        @endisset
                        @isset($contact->phone_number)
                            <li>
                                <span class="mdi mdi-phone-outline"></span>
                                <a href="tel:{{ $contact->phone_number }}">
                                    {{ $contact->phone_number }}
                                </a>
                            </li>
                        @endisset
                        @isset($contact->email)
                            <li>
                                <span class="mdi mdi-email-outline"></span>
                                <a href="mailto:{{ $contact->email }}">
                                    {{ $contact->email }}
                                </a>
                            </li>
                        @endisset
                    </ul>
                    <ul class="social_networks">
                        @isset($contact->instagram)
                            <li class="instagram">
                                <a href="{{ $contact->instagram }}">
                                    <span class="mdi mdi-instagram"></span>
                                </a>
                            </li>
                        @endisset
                        @isset($contact->tiktok)
                            <li class="twitter">
                                <a href="{{ $contact->tiktok }}">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                        @endisset
                        @isset($contact->twitter)
                            <li class="twitter">
                                <a href="{{ $contact->twitter }}">
                                    <span class="mdi mdi-twitter"></span>
                                </a>
                            </li>
                        @endisset
                        @isset($contact->facebook)
                            <li class="facebook">
                                <a href="{{ $contact->facebook }}">
                                    <span class="mdi mdi-facebook"></span>
                                </a>
                            </li>
                        @endisset
                    </ul>
                </div>
                @isset($contact->url)
                    <div class="w_full">
                        <iframe
                            src="{{ $contact->url }}"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                @endisset
            </div>
        </div>
    </section>
@endsection

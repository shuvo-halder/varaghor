@extends('layout')
@section('title')
    <title>{{ __('translate.Select Purpose') }}</title>
@endsection
@section('body-content')

<main>
    <!-- banner-part-start  -->

    <section class="inner-banner">
    <div class="inner-banner-img" style=" background-image: url({{ asset($breadcrumb) }}) ;"></div>
        <div class="container">
        <div class="col-lg-12">
            <div class="inner-banner-df">
                <h1 class="inner-banner-taitel">{{ __('translate.Select Purpose') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('translate.Select Purpose') }}</li>
                    </ol>
                </nav>
            </div>
            </div>
        </div>
    </section>
    <!-- banner-part-end -->

    <!-- dashboard-part-start -->
    <section class="dashboard">
        <div class="container">
            <div class="row">
                @include('profile.sidebar')

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="add-listing-car">
                                <div class="add-listing-car-thumb-main">
                                    <div class="add-listing-car-thumb">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="166" height="90" viewBox="0 0 64 64">
                                            <radialGradient id="ETVB5PX1x~BMnl9i7tUQUa_119161_gr1" cx="32" cy="31.5" r="31.259" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#afeeff"></stop><stop offset=".193" stop-color="#bbf1ff"></stop><stop offset=".703" stop-color="#d7f8ff"></stop><stop offset="1" stop-color="#e1faff"></stop></radialGradient><path fill="url(#ETVB5PX1x~BMnl9i7tUQUa_119161_gr1)" d="M60.5,43l-10.357,0c-1.308,0-2.499-0.941-2.63-2.242C47.363,39.261,48.534,38,50,38h7.869 c1.451,0,2.789-0.972,3.071-2.395C61.319,33.693,59.848,32,58,32H42v-7h18.5c1.933,0,3.5-1.567,3.5-3.5v0c0-1.933-1.567-3.5-3.5-3.5 h-1.393c-0.996,0-1.92-0.681-2.08-1.664C56.824,15.083,57.785,14,59,14l0.357,0c1.308,0,2.499-0.941,2.63-2.242 C62.137,10.261,60.966,9,59.5,9h-17C41.672,9,41,8.328,41,7.5S41.672,6,42.5,6l5.857,0c1.308,0,2.499-0.941,2.63-2.242 C51.137,2.261,49.966,1,48.5,1L15.643,1c-1.308,0-2.499,0.941-2.63,2.242C12.863,4.739,14.034,6,15.5,6h1.393 c0.996,0,1.92,0.681,2.08,1.664C19.176,8.917,18.215,10,17,10L6.189,10c-2.086,0-3.958,1.514-4.168,3.59C1.78,15.972,3.665,18,6,18 l2.302,0c1.895,0,3.594,1.419,3.693,3.312C12.101,23.33,10.495,25,8.5,25l-3.311,0c-2.086,0-3.958,1.514-4.168,3.59 C0.78,30.972,2.665,33,5,33h17v11H6.131c-1.451,0-2.789,0.972-3.071,2.395C2.681,48.307,4.152,50,6,50 c1.215,0,2.176,1.083,1.973,2.336C7.813,53.319,6.889,54,5.893,54H4.189c-2.086,0-3.958,1.514-4.168,3.59 C-0.22,59.972,1.665,62,4,62l53.811,0c2.009,0,3.841-1.398,4.142-3.385c0.368-2.434-1.497-4.553-3.85-4.614 c-0.809-0.021-1.608-0.396-1.923-1.141C55.564,51.401,56.618,50,58,50l2.386,0c1.67,0,3.195-1.122,3.537-2.757 C64.392,44.998,62.668,43,60.5,43z"></path><linearGradient id="ETVB5PX1x~BMnl9i7tUQUb_119161_gr2" x1="32" x2="32" y1="59.215" y2="13.215" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#ff9757"></stop><stop offset="1" stop-color="#ffb65b"></stop><stop offset="1" stop-color="#ffb65b"></stop></linearGradient><path fill="url(#ETVB5PX1x~BMnl9i7tUQUb_119161_gr2)" d="M54,22L32,10L10,22v30c0,2.209,1.791,4,4,4h36c2.209,0,4-1.791,4-4V22z"></path><linearGradient id="ETVB5PX1x~BMnl9i7tUQUc_119161_gr3" x1="46.5" x2="46.5" y1="21.909" y2="8.909" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#ff9757"></stop><stop offset="1" stop-color="#ffb65b"></stop><stop offset="1" stop-color="#ffb65b"></stop></linearGradient><path fill="url(#ETVB5PX1x~BMnl9i7tUQUc_119161_gr3)" d="M45,8h3c1.105,0,2,0.895,2,2v9c0,1.105-0.895,2-2,2h-3c-1.105,0-2-0.895-2-2v-9 C43,8.895,43.895,8,45,8z"></path><linearGradient id="ETVB5PX1x~BMnl9i7tUQUd_119161_gr4" x1="67.964" x2="67.964" y1="28.239" y2="-10.08" gradientTransform="matrix(.9333 0 0 .8333 -23.933 41.333)" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#a4a4a4"></stop><stop offset=".63" stop-color="#7f7f7f"></stop><stop offset="1" stop-color="#6f6f6f"></stop></linearGradient><path fill="url(#ETVB5PX1x~BMnl9i7tUQUd_119161_gr4)" d="M46,56H33V38c0-1.105,0.895-2,2-2h9c1.105,0,2,0.895,2,2V56z"></path><linearGradient id="ETVB5PX1x~BMnl9i7tUQUe_119161_gr5" x1="49.214" x2="49.214" y1="16.79" y2="-9.314" gradientTransform="matrix(.9333 0 0 .8333 -23.933 41.333)" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#a4a4a4"></stop><stop offset=".63" stop-color="#7f7f7f"></stop><stop offset="1" stop-color="#6f6f6f"></stop><stop offset="1" stop-color="#6f6f6f"></stop></linearGradient><path fill="url(#ETVB5PX1x~BMnl9i7tUQUe_119161_gr5)" d="M25,46h-6c-1.105,0-2-0.895-2-2v-6c0-1.105,0.895-2,2-2h6c1.105,0,2,0.895,2,2v6 C27,45.105,26.105,46,25,46z"></path><g><linearGradient id="ETVB5PX1x~BMnl9i7tUQUf_119161_gr6" x1="31.67" x2="33.275" y1="30.522" y2="4.382" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#ff634d"></stop><stop offset=".204" stop-color="#fe6464"></stop><stop offset=".521" stop-color="#fc6581"></stop><stop offset=".794" stop-color="#fa6694"></stop><stop offset=".989" stop-color="#fa669a"></stop><stop offset="1" stop-color="#fa669a"></stop></linearGradient><path fill="url(#ETVB5PX1x~BMnl9i7tUQUf_119161_gr6)" d="M28.615,8.963L6.875,21.857C5.713,22.547,5,23.798,5,25.149v0 c0,2.986,3.286,4.833,5.872,3.299l21.125-12.529l21.131,12.53C55.714,29.982,59,28.136,59,25.149v0 c0-1.351-0.713-2.603-1.875-3.292L35.379,8.963C33.294,7.727,30.7,7.727,28.615,8.963z"></path></g>
                                            </svg>

                                    </div>
                                </div>

                                <h4 class="add-listing-car-txt">{{ __('translate.Add Home for Rent') }}</h4>
                                <p class="add-listing-car-sub-txt">
                                    {{ __('translate.sale rent front desc') }}
                                </p>

                                <div class="add-listing-car-btn">
                                    <a href="{{ route('user.homes.create', ['purpose' => 'Rent']) }}" class="thm-btn-two">
                                        {{ __('translate.Create For Rent') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6 col-md-6">
                            <div class="add-listing-car two">
                                <div class="add-listing-car-thumb-main">
                                    <div class="add-listing-car-thumb">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="166" height="60" viewBox="0 0 48 48">
                                            <path fill="#E8EAF6" d="M42 39L6 39 6 23 24 6 42 23z"></path><path fill="#C5CAE9" d="M39 21L34 16 34 9 39 9zM6 39H42V44H6z"></path><path fill="#B71C1C" d="M24 4.3L4 22.9 6 25.1 24 8.4 42 25.1 44 22.9z"></path><path fill="#D84315" d="M18 28H30V44H18z"></path><path fill="#01579B" d="M21 17H27V23H21z"></path><path fill="#FF8A65" d="M27.5,35.5c-0.3,0-0.5,0.2-0.5,0.5v2c0,0.3,0.2,0.5,0.5,0.5S28,38.3,28,38v-2C28,35.7,27.8,35.5,27.5,35.5z"></path>
                                            </svg>

                                    </div>
                                </div>

                                <h4 class="add-listing-car-txt">{{ __('translate.Add Home for Sale') }}</h4>
                                <p class="add-listing-car-sub-txt">
                                    {{ __('translate.sale rent front desc') }}
                                </p>

                                <div class="add-listing-car-btn">
                                    <a href="{{ route('user.homes.create', ['purpose' => 'Sale']) }}" class="thm-btn-two">{{ __('translate.Create For Sale') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>

    <!-- dashboard-part-end -->

    @include('profile.logout')



</main>

@endsection

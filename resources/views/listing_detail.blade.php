@extends('layout')
@section('title')
    <title>{{ html_decode($car->seo_title) }} || {{ __('VaraGhor') }}</title>
    <meta name="title" content="{{ html_decode($car->seo_title) }}">
    <meta name="description" content="{{ html_decode($car->seo_description) }}">
@endsection

@section('body-content')

<main>
    <!-- banner-part-start  -->

    <section class="inner-banner">
    <div class="inner-banner-img" style=" background-image: url({{ asset($breadcrumb) }}) ;"></div>
        <div class="container">
        <div class="col-lg-12">
            <div class="inner-banner-df">
                <h1 class="inner-banner-taitel">{{ __('translate.Property Details') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('translate.Property Details') }}</li>
                    </ol>
                </nav>
            </div>
            </div>
        </div>
    </section>
    <!-- banner-part-end -->



    <!-- Inventory Details-part-start -->


    <section class="inventory-details py-120px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <div class="col-lg-9 col-sm-6 col-md-12">
                            <div class="inventory-details-top-taitel">
                                <h5>{{ __('translate.Property') }} : {{ $car?->brand?->name }}</h5>
                                <span></span>
                                <h5>{{ __('translate.Views') }} : {{ $car->total_view }}</h5>
                            </div>


                            <h2 class="inventory-details-taitel">{{ html_decode($car->title) }}</h2>


                        </div>

                        <div class="col-lg-3  col-sm-6 col-md-12">


                            <div class="inventory-details-right-btn two">
                                <a href="javascript:;" class="price-btn">
                                    @if ($car->offer_price)
                                        {{ currency($car->offer_price) }}
                                    @else
                                        {{ currency($car->regular_price) }}
                                    @endif
                                </a>

                            </div>
                        </div>
                    </div>


                    <div class="row">




                        <div class="inventory-details-slick-for">



                            @foreach ($galleries as $gallery)
                                <div class="inventory-details-slick-img">

                                        <div class="inventory-details-slick-img-tag">
                                        <div class="icon-main">

                                            <a href="javascript:;" class="icon before_auth_wishlist">
                                            <span>
                                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.61204 2.324L9 2.96329L8.38796 2.324C6.69786 0.558667 3.95767 0.558666 2.26757 2.324C0.577476 4.08933 0.577475 6.95151 2.26757 8.71684L7.77592 14.4704C8.45196 15.1765 9.54804 15.1765 10.2241 14.4704L15.7324 8.71684C17.4225 6.95151 17.4225 4.08934 15.7324 2.324C14.0423 0.558667 11.3021 0.558666 9.61204 2.324Z" stroke-width="1.3" stroke-linejoin="round"></path>
                                            </svg>

                                            </span>
                                            </a>


                                            <a href="http://localhost/carbaz/add-to-compare/13" class="icon">
                                            <span>
                                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10V9C1 6.23858 3.23858 4 6 4H17L14 1" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 10V11C17 13.7614 14.7614 16 12 16H1L4 19" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            </span>
                                            </a>
                                            </div>
                                        </div>


                                    <img src="{{ asset($gallery->image) }}" alt="img">
                                </div>
                            @endforeach
                        </div>


                        <div class="inventory-details-slick-nav">
                            @foreach ($galleries as $gallery)
                                <div class="inventory-details-slick-img">
                                    <img src="{{ asset($gallery->image) }}" alt="img">
                                </div>
                            @endforeach
                        </div>
                    </div>


                    @if ($listing_ads->status == 'enable')
                        <div class="inventory-details-thumb" data-aos="fade-up" data-aos-delay="50">
                            <a href="{{ $listing_ads->link }}" target="_blank"> <img src="{{ getImageOrPlaceholder($listing_ads->image,'950x130') }}" alt="img"></a>
                        </div>
                    @endif


                    <!-- Description Overview  -->
                    <div class="accordion" id="accordionPanelsStayOpenExample" data-aos="fade-up" data-aos-delay="100">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    {{ __('translate.Description Overview') }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    {!! clean(html_decode($car->description)) !!}
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- Description Overview  -->
                    <div class="accordion" id="accordionPanelsStayOpenExample1" data-aos="fade-up"
                    data-aos-delay="150">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingtwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapsetwo" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapsetwo">
                                    {{ __('translate.Key Information') }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapsetwo" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingtwo">
                                <div class="accordion-body">
                                    <div class="row gx-5">
                                        <div class="col-lg-6 ">
                                            <ul class="key-information" >
                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-share" viewBox="0 0 24 24">
                                                            <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                                                          </svg>
                                                        {{ __('translate.Share') }}?
                                                    </span>
                                                    {{ html_decode($car->body_type) }}
                                                </li>
                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-door" viewBox="0 0 24 24">
                                                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                                                          </svg>

                                                        {{ __('translate.Square Feet') }}
                                                    </span>
                                                    {{ html_decode($car->engine_size) }}
                                                </li>

                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="22" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 26 22">
                                                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                                          </svg>

                                                        {{ __('translate.available from') }}
                                                    </span>
                                                    {{ html_decode($car->drive) }}
                                                </li>

                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-ethernet" viewBox="0 0 22 22">
                                                            <path d="M14 13.5v-7a.5.5 0 0 0-.5-.5H12V4.5a.5.5 0 0 0-.5-.5h-1v-.5A.5.5 0 0 0 10 3H6a.5.5 0 0 0-.5.5V4h-1a.5.5 0 0 0-.5.5V6H2.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5M3.75 11h.5a.25.25 0 0 1 .25.25v1.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-1.5a.25.25 0 0 1 .25-.25m2 0h.5a.25.25 0 0 1 .25.25v1.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-1.5a.25.25 0 0 1 .25-.25m1.75.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v1.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zM9.75 11h.5a.25.25 0 0 1 .25.25v1.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-1.5a.25.25 0 0 1 .25-.25m1.75.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v1.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25z"/>
                                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z"/>
                                                          </svg>

                                                        {{ __('translate.Interior Color') }}
                                                    </span>
                                                    {{ html_decode($car->interior_color) }}
                                                </li>



                                                <li>
                                                    <span>
                                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M4 12h16a1 1 0 0 1 1 1v3a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4v-3a1 1 0 0 1 1 -1z"></path>
                                                            <path d="M6 12v-7a2 2 0 0 1 2 -2h3v2.25"></path>
                                                            <path d="M4 21l1 -1.5"></path>
                                                            <path d="M20 21l-1 -1.5"></path>
                                                          </svg>
                                                        {{ __('translate.Bathroom') }}
                                                    </span>
                                                    {{ html_decode($car->year) }}
                                                </li>
                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 22 22">
                                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                                          </svg>
                                                        {{ __('translate.Condition') }}
                                                    </span>
                                                    @if($car->condition == 'Used')
                                                        {{ __('translate.Used') }}
                                                    @else
                                                        {{ __('translate.New') }}
                                                    @endif

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <ul class="key-information two">
                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-up" viewBox="0 0 24 24">
                                                            <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z"/>
                                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 1 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.707l1.5-1.5a.5.5 0 0 1 .708 0Z"/>
                                                          </svg>
                                                        {{ __('translate.Kitchen') }}
                                                    </span>
                                                    {{ html_decode($car->mileage) }}
                                                </li>
                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-house-door" viewBox="0 0 22 22">
                                                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                                                          </svg>

                                                        {{ __('translate.Balcony') }}
                                                    </span>
                                                    {{ html_decode($car->number_of_owner) }}
                                                </li>

                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 22 22">
                                                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                                                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                                                          </svg>

                                                        {{ __('translate.Bedroom') }}
                                                    </span>
                                                    {{ html_decode($car->exterior_color) }}
                                                </li>

                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-house-up" viewBox="0 0 22 22">
                                                            <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z"/>
                                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 1 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.707l1.5-1.5a.5.5 0 0 1 .708 0Z"/>
                                                          </svg>

                                                        {{ __('translate.Floor Number') }}
                                                    </span>
                                                    {{ html_decode($car->fuel_type) }}
                                                </li>

                                                <li>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-people" viewBox="0 0 22 22">
                                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                                          </svg>
                                                        {{ __('translate.Gender') }}
                                                    </span>
                                                    {{ html_decode($car->transmission) }}
                                                </li>
                                                <li>
                                                    <span>
                                                        <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.88711 11.2615C8.90893 11.2615 8.93076 11.2615 8.95694 11.2615C8.96567 11.2615 8.9744 11.2615 8.98313 11.2615C8.99622 11.2615 9.01368 11.2615 9.02678 11.2615C10.3056 11.2398 11.34 10.7941 12.1038 9.94144C13.7842 8.06308 13.5049 4.84304 13.4743 4.53576C13.3652 2.22893 12.2653 1.12528 11.3575 0.61025C10.681 0.225057 9.89097 0.017312 9.00932 0H8.97877C8.9744 0 8.96567 0 8.96131 0H8.93512C8.45065 0 7.49916 0.0779042 6.58695 0.592937C5.67038 1.10797 4.55304 2.21161 4.44392 4.53576C4.41337 4.84304 4.13403 8.06308 5.81441 9.94144C6.57386 10.7941 7.60827 11.2398 8.88711 11.2615ZM5.60928 4.64396C5.60928 4.63097 5.61364 4.61799 5.61364 4.60933C5.75767 1.50615 7.97927 1.17289 8.93076 1.17289H8.94821C8.95694 1.17289 8.97004 1.17289 8.98313 1.17289C10.1616 1.19886 12.1649 1.67494 12.3002 4.60933C12.3002 4.62232 12.3002 4.6353 12.3046 4.64396C12.309 4.67425 12.6145 7.6173 11.2265 9.16673C10.6766 9.78131 9.94335 10.0843 8.97877 10.0929C8.97004 10.0929 8.96567 10.0929 8.95694 10.0929C8.94821 10.0929 8.94385 10.0929 8.93512 10.0929C7.9749 10.0843 7.23728 9.78131 6.6917 9.16673C5.30812 7.62596 5.60491 4.66992 5.60928 4.64396Z" />
                                                            <path
                                                                d="M17.9267 16.6022C17.9267 16.5979 17.9267 16.5936 17.9267 16.5892C17.9267 16.5546 17.9223 16.52 17.9223 16.481C17.8961 15.6241 17.8394 13.6202 15.9452 12.9797C15.9321 12.9754 15.9146 12.971 15.9015 12.9667C13.9331 12.469 12.2963 11.3437 12.2789 11.3307C12.0126 11.1446 11.646 11.2095 11.4583 11.4735C11.2706 11.7375 11.3361 12.1011 11.6024 12.2872C11.6766 12.3391 13.4137 13.538 15.5873 14.092C16.6042 14.4512 16.7177 15.5289 16.7483 16.5157C16.7483 16.5546 16.7483 16.5892 16.7526 16.6239C16.757 17.0134 16.7308 17.615 16.661 17.9612C15.9539 18.3594 13.1824 19.7357 8.96613 19.7357C4.76736 19.7357 1.97836 18.3551 1.26693 17.9569C1.19709 17.6107 1.16654 17.0091 1.17527 16.6195C1.17527 16.5849 1.17964 16.5503 1.17964 16.5113C1.21019 15.5246 1.32367 14.4469 2.34063 14.0877C4.51421 13.5337 6.25133 12.3305 6.32553 12.2829C6.59177 12.0968 6.65724 11.7332 6.46956 11.4692C6.28188 11.2052 5.91525 11.1403 5.64901 11.3264C5.63155 11.3394 4.00355 12.4647 2.02637 12.9624C2.00892 12.9667 1.99582 12.971 1.98273 12.9754C0.0884804 13.6202 0.0317404 15.6241 0.00555262 16.4767C0.00555262 16.5157 0.00555252 16.5503 0.0011879 16.5849C0.0011879 16.5892 0.0011879 16.5936 0.0011879 16.5979C-0.00317673 16.823 -0.00754126 17.9785 0.223784 18.5585C0.26743 18.671 0.345993 18.7662 0.450744 18.8312C0.581683 18.9177 3.71985 20.8999 8.97049 20.8999C14.2211 20.8999 17.3593 18.9134 17.4902 18.8312C17.5906 18.7662 17.6736 18.671 17.7172 18.5585C17.9354 17.9829 17.9311 16.8273 17.9267 16.6022Z" />
                                                        </svg>
                                                        {{ __('Listing') }}
                                                    </span>
                                                    {{ html_decode($car->seller_type) }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="accordion aos-init aos-animate" id="accordionPanelsStayOpenExample2" data-aos="fade-up"
                    data-aos-delay="200">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingthree">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsethree" aria-expanded="true" aria-controls="panelsStayOpen-collapsethree">
                                    {{ __('translate.Features') }}
                                </button>
                            </h2>

                            <div id="panelsStayOpen-collapsethree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingthree">
                                <div class="accordion-body">
                                    <div class="feature-list">
                                        <ul>
                                            @foreach ($car_features as $index => $car_feature)
                                                <li>
                                                    <span>
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>
                                                    {{ $car_feature->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Video -->
                    <div class="accordion" id="accordionPanelsStayOpenExample3" data-aos="fade-up"
                    data-aos-delay="250">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingfour">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapsefour" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapsefour">
                                    {{ __('translate.Video') }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapsefour" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingfour">
                                <div class="accordion-body">
                                    {{ html_decode($car->video_description) }}



                                    <span class="inventory-details-vedio">
                                        <img src="{{ asset($car->video_image) }}" alt="img">

                                        <span class="overlay">
                                            <a class="my-video-links" data-autoplay="true" data-vbtype="video"
                                                href="https://youtu.be/{{ $car->video_id }}">
                                                <span>
                                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M40 76.0001C59.8822 76.0001 76.0001 59.8827 76.0001 40C76.0001 20.1178 59.8827 3.99992 40 3.99992C20.1178 3.99992 3.99992 20.1178 3.99992 40C3.99992 59.8822 20.1178 76.0001 40 76.0001ZM40 80C62.0911 80 80 62.0911 80 40C80 17.9084 62.0911 0 40 0C17.9084 0 0 17.9084 0 40C0 62.0911 17.9084 80 40 80Z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M50.3927 40.0003L31.9984 27.7375V52.2634L50.3927 40.0003ZM54.1089 37.6706C55.7716 38.7791 55.7716 41.2219 54.1089 42.3303L32.3513 56.8357C30.4906 58.0763 27.998 56.742 27.998 54.5057V25.4953C27.998 23.259 30.4906 21.9251 32.3513 23.1657L54.1089 37.6706Z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Locations -->
                    <div class="accordion" id="accordionPanelsStayOpenExample4" data-aos="fade-up"
                    data-aos-delay="300">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingfive">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapsefive" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapsefive">
                                    {{ __('translate.Locations') }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapsefive" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingfive">
                                <div class="accordion-body">
                                    <ul class="locations">
                                        <li>
                                            <a href="javascript:;">
                                                <span>
                                                    <svg width="18" height="22" viewBox="0 0 18 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.55 20.25C2.13579 20.25 1.8 20.5858 1.8 21C1.8 21.4142 2.13579 21.75 2.55 21.75V20.25ZM14.95 21.75C15.3642 21.75 15.7 21.4142 15.7 21C15.7 20.5858 15.3642 20.25 14.95 20.25V21.75ZM15.75 8.5C15.75 10.1981 14.6274 12.4022 13.0703 14.2376C12.3055 15.139 11.4701 15.9098 10.6819 16.4488C9.87165 17.0029 9.2019 17.25 8.75 17.25V18.75C9.65435 18.75 10.6315 18.3005 11.5286 17.687C12.4479 17.0584 13.3804 16.1906 14.2141 15.208C15.8538 13.2752 17.25 10.7292 17.25 8.5H15.75ZM8.75 17.25C8.31285 17.25 7.64989 16.992 6.83557 16.4004C6.0463 15.8269 5.20886 15.0085 4.44153 14.0574C2.8796 12.1213 1.75 9.81691 1.75 8.11111H0.25C0.25 10.3327 1.63915 12.9727 3.27409 14.9992C4.1052 16.0294 5.03573 16.9468 5.95389 17.6139C6.84698 18.2628 7.8309 18.75 8.75 18.75V17.25ZM1.75 8.11111C1.75 4.5023 5.07541 1.75 8.75 1.75V0.25C4.43487 0.25 0.25 3.4977 0.25 8.11111H1.75ZM8.75 1.75C12.3966 1.75 15.75 4.47727 15.75 8.5H17.25C17.25 3.52273 13.0931 0.25 8.75 0.25V1.75ZM11.1 8C11.1 9.21965 10.0712 10.25 8.75 10.25V11.75C10.8529 11.75 12.6 10.0941 12.6 8H11.1ZM8.75 10.25C7.42876 10.25 6.4 9.21965 6.4 8H4.9C4.9 10.0941 6.64707 11.75 8.75 11.75V10.25ZM6.4 8C6.4 6.78035 7.42876 5.75 8.75 5.75V4.25C6.64707 4.25 4.9 5.90594 4.9 8H6.4ZM8.75 5.75C10.0712 5.75 11.1 6.78035 11.1 8H12.6C12.6 5.90594 10.8529 4.25 8.75 4.25V5.75ZM2.55 21.75H14.95V20.25H2.55V21.75Z" />
                                                    </svg>
                                                </span>
                                                {{ html_decode($car->address) }}
                                            </a>



                                            <iframe src="{{ html_decode($car->google_map) }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                        </li>


                                    </ul>



                                </div>
                            </div>
                        </div>
                    </div>


                    @if ($reviews->count() > 0)
                        <!-- Write Your Review -->
                        <div class="accordion aos-init aos-animate" id="accordionPanelsStayOpenExample5" data-aos="fade-up"
                        data-aos-delay="350">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingsix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsesix" aria-expanded="false" aria-controls="panelsStayOpen-collapsesix">
                                        {{ __('Review') }}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapsesix" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingsix">
                                    <div class="accordion-body">

                                        @foreach ($reviews as $review)
                                            <div class="reviews">
                                                <div class="reviews-item">

                                                    <ul class="icon">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($review->rating < $i)
                                                            <li><span><i class="fa-regular fa-star"></i></span></li>
                                                            @else
                                                            <li><span><i class="fa-solid fa-star"></i></span></li>
                                                            @endif
                                                        @endfor
                                                    </ul>

                                                    <div class="text">
                                                        <h6>{{ $review->created_at->format('M d Y') }}</h6>
                                                    </div>
                                                </div>

                                                <p>
                                                    {{ html_decode($review->comment) }}
                                                </p>

                                                <div class="reviews-inner">
                                                    <div class="reviews-inner-item">
                                                        <div class="reviews-inner-img">
                                                            <img src="{{ asset($review?->user?->image) }}" alt="img">
                                                        </div>

                                                        <div class="reviews-inner-text">
                                                            <h3>{{ html_decode($review?->user?->name) }}</h3>
                                                            <p>{{ html_decode($review?->user?->designation) }}</p>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="accordion aos-init aos-animate" id="accordionPanelsStayOpenExample6" data-aos="fade-up"
                    data-aos-delay="400">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingseven">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseseven" aria-expanded="true" aria-controls="panelsStayOpen-collapseseven">
                                    {{ __('translate.Write Your Review') }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseseven" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingseven">
                                <div class="accordion-body">

                                    <div class="write-your-review-item">
                                        <div class="write-your-review-stars">
                                            <ul class="icon">
                                                <li><i onclick="carReview(1)" data-rating="1" class="car_rat fa-solid fa-star"></i></li>
                                                <li><i onclick="carReview(2)" data-rating="2" class="car_rat fa-solid fa-star"></i></li>
                                                <li><i onclick="carReview(3)" data-rating="3" class="car_rat fa-solid fa-star"></i></li>
                                                <li><i onclick="carReview(4)" data-rating="4" class="car_rat fa-solid fa-star"></i></li>
                                                <li><i onclick="carReview(5)" data-rating="5" class="car_rat fa-solid fa-star"></i></li>

                                            </ul>
                                            <span>(5.0)</span>
                                        </div>

                                        <form method="POST" action="{{ route('user.store-review') }}">

                                            @csrf

                                            <input type="hidden" name="agent_id" value="{{ $car->agent_id }}">
                                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                                            <input type="hidden" id="car_rating" name="rating" value="5">

                                            <div class="form-item">
                                                <div class="form-inner">
                                                    <label class="form-label">{{ __('translate.Review') }} <span>*</span> </label>
                                                    <textarea name="comment" class="form-control" id="review" rows="5" placeholder="{{ __('translate.Write here') }}"></textarea>
                                                </div>

                                            </div>

                                            @if($google_recaptcha->status==1)
                                                <div class="form-item">
                                                    <div class="form-inner">
                                                        <div class="g-recaptcha" data-sitekey="{{ $google_recaptcha->site_key }}"></div>
                                                    </div>

                                                </div>
                                            @endif

                                            <button type="submit" class="thm-btn-two">{{ __('translate.Submit Review') }}</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5">
                    <div class="p-sticky">
                    <div class="auto-sales-item">

                        <div class="auto-sales-item-inner">

                        <div class="auto-sales-logo">
                                <a href="#"><img src="{{ getImageOrPlaceholder($dealer->image, '80x80') }}" alt="logo"></a>
                            </div>

                            <div class="auto-sales-text-item">
                                <div class="auto-sales-text-left">
                                    <h3>{{ html_decode($dealer->name) }}
                                        @php
                                            $kyc = Modules\Kyc\Entities\KycInformation::where('user_id',$dealer->id)->where('status',1)->first();
                                        @endphp
                                        @if($kyc)
                                            <span  class="varified-badge">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.007 2.10377C8.60544 1.65006 7.08181 2.28116 6.41156 3.59306L5.60578 5.17023C5.51004 5.35763 5.35763 5.51004 5.17023 5.60578L3.59306 6.41156C2.28116 7.08181 1.65006 8.60544 2.10377 10.007L2.64923 11.692C2.71404 11.8922 2.71404 12.1078 2.64923 12.308L2.10377 13.993C1.65006 15.3946 2.28116 16.9182 3.59306 17.5885L5.17023 18.3942C5.35763 18.49 5.51004 18.6424 5.60578 18.8298L6.41156 20.407C7.08181 21.7189 8.60544 22.35 10.007 21.8963L11.692 21.3508C11.8922 21.286 12.1078 21.286 12.308 21.3508L13.993 21.8963C15.3946 22.35 16.9182 21.7189 17.5885 20.407L18.3942 18.8298C18.49 18.6424 18.6424 18.49 18.8298 18.3942L20.407 17.5885C21.7189 16.9182 22.35 15.3946 21.8963 13.993L21.3508 12.308C21.286 12.1078 21.286 11.8922 21.3508 11.692L21.8963 10.007C22.35 8.60544 21.7189 7.08181 20.407 6.41156L18.8298 5.60578C18.6424 5.51004 18.49 5.35763 18.3942 5.17023L17.5885 3.59306C16.9182 2.28116 15.3946 1.65006 13.993 2.10377L12.308 2.64923C12.1078 2.71403 11.8922 2.71404 11.692 2.64923L10.007 2.10377ZM6.75977 11.7573L8.17399 10.343L11.0024 13.1715L16.6593 7.51465L18.0735 8.92886L11.0024 15.9999L6.75977 11.7573Z">

                                                </path>
                                                </svg>
                                            </span>
                                        @endif
                                    </h3>
                                    <p>{{ __('translate.Member Since') }} {{ $dealer->created_at->format('F Y') }} </p>
                                </div>
                                <div class="auto-sales-text-right">
                                    <h6>{{ __('translate.Total') }}: {{ $dealer->total_car }}</h6>
                                    <p>
                                        <span>
                                            <svg width="53" height="11" viewBox="0 0 53 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.3 0L6.48992 3.80041H10.3406L7.22534 6.14919L8.41526 9.94959L5.3 7.60081L2.18474 9.94959L3.37466 6.14919L0.2594 3.80041H4.11007L5.3 0Z" />
                                                <path
                                                    d="M15.8996 0L17.0895 3.80041H20.9402L17.8249 6.14919L19.0149 9.94959L15.8996 7.60081L12.7843 9.94959L13.9743 6.14919L10.859 3.80041H14.7097L15.8996 0Z" />
                                                <path
                                                    d="M26.4992 0L27.6891 3.80041H31.5398L28.4246 6.14919L29.6145 9.94959L26.4992 7.60081L23.384 9.94959L24.5739 6.14919L21.4586 3.80041H25.3093L26.4992 0Z" />
                                                <path
                                                    d="M37.1008 0L38.2907 3.80041H42.1414L39.0261 6.14919L40.216 9.94959L37.1008 7.60081L33.9855 9.94959L35.1754 6.14919L32.0602 3.80041H35.9109L37.1008 0Z" />
                                                <path
                                                    d="M47.7004 0L48.8903 3.80041H52.741L49.6257 6.14919L50.8157 9.94959L47.7004 7.60081L44.5851 9.94959L45.7751 6.14919L42.6598 3.80041H46.5105L47.7004 0Z" />
                                            </svg>
                                        </span>
                                        ({{ $total_dealer_rating }})
                                    </p>
                                </div>
                            </div>
                        </div>
                            <div class="auto-sales-contact">
                                <ul>
                                    <li>
                                        <a href="tel:{{ html_decode($dealer->phone) }}">
                                            <span>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13 14L12.8529 14.7354C13.1846 14.8018 13.5196 14.6379 13.6708 14.3354L13 14ZM6 7L5.66459 6.32918C5.36208 6.48043 5.19824 6.81544 5.26456 7.14709L6 7ZM6.35402 6.82299L6.68943 7.49381L6.68943 7.49381L6.35402 6.82299ZM7.31654 4.29136L8.0129 4.01281L7.31654 4.29136ZM6.50289 2.25722L5.80653 2.53576L6.50289 2.25722ZM17.7428 13.4971L17.4642 14.1935L17.7428 13.4971ZM15.7086 12.6835L15.9872 11.9871H15.9872L15.7086 12.6835ZM13.177 13.646L13.8478 13.9814V13.9814L13.177 13.646ZM14.25 9C14.25 9.41421 14.5858 9.75 15 9.75C15.4142 9.75 15.75 9.41421 15.75 9H14.25ZM14.6955 7.46927L15.3884 7.18225L14.6955 7.46927ZM12.5307 5.30448L12.8177 4.61157L12.5307 5.30448ZM11 4.25C10.5858 4.25 10.25 4.58579 10.25 5C10.25 5.41421 10.5858 5.75 11 5.75V4.25ZM18.25 9C18.25 9.41421 18.5858 9.75 19 9.75C19.4142 9.75 19.75 9.41421 19.75 9H18.25ZM18.391 5.93853L19.0839 5.65152L18.391 5.93853ZM14.0615 1.60896L14.3485 0.916054V0.916054L14.0615 1.60896ZM11 0.25C10.5858 0.25 10.25 0.585786 10.25 1C10.25 1.41421 10.5858 1.75 11 1.75V0.25ZM18.25 15.3541V17H19.75V15.3541H18.25ZM3 1.75H4.64593V0.25H3V1.75ZM13 14C13.1471 13.2646 13.1473 13.2646 13.1475 13.2646C13.1476 13.2647 13.1477 13.2647 13.1479 13.2647C13.1481 13.2648 13.1483 13.2648 13.1484 13.2648C13.1487 13.2649 13.1488 13.2649 13.1488 13.2649C13.1488 13.2649 13.1482 13.2648 13.147 13.2645C13.1447 13.264 13.14 13.2631 13.1331 13.2615C13.1193 13.2585 13.0967 13.2533 13.0659 13.2459C13.0044 13.2309 12.9104 13.2066 12.7898 13.1711C12.5482 13.1 12.2016 12.9847 11.7954 12.8106C10.9796 12.461 9.94391 11.8833 9.03033 10.9697L7.96967 12.0303C9.05609 13.1167 10.2704 13.789 11.2046 14.1894C11.6734 14.3903 12.0768 14.525 12.3665 14.6101C12.5115 14.6528 12.6285 14.6832 12.7114 14.7034C12.7529 14.7135 12.7859 14.721 12.8097 14.7263C12.8217 14.7289 12.8313 14.7309 12.8385 14.7325C12.8421 14.7332 12.8451 14.7339 12.8475 14.7343C12.8487 14.7346 12.8498 14.7348 12.8507 14.735C12.8511 14.7351 12.8515 14.7352 12.8519 14.7352C12.8521 14.7353 12.8523 14.7353 12.8524 14.7353C12.8527 14.7354 12.8529 14.7354 13 14ZM9.03033 10.9697C8.11675 10.0561 7.53901 9.02042 7.18936 8.20456C7.01527 7.79836 6.89996 7.45184 6.8289 7.21025C6.79342 7.08962 6.76912 6.99565 6.75414 6.93406C6.74666 6.90329 6.74151 6.88065 6.73847 6.86687C6.73695 6.85999 6.73595 6.85532 6.73546 6.85296C6.73521 6.85178 6.73509 6.85118 6.73508 6.85117C6.73508 6.85116 6.73511 6.8513 6.73517 6.85159C6.7352 6.85174 6.73524 6.85192 6.73528 6.85214C6.7353 6.85225 6.73534 6.85244 6.73535 6.8525C6.73539 6.8527 6.73544 6.85291 6 7C5.26456 7.14709 5.26461 7.14732 5.26466 7.14756C5.26468 7.14765 5.26473 7.1479 5.26477 7.14809C5.26484 7.14846 5.26492 7.14887 5.26501 7.14932C5.2652 7.15022 5.26541 7.15127 5.26566 7.15247C5.26615 7.15488 5.26677 7.15789 5.26753 7.1615C5.26905 7.16873 5.27111 7.17834 5.27374 7.19026C5.279 7.21408 5.28655 7.2471 5.29664 7.28859C5.31682 7.37154 5.34721 7.48851 5.38985 7.6335C5.47504 7.92316 5.60973 8.32664 5.81064 8.79544C6.21099 9.72958 6.88325 10.9439 7.96967 12.0303L9.03033 10.9697ZM6.33541 7.67082L6.68943 7.49381L6.01861 6.15217L5.66459 6.32918L6.33541 7.67082ZM8.0129 4.01281L7.19925 1.97868L5.80653 2.53576L6.62018 4.5699L8.0129 4.01281ZM18.0213 12.8008L15.9872 11.9871L15.4301 13.3798L17.4642 14.1935L18.0213 12.8008ZM12.5062 13.3106L12.3292 13.6646L13.6708 14.3354L13.8478 13.9814L12.5062 13.3106ZM15.9872 11.9871C14.6592 11.4559 13.1458 12.0313 12.5062 13.3106L13.8478 13.9814C14.1386 13.3999 14.8265 13.1384 15.4301 13.3798L15.9872 11.9871ZM6.68943 7.49381C7.96868 6.85419 8.54408 5.34076 8.0129 4.01281L6.62018 4.5699C6.86163 5.17351 6.60008 5.86143 6.01861 6.15217L6.68943 7.49381ZM4.64593 1.75C5.15706 1.75 5.6167 2.06119 5.80653 2.53576L7.19925 1.97868C6.78162 0.934616 5.77042 0.25 4.64593 0.25V1.75ZM19.75 15.3541C19.75 14.2296 19.0654 13.2184 18.0213 12.8008L17.4642 14.1935C17.9388 14.3833 18.25 14.8429 18.25 15.3541H19.75ZM17 18.25C8.57766 18.25 1.75 11.4223 1.75 3H0.25C0.25 12.2508 7.74923 19.75 17 19.75V18.25ZM17 19.75C18.5188 19.75 19.75 18.5188 19.75 17H18.25C18.25 17.6904 17.6904 18.25 17 18.25V19.75ZM1.75 3C1.75 2.30964 2.30964 1.75 3 1.75V0.25C1.48122 0.25 0.25 1.48122 0.25 3H1.75ZM15.75 9C15.75 8.37622 15.6271 7.75855 15.3884 7.18225L14.0026 7.75628C14.1659 8.15059 14.25 8.5732 14.25 9H15.75ZM15.3884 7.18225C15.1497 6.60596 14.7998 6.08232 14.3588 5.64124L13.2981 6.7019C13.5999 7.00369 13.8393 7.36197 14.0026 7.75628L15.3884 7.18225ZM14.3588 5.64124C13.9177 5.20016 13.394 4.85028 12.8177 4.61157L12.2437 5.99739C12.638 6.16072 12.9963 6.40011 13.2981 6.7019L14.3588 5.64124ZM12.8177 4.61157C12.2415 4.37286 11.6238 4.25 11 4.25V5.75C11.4268 5.75 11.8494 5.83406 12.2437 5.99739L12.8177 4.61157ZM19.75 9C19.75 7.85093 19.5237 6.71312 19.0839 5.65152L17.6981 6.22554C18.0625 7.10516 18.25 8.04792 18.25 9H19.75ZM19.0839 5.65152C18.6442 4.58992 17.9997 3.62533 17.1872 2.81282L16.1265 3.87348C16.7997 4.5467 17.3338 5.34593 17.6981 6.22554L19.0839 5.65152ZM17.1872 2.81282C16.3747 2.0003 15.4101 1.35578 14.3485 0.916054L13.7745 2.30187C14.6541 2.66622 15.4533 3.20025 16.1265 3.87348L17.1872 2.81282ZM14.3485 0.916054C13.2869 0.476325 12.1491 0.25 11 0.25V1.75C11.9521 1.75 12.8948 1.93753 13.7745 2.30187L14.3485 0.916054Z" />
                                                </svg>
                                            </span>

                                            {{ html_decode($dealer->phone) }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:{{ html_decode($dealer->email) }}">

                                            <span>
                                                <svg class="stroke-color" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2 12V7C2 4.79086 3.79086 3 6 3H18C20.2091 3 22 4.79086 22 7V17C22 19.2091 20.2091 21 18 21H8M6 8L9.7812 10.5208C11.1248 11.4165 12.8752 11.4165 14.2188 10.5208L18 8M2 15H8M2 18H8"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                </svg>

                                            </span>

                                            {{ html_decode($dealer->email) }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">

                                            <span>
                                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3 20.25C2.58579 20.25 2.25 20.5858 2.25 21C2.25 21.4142 2.58579 21.75 3 21.75V20.25ZM15 21.75C15.4142 21.75 15.75 21.4142 15.75 21C15.75 20.5858 15.4142 20.25 15 20.25V21.75ZM15.75 8.5C15.75 10.2065 14.6599 12.4136 13.1547 14.2468C12.4148 15.1481 11.6072 15.9179 10.8465 16.4554C10.0624 17.0094 9.42269 17.25 9 17.25V18.75C9.88982 18.75 10.8438 18.294 11.7121 17.6804C12.6038 17.0504 13.5071 16.1815 14.314 15.1987C15.9026 13.2638 17.25 10.7209 17.25 8.5H15.75ZM9 17.25C8.59247 17.25 7.95947 16.9993 7.171 16.4074C6.409 15.8353 5.59932 15.0178 4.85679 14.0668C3.34675 12.1327 2.25 9.82498 2.25 8.11111H0.75C0.75 10.3246 2.09075 12.9614 3.67446 14.9899C4.4788 16.0201 5.38006 16.9385 6.27041 17.6069C7.13428 18.2555 8.09503 18.75 9 18.75V17.25ZM2.25 8.11111C2.25 4.48059 5.47857 1.75 9 1.75V0.25C4.78944 0.25 0.75 3.51941 0.75 8.11111H2.25ZM9 1.75C12.4938 1.75 15.75 4.45503 15.75 8.5H17.25C17.25 3.54497 13.2382 0.25 9 0.25V1.75ZM11.25 8C11.25 9.24264 10.2426 10.25 9 10.25V11.75C11.0711 11.75 12.75 10.0711 12.75 8H11.25ZM9 10.25C7.75736 10.25 6.75 9.24264 6.75 8H5.25C5.25 10.0711 6.92893 11.75 9 11.75V10.25ZM6.75 8C6.75 6.75736 7.75736 5.75 9 5.75V4.25C6.92893 4.25 5.25 5.92893 5.25 8H6.75ZM9 5.75C10.2426 5.75 11.25 6.75736 11.25 8H12.75C12.75 5.92893 11.0711 4.25 9 4.25V5.75ZM3 21.75H15V20.25H3V21.75Z" />
                                                </svg>

                                            </span>
                                            {{ html_decode($dealer->address) }}
                                        </a>
                                    </li>
                                </ul>
                            </div>



                            <form method="POST" action="{{ route('send-message-to-dealer', $dealer->id) }}">
                                @csrf
                                <div class="auto-sales-form">

                                    <div class="auto-sales-form-item">
                                        <input type="text" class="form-control" id="exampleFormControlInput3"
                                            placeholder="{{ __('translate.Name') }} *" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="auto-sales-form-item">
                                        <input type="email" class="form-control" id="exampleFormControlInput4"
                                            placeholder="{{ __('translate.Email') }} *" name="email" value="{{ old('email') }}">
                                    </div>

                                    <div class="auto-sales-form-item">
                                        <input type="text" class="form-control" id="exampleFormControlInput5"
                                            placeholder="{{ __('translate.Phone') }}" name="phone" value="{{ old('phone') }}">
                                    </div>

                                    <div class="auto-sales-form-item">
                                        <input type="text" class="form-control" id="exampleFormControlInpu6"
                                            placeholder="{{ __('translate.Subject') }} *" value="{{ old('subject') }}" name="subject">
                                    </div>

                                    <div class="auto-sales-form-item">
                                        <textarea class="form-control" id="exampleFormControlTextarea11" rows="3"
                                            placeholder="{{ __('translate.Message') }} *" name="message">{{ old('message') }}</textarea>
                                    </div>

                                    @if($google_recaptcha->status==1)
                                        <div class="auto-sales-form-item">
                                            <div class="g-recaptcha" data-sitekey="{{ $google_recaptcha->site_key }}"></div>
                                        </div>
                                    @endif

                                    <button type="submit" class="thm-btn-two">{{ __('translate.Send Message') }}</button>
                                </div>
                            </form>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inventory Details-part-end -->

    <!-- Cars Listing-part-start -->
    @if ($related_listings->count() > 0)
        <section class="cars-listing feature-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row feature-taitel align-items-end">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="taitel two" >
                                    <div class="taitel-img">
                                        <span>
                                        <svg width="100" height="8" viewBox="0 0 100 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6.5C14.3957 2.77999 52.7496 -2.53808 99 6.38995" stroke="#405FF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                        </span>
                                    </div>
                                    <span>{{ __('translate.Related Listing') }}</span>
                                </div>
                                <h2 >{{ __('translate.Related Property Listing') }}</h2>
                            </div>
                        </div>

                        <div class="row mt-56px  ">
                            @foreach ($related_listings as $related_car)
                                <div class="col-lg-3">
                                    <div class="brand-car-item">
                                        <div class="brand-car-item-img">
                                            <img src="{{ getImageOrPlaceholder($related_car->thumb_image, '304x217') }}" alt="thumb">

                                            <div class="brand-car-item-img-text">

                                                <div class="text-df">
                                                    @if ($related_car->offer_price)
                                                        <p class="text">{{ calculate_percentage($related_car->regular_price, $related_car->offer_price) }}% {{ __('translate.Off') }}</p>
                                                    @endif

                                                    @if ($related_car->condition == 'New')
                                                        <p class="text text-two ">{{ __('translate.New') }}</p>
                                                    @else
                                                        <p class="text text-two ">{{ __('translate.Used') }}</p>
                                                    @endif
                                                </div>

                                                <div class="icon-main">

                                                    @guest('web')
                                                        <a  href="javascript:;" class="icon before_auth_wishlist">
                                                            <span>
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.61204 2.324L9 2.96329L8.38796 2.324C6.69786 0.558667 3.95767 0.558666 2.26757 2.324C0.577476 4.08933 0.577475 6.95151 2.26757 8.71684L7.77592 14.4704C8.45196 15.1765 9.54804 15.1765 10.2241 14.4704L15.7324 8.71684C17.4225 6.95151 17.4225 4.08934 15.7324 2.324C14.0423 0.558667 11.3021 0.558666 9.61204 2.324Z"
                                                                    stroke-width="1.3" stroke-linejoin="round"></path>
                                                            </svg>

                                                            </span>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('user.add-to-wishlist', $related_car->id) }}" class="icon">
                                                            <span>
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.61204 2.324L9 2.96329L8.38796 2.324C6.69786 0.558667 3.95767 0.558666 2.26757 2.324C0.577476 4.08933 0.577475 6.95151 2.26757 8.71684L7.77592 14.4704C8.45196 15.1765 9.54804 15.1765 10.2241 14.4704L15.7324 8.71684C17.4225 6.95151 17.4225 4.08934 15.7324 2.324C14.0423 0.558667 11.3021 0.558666 9.61204 2.324Z"
                                                                    stroke-width="1.3" stroke-linejoin="round"></path>
                                                            </svg>

                                                            </span>
                                                        </a>

                                                    @endif


                                                    <a href="{{ route('add-to-compare', $related_car->id) }}" class="icon">
                                                        <span>
                                                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 10V9C1 6.23858 3.23858 4 6 4H17L14 1"
                                                                    stroke-width="1.3" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path d="M17 10V11C17 13.7614 14.7614 16 12 16H1L4 19"
                                                                    stroke-width="1.3" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="brand-car-inner">
                                            <div class="brand-car-inner-item">
                                                <span>{{ $related_car?->brand?->name }}</span>
                                                <p>
                                                    @if ($related_car->offer_price)
                                                        {{ currency($related_car->offer_price) }}
                                                    @else
                                                        {{ currency($related_car->regular_price) }}
                                                    @endif
                                                </p>
                                            </div>

                                            <a href="{{ route('listing', $related_car->slug) }}">
                                                <h3>{{ html_decode($related_car->title) }}</h3>
                                            </a>

                                            <div class="brand-car-inner-item-main">
                                                <div class="brand-car-inner-item-two">
                                                    <div class="brand-car-inner-item-thumb">
                                                        <span>
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M7 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                                <path d="M22 17v-3h-20"></path>
                                                                <path d="M2 8v9"></path>
                                                                <path d="M12 14h10v-2a3 3 0 0 0 -3 -3h-7v5z"></path>
                                                              </svg>

                                                        </span>
                                                    </div>

                                                    <span>
                                                        {{ html_decode($related_car->exterior_color) }}
                                                    </span>
                                                </div>
                                                <div class="brand-car-inner-item-two">
                                                    <div class="brand-car-inner-item-thumb">
                                                        <span>
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M4 12h16a1 1 0 0 1 1 1v3a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4v-3a1 1 0 0 1 1 -1z"></path>
                                                                <path d="M6 12v-7a2 2 0 0 1 2 -2h3v2.25"></path>
                                                                <path d="M4 21l1 -1.5"></path>
                                                                <path d="M20 21l-1 -1.5"></path>
                                                              </svg>

                                                        </span>
                                                    </div>

                                                    <span>
                                                        {{ html_decode($related_car->year) }}
                                                    </span>
                                                </div>
                                                <div class="brand-car-inner-item-two">
                                                    <div class="brand-car-inner-item-thumb">
                                                        <span>
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M10 16v5"></path>
                                                                <path d="M14 16v5"></path>
                                                                <path d="M9 9h6l-1 7h-4z"></path>
                                                                <path d="M5 11c1.333 -1.333 2.667 -2 4 -2"></path>
                                                                <path d="M19 11c-1.333 -1.333 -2.667 -2 -4 -2"></path>
                                                                <path d="M12 4m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                              </svg>

                                                        </span>
                                                    </div>

                                                    <span>
                                                        {{ html_decode($related_car->transmission) }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="brand-car-btm-txt-btm">
                                                <h6 class="brand-car-btm-txt"><span>{{ __('translate.Listed by') }} :</span>{{ html_decode($related_car?->dealer?->name) }}
                                                </h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!--Cars Listing-part-end -->

</main>

@endsection


@push('js_section')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        "use strict";

        function carReview(rating){
            $(".car_rat").each(function(){
                var car_rat = $(this).data('rating')
                if(car_rat > rating){
                    $(this).removeClass('fa-solid fa-star').addClass('fa-regular fa-star');
                }else{
                    $(this).removeClass('fa-regular fa-star').addClass('fa-solid fa-star');
                }
            })
            $("#car_rating").val(rating);
        }
    </script>


    <script>
        "use strict";

        let currencyPosition = "{{ Session::get('currency_position') }}";
        let currencyIcon = "{{ Session::get('currency_icon') }}";

        function calculateMonthlyPayment(loanAmount, interestRate, loanTermYears)
        {
            let monthlyInterestRate = (interestRate / 100) / 12;
            let totalPayments = loanTermYears * 12;

            let monthlyPayment = loanAmount * (monthlyInterestRate * Math.pow(1 + monthlyInterestRate, totalPayments))
                / (Math.pow(1 + monthlyInterestRate, totalPayments) - 1);

            return monthlyPayment;
        }

        $("#calculate_btn").on("click", function(e){
            e.preventDefault();

            let loanAmount = $("#loan_amount").val();
            let interestRate = $("#interest_rate").val();
            let loanTermYears = $("#total_year").val();

            if(!loanAmount){
                toastr.error("{{ __('translate.Please fill out the form') }}")
                return;
            }

            if(!interestRate){
                toastr.error("{{ __('translate.Please fill out the form') }}")
                return;
            }

            if(!loanTermYears){
                toastr.error("{{ __('translate.Please fill out the form') }}")
                return;
            }

            let finalPayment = calculateMonthlyPayment(loanAmount, interestRate, loanTermYears)
            finalPayment = finalPayment.toFixed(2)
            finalPayment = finalPayment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            let appendCurrency = '';

            if(currencyPosition == 'before_price'){
                appendCurrency = `${currencyIcon}${finalPayment}`
            }else if(currencyPosition == 'before_price_with_space'){
                appendCurrency = `${currencyIcon} ${finalPayment}`
            }else if(currencyPosition == 'after_price'){
                appendCurrency = `${finalPayment}${currencyIcon}`
            }else if(currencyPosition == 'after_price_with_space'){
                appendCurrency = `${finalPayment} ${currencyIcon}`
            }

            $("#monthly_payment").html(appendCurrency);
        })

        $("#loan_amount").on("keyup", function(e){
            let enteredValue = e.target.value;
            let numericValue = enteredValue.replace(/[^0-9.]/g, '');
            $(this).val(numericValue);
        })

        $("#interest_rate").on("keyup", function(e){
            let enteredValue = e.target.value;
            let numericValue = enteredValue.replace(/[^0-9.]/g, '');
            $(this).val(numericValue);
        })

        $("#total_year").on("keyup", function(e){
            let enteredValue = e.target.value;
            let numericValue = enteredValue.replace(/[^0-9.]/g, '');
            $(this).val(numericValue);
        })

        $("#reset_btn").on("click", function(){
            $("#loan_amount").val('');
            $("#interest_rate").val('');
            $("#total_year").val('');

            let appendCurrency = '';

            if(currencyPosition == 'before_price'){
                appendCurrency = `${currencyIcon}0.00`
            }else if(currencyPosition == 'before_price_with_space'){
                appendCurrency = `${currencyIcon} 0.00`
            }else if(currencyPosition == 'after_price'){
                appendCurrency = `0.00${currencyIcon}`
            }else if(currencyPosition == 'after_price_with_space'){
                appendCurrency = `0.00 ${currencyIcon}`
            }

            $("#monthly_payment").html(appendCurrency);

        })

    </script>


@endpush

@extends('admin.master_layout')
@section('title')
    <title>{{ __('Property for rent') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Property for rent') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Property') }} >> {{ __('Property for rent') }}</p>
@endsection

@section('body-content')

<!-- crancy Dashboard -->
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="row">
                            <div class="col-12 mg-top-30">
                                <!-- Product Card -->
                                <div class="crancy-product-card translation_main_box">

                                    <div class="crancy-customer-filter">
                                        <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                            <div class="crancy-header__form crancy-header__form--customer">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Switch to language translation') }}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="translation_box">
                                        <ul >
                                            @foreach ($language_list as $language)
                                            <li><a href="{{ route('admin.property.edit', ['property' => $car->id, 'lang_code' => $language->lang_code] ) }}">
                                                @if (request()->get('lang_code') == $language->lang_code)
                                                    <i class="fas fa-eye"></i>
                                                @else
                                                    <i class="fas fa-edit"></i>
                                                @endif

                                                {{ $language->lang_name }}</a></li>
                                            @endforeach
                                        </ul>

                                        <div class="alert alert-secondary" role="alert">

                                            @php
                                                $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                            @endphp

                                        <p>{{ __('translate.Your editing mode') }} : <b>{{ $edited_language->lang_name }}</b></p>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Product Card -->
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End crancy Dashboard -->

    <form action="{{ route('admin.property.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="purpose" value="{{ $car->purpose }}">
        <input type="hidden" name="lang_code" value="{{ $car_translate->lang_code }}">
        <input type="hidden" name="translate_id" value="{{ $car_translate->id }}">

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Basic Information') }}</h4>
                                        </div>

                                        <div class="row">

                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-12 mg-top-form-20">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="crancy__item-form--group w-100 h-100">
                                                            <label class="crancy__item-label">{{ __('translate.Thumbnail Image') }} </label>
                                                            <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                <input type="file" class="btn-check" name="thumb_image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                <label class="crancy-image-video-upload__label" for="input-img1">
                                                                    <img id="view_img" src="{{ asset($car->thumb_image) }}">
                                                                    <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('User') }} * </label>
                                                    <select class="form-select crancy__item-input select2" name="agent_id">
                                                        <option value="">{{ __('translate.Select Dealer') }}</option>
                                                        @foreach ($dealers as $dealer)
                                                            <option  {{ $dealer->id == $car->agent_id ? 'selected' : '' }} value="{{ $dealer->id }}">{{ $dealer->name }} - {{ $dealer->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            @endif

                                            <div class="{{ admin_lang() == request()->get('lang_code') ? 'col-md-6' : 'col-12' }}">

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Title') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="title" id="title" value="{{ html_decode($car_translate->title) }}">
                                                </div>
                                            </div>


                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Slug') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="slug" id="slug" value="{{ html_decode($car->slug) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('Property Type') }} * </label>
                                                    <select class="form-select crancy__item-input select2" name="brand_id">
                                                        <option value="">{{ __('translate.Select Brand') }}</option>
                                                        @foreach ($brands as $brand)
                                                            <option  {{ $brand->id == $car->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->translate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Country') }} * </label>
                                                    <select class="form-select crancy__item-input " name="country_id" id="country_id">
                                                        <option value="">{{ __('translate.Select Country') }}</option>
                                                        @foreach ($countries as $country)
                                                            <option {{ $country->id == $car->country_id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.City') }} * </label>
                                                    <select class="form-select crancy__item-input select2" name="city_id" id="city_id">
                                                        <option value="">{{ __('translate.Select City') }}</option>
                                                        @foreach ($cities as $city)
                                                            <option {{ $city->id == $car->city_id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->translate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Rent Period') }} * </label>
                                                    <select class="form-select crancy__item-input" name="rent_period">
                                                        
                                                        <option {{ 'Monthly' == $car->rent_period ? 'selected' : '' }} value="Monthly">{{ __('translate.Monthly') }}</option>
                                                        <option {{ 'Yearly' == $car->rent_period ? 'selected' : '' }} value="Yearly">{{ __('translate.Yearly') }}</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Regular Price') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="regular_price" id="regular_price" value="{{ html_decode($car->regular_price) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Offer Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="offer_price" id="offer_price" value="{{ html_decode($car->offer_price) }}">
                                                </div>
                                            </div>

                                            @endif

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} * </label>

                                                    <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description">{!! html_decode($car_translate->description) !!}</textarea>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    @if (admin_lang() == request()->get('lang_code'))
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Key Information') }}</h4>
                                        </div>

                                        <div class="row">

                                            <input type="hidden" name="condition" value="Used">

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Owner Type') }} * </label>
                                                    <select class="form-select crancy__item-input" name="seller_type">
                                                        <option {{ 'Joint Owner' == $car->seller_type ? 'selected' : '' }}  value="Joint Owner">{{ __('translate.Joint Owner') }}</option>
                                                        <option {{ 'Personal' == $car->seller_type ? 'selected' : '' }} value="Personal">{{ __('translate.Indivisual') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Share') }} * </label>
                                                    <select class="form-select"  name="body_type">
                                                        <option {{ 'No' == $car->body_type ? 'selected' : '' }} value="No">{{ __('translate.No') }}</option>
                                                        <option {{ 'Yes' == $car->body_type ? 'selected' : '' }} value="Yes">{{ __('translate.Yes') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="engine_size" class="form-label">{{ __('translate.Square Feet') }}
                                                        <span>*</span> </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ __('translate.Square Feet') }}" name="engine_size" id="engine_size" value="{{ html_decode($car->engine_size) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="drive" class="form-label">{{ __('translate.available from') }}
                                                        <span>*</span> </label>
                                                        <select name="drive" class="form-control" id="drive">
                                                            <option {{ 'January' == $car->drive ? 'selected' : '' }} value="January">{{ __('translate.January') }}</option>
                                                            <option {{ 'February' == $car->drive ? 'selected' : '' }} value="February">{{ __('translate.February') }}</option>
                                                            <option {{ 'March' == $car->drive ? 'selected' : '' }} value="March">{{ __('translate.March') }}</option>
                                                            <option {{ 'April' == $car->drive ? 'selected' : '' }} value="April">{{ __('translate.April') }}</option>
                                                            <option {{ 'May' == $car->drive ? 'selected' : '' }} value="May">{{ __('translate.May') }}</option>
                                                            <option {{ 'June' == $car->drive ? 'selected' : '' }} value="June">{{ __('translate.June') }}</option>
                                                            <option {{ 'July' == $car->drive ? 'selected' : '' }} value="July">{{ __('translate.July') }}</option>
                                                            <option {{ 'August' == $car->drive ? 'selected' : '' }} value="August">{{ __('translate.August') }}</option>
                                                            <option {{ 'September' == $car->drive ? 'selected' : '' }} value="September">{{ __('translate.September') }}</option>
                                                            <option {{ 'October' == $car->drive ? 'selected' : '' }} value="October">{{ __('translate.October') }}</option>
                                                            <option {{ 'November' == $car->drive ? 'selected' : '' }} value="November">{{ __('translate.November') }}</option>
                                                            <option {{ 'December' == $car->drive ? 'selected' : '' }} value="December">{{ __('translate.December') }}</option>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Interior Color') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="interior_color" id="interior_color" value="{{ html_decode($car->interior_color) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="exterior_color" class="form-label">{{ __('translate.Bedroom') }}
                                                        <span>*</span> </label>
                                                        <select class="form-control" name="exterior_color" id="exterior_color">
                                                            @for ($i = 1; $i < 9; $i++)
                                                            <option {{ $i == $car->exterior_color ? 'selected' : '' }} value={{ $i }}>{{ $i }}</option>
                                                        @endfor
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="year" class="form-label">{{ __('translate.Bathroom') }}
                                                        <span>*</span> </label>
                                                        <select class="form-control" name="year" id="year">
                                                            @for ($i = 1; $i < 9; $i++)
                                                                <option {{ $i == $car->year ? 'selected' : '' }} value={{ $i }}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="mileage" class="form-label">{{ __('translate.Kitchen') }}
                                                        <span>*</span> </label>
                                                        <select class="form-control" name="mileage" id="mileage">
                                                            @for ($i = 1; $i < 5; $i++)
                                                                <option {{ $i == $car->mileage ? 'selected' : '' }} value={{ $i }}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="number_of_owner" class="form-label">{{ __('translate.Balcony') }}
                                                        <span>*</span> </label>
                                                        <select class="form-control" name="number_of_owner" id="number_of_owner">
                                                            @for ($i = 1; $i < 5; $i++)
                                                                <option {{ $i == $car->number_of_owner ? 'selected' : '' }} value={{ $i }}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="fuel_type" class="form-label">{{ __('translate.Floor Number') }}
                                                        <span>*</span> </label>
                                                        <select class="form-control" name="fuel_type" id="fuel_type">
                                                            @for ($i = 1; $i < 20; $i++)
                                                                <option {{ $i == $car->fuel_type ? 'selected' : '' }} value={{ $i }}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="condition" class="form-label">{{ __('translate.Property Condition') }}
                                                        <span>*</span> </label>
                                                        <select class="form-select"  name="condition">
                                                            <option {{ 'Used' == $car->condition ? 'selected' : '' }} value="Used">{{ __('translate.Used') }}</option>
                                                            <option {{ 'New' == $car->condition ? 'selected' : '' }} value="New">{{ __('translate.New') }}</option>
                                                        </select>
                                                </div>
                                            </div>
                                            


                                            <div class="col-md-3">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label for="transmission" class="form-label">{{ __('translate.Gender') }}
                                                        <span>*</span> </label>
                                                        <select class="form-control" name="transmission" id="transmission">
                                                            <option {{ 'Male' == $car->transmission ? 'selected' : '' }} value="Male">Male</option>
                                                            <option {{ 'Female' == $car->transmission ? 'selected' : '' }} value="Female">Female</option>
                                                            <option {{ 'Family' == $car->transmission ? 'selected' : '' }} value="Family">Family</option>
                                                        </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Features') }}</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <div class="crancy__item-form--added">
                                                        @foreach ($features as $index => $feature)
                                                            <div class="form-group crancy-form-checkbox__added mg-top-15">
                                                                <input {{ in_array($feature->id, $existing_features) ? 'checked' : '' }} class="d-none" type="checkbox" id="add1{{ $index }}" name="features[]" value="{{ $feature->id }}">
                                                                <label class="crancy-form-labe2" for="add1{{ $index }}">{{ $feature->translate->name }} <span><i class="fas fa-times"></i></span></label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
    @endif

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Video Information') }}</h4>
                                        </div>

                                        <div class="row">

                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-12 mg-top-form-20">
                                                <div class="row ">
                                                    <div class="col-md-3">
                                                        <div class="crancy__item-form--group w-100 h-100">
                                                            <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                            <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                <input type="file" class="btn-check" name="video_image" id="video_image" autocomplete="off" onchange="previewVideoImage(event)">
                                                                <label class="crancy-image-video-upload__label" for="video_image">
                                                                    <img id="view_video_img" src="{{ asset($car->video_image) }}">
                                                                    <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Youtube Video Id') }} </label>
                                                    <input class="crancy__item-input" type="text" name="video_id" id="video_id" value="{{ html_decode($car->video_id) }}">
                                                </div>
                                            </div>
                                            @endif

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} </label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="video_description" id="video_description">{{ html_decode($car_translate->video_description) }}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Address & Google Map') }}</h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Address') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="address" id="address" value="{{ html_decode($car_translate->address) }}">
                                                </div>
                                            </div>

                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Google Map Embed Link') }} * </label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="google_map" id="google_map">{{ html_decode($car->google_map) }}</textarea>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.SEO Information') }}</h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.SEO title') }} </label>
                                                    <input class="crancy__item-input" type="text" name="seo_title" id="seo_title" value="{{ html_decode($car_translate->seo_title) }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.SEO Description') }} </label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="seo_description" id="seo_description">{{ html_decode($car_translate->seo_description) }}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update Data') }}</button>

                                        @if ($car->approved_by_admin == 'pending')
                                            <button class="crancy-btn mg-top-25 approval_button" type="button" data-bs-toggle="modal" data-bs-target="#approvalModal">{{ __('translate.Make Approval') }}</button>
                                        @endif

                                        @if ($car->is_featured == 'disable')
                                            <button class="crancy-btn mg-top-25 approval_featured" type="button" data-bs-toggle="modal" data-bs-target="#featureModal">{{ __('translate.Make Featured') }}</button>

                                        @else
                                            <button class="crancy-btn mg-top-25 approval_featured" type="button" data-bs-toggle="modal" data-bs-target="#featureRemoveModal">
                                            {{ __('translate.Remove Featured') }}</button>
                                        @endif

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->


    </form>


    <!-- Approved Confirmation Modal -->
    <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to approved this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.car-approval', $car->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Approved') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Confirmation Modal -->
    <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Featured Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to featured this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.car-featured', $car->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Featured') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Featured Remove Confirmation Modal -->
     <div class="modal fade" id="featureRemoveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Featured Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to remove from featured?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.car-removed-featured', $car->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Removed') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>








@endsection


@push('style_section')

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
@endpush

@push('js_section')

    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#title").on("keyup",function(e){
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
                    $("#slug").val(slug);
                })

                $("#country_id").on("change", function(e){
                    let country_id = $(this).val();

                    if(country_id){
                        $.ajax({
                            type: "get",
                            url: "{{ url('cities-by-country') }}" + "/" + country_id,
                            success: function(response) {
                                $("#city_id").html(response)

                            },
                            error: function(response){
                                let empty_html = `<option value="">{{ __('translate.Select City') }}</option>`;
                                $("#city_id").html(empty_html)
                            }
                        });
                    }else{
                        let empty_html = `<option value="">{{ __('translate.Select City') }}</option>`;
                        $("#city_id").html(empty_html)
                    }
                })

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });

            });
        })(jQuery);

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewVideoImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_video_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };


    </script>
@endpush


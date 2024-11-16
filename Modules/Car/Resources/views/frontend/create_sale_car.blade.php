@extends('layout')
@section('title')
    <title>{{ __('translate.Create Sale Property') }}</title>
@endsection
@section('body-content')

<main>
    <!-- banner-part-start  -->

    <section class="inner-banner">
        <div class="inner-banner-img" style=" background-image: url({{ asset($breadcrumb) }}) ;"></div>
        <div class="container">
        <div class="col-lg-12">
            <div class="inner-banner-df">
                <h1 class="inner-banner-taitel">{{ __('translate.Create Sale Property') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('translate.Create Sale Property') }}</li>
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
                    <form action="{{ route('user.homes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="purpose" value="{{ request()->get('purpose') }}">
                        <input type="hidden" name="agent_id" value="{{ Auth::guard('web')->user()->id }}">

                        <div class="row gy-5">

                            <!-- Car Images  -->

                            <div class="col-lg-12">
                                <div class="car-images">
                                    <h3 class="car-images-taitel">{{ __('translate.Thumbnail Image') }} </h3>
                                    <div class="car-images-inner">
                                        <h6 class="car-images-inner-txt">{{ __('translate.Upload New Image') }} <span>*</span></h6>

                                        <div class="row">
                                            <div class="col-xl-3 col-lg-4">
                                                <div class="car-images-inner-item two">
                                                    <div class="car-images-inner-item-thumb">
                                                        <img src="{{ asset($setting->placeholder_image) }}" id="thumb_image">
                                                    </div>

                                                    <div class="choose-file-txt">
                                                        <h6>{{ __('translate.New') }} <span>{{ __('translate.Choose File') }}</span> {{ __('translate.Upload') }}</h6>
                                                        <input type="file" id="my-file" onchange="previewImage(event)" name="thumb_image">
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- Name & Description Overview  -->
                            <div class="col-lg-12">
                                <div class="car-images">
                                    <h3 class="car-images-taitel">{{ __('translate.Basic Information') }}</h3>

                                    <div class="car-images-inner">
                                        <div class="description-item">

                                            <div class="description-item-inner">
                                                <label for="title" class="form-label">{{ __('translate.Title') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control" id="title"
                                                    placeholder="{{ __('translate.Title') }}" name="title" value="{{ old('title') }}">
                                            </div>


                                        </div>
                                        <div class="description-item two">

                                            <div class="description-item-inner">
                                                <label for="slug" class="form-label">{{ __('translate.Slug') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control" id="slug"
                                                    placeholder="{{ __('translate.Slug') }}" name="slug" value="{{ old('slug') }}">
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="brand" class="form-label">{{ __('translate.Brand') }}
                                                    <span>*</span> </label>
                                                <select class="form-select select2" name="brand_id">
                                                    <option value="">{{ __('translate.Select Brand') }}</option>
                                                    @foreach ($brands as $brand)
                                                        <option  {{ $brand->id == old('brand_id') ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->translate->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="description-item two">

                                            <div class="description-item-inner">
                                                <label for="country" class="form-label">{{ __('translate.Country') }}
                                                    <span>*</span> </label>
                                                <select class="form-select select2" name="country_id" id="country_id">
                                                    <option value="">{{ __('translate.Select Country') }}</option>
                                                    @foreach ($countries as $country)
                                                        <option {{ $country->id == old('country_id') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="description-item-inner">
                                                <label for="city" class="form-label">{{ __('translate.City') }}
                                                    <span>*</span> </label>
                                                <select class="form-select select2" name="city_id" id="city_id">
                                                    <option value="">{{ __('translate.Select City') }}</option>

                                                </select>
                                            </div>


                                        </div>
                                        <div class="description-item two">

                                            <div class="description-item-inner">
                                                <label for="regular_price" class="form-label">{{ __('translate.Regular Price') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control" placeholder="{{ __('translate.Regular Price') }}"  name="regular_price" value="{{ old('regular_price') }}">
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="offer_price" class="form-label">{{ __('translate.Offer Price') }}
                                                </label>
                                                <input type="text" class="form-control" placeholder="{{ __('translate.Offer Price') }}" name="offer_price" value="{{ old('offer_price') }}">
                                            </div>

                                        </div>

                                        <div class="description-item two">

                                            <div class="description-item-inner">
                                                <label for="offer_price" class="form-label">{{ __('translate.Description') }}
                                                    <span>*</span>
                                                </label>
                                                <textarea class="summernote"  name="description" id="description">{!! old('description') !!}</textarea>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>


                            <!-- Key Information  -->
                            <div class="col-lg-12">
                                <div class="car-images">
                                    <h3 class="car-images-taitel">{{ __('translate.Key Information') }}</h3>

                                    <input type="hidden" name="condition" value="Used">

                                    <div class="car-images-inner">
                                        <div class="description-item">


                                            <div class="description-item-inner">
                                                <label for="exampleFormControlInput1" class="form-label">
                                                    {{ __('translate.Condition') }}
                                                    <span>*</span> </label>
                                                <select class="form-select"  name="condition">
                                                    <option {{ 'Used' == old('condition') ? 'selected' : '' }} value="Used">{{ __('translate.Used') }}</option>
                                                    <option {{ 'New' == old('condition') ? 'selected' : '' }} value="New">{{ __('translate.New') }}</option>
                                                </select>
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="exampleFormControlInput1" class="form-label">
                                                    {{ __('translate.Owner Type') }}
                                                    <span>*</span> </label>
                                                <select class="form-select"  name="seller_type">
                                                    <option {{ 'Personal' == old('seller_type') ? 'selected' : '' }} value="Personal">{{ __('translate.Indivisual') }}</option>
                                                    <option {{ 'Joint Owner' == old('seller_type') ? 'selected' : '' }}  value="Joint Owner">{{ __('translate.Joint Owner') }}</option>
                                                </select>
                                            </div>



                                            <div class="description-item-inner">
                                                <label for="body_type" class="form-label">{{ __('translate.Share') }} this?
                                                    <span>*</span> </label>
                                                    <select class="form-select"  name="body_type">
                                                        <option {{ 'No' == old('body_type') ? 'selected' : '' }} value="No">{{ __('translate.No') }}</option>
                                                        <option {{ 'Yes' == old('body_type') ? 'selected' : '' }} value="Yes">{{ __('translate.Yes') }}</option>
                                                    </select>
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="engine_size" class="form-label">{{ __('translate.Square Feet') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('translate.Square Feet') }}" name="engine_size" id="engine_size" value="{{ old('engine_size') }}">
                                            </div>




                                        </div>


                                        <div class="description-item two">
                                            <div class="description-item-inner">
                                                <label for="interior_color" class="form-label">{{ __('translate.Interior Color') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('translate.Interior Color') }}" name="interior_color" id="interior_color" value="{{ old('interior_color') }}">
                                            </div>


                                            <div class="description-item-inner">
                                                <label for="exterior_color" class="form-label">{{ __('translate.Bedroom') }}
                                                    <span>*</span> </label>
                                                <select name="exterior_color" class="form-control" id="exterior_color">
                                                    
                                                    @for ($i = 1; $i < 9; $i++)
                                                        <option value={{ $i }}>{{ $i }}</option>
                                                    @endfor
                                                    
                                                </select>
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="year" class="form-label">{{ __('translate.Bathroom') }}
                                                    <span>*</span> </label>
                                                    
                                                    <select class="form-control" name="year" id="year">
                                                        @for ($i = 1; $i < 9; $i++)
                                                            <option value={{ $i }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="mileage" class="form-label">{{ __('translate.Kitchen') }}
                                                    <span>*</span> </label>
                                                    <select class="form-control" name="mileage" id="mileage">
                                                        @for ($i = 1; $i < 5; $i++)
                                                            <option value={{ $i }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                            </div>

                                        </div>

                                        <div class="description-item two">

                                            <div class="description-item-inner">
                                                <label for="drive" class="form-label">{{ __('translate.available from') }}<span>*</span> </label>
                                                <select name="drive" class="form-control" id="drive">
                                                    <option {{ 'January' == old('drive') ? 'selected' : '' }} value="January">{{ __('translate.January') }}</option>
                                                    <option {{ 'February' == old('drive') ? 'selected' : '' }} value="February">{{ __('translate.February') }}</option>
                                                    <option {{ 'March' == old('drive') ? 'selected' : '' }} value="March">{{ __('translate.March') }}</option>
                                                    <option {{ 'April' == old('drive') ? 'selected' : '' }} value="April">{{ __('translate.April') }}</option>
                                                    <option {{ 'May' == old('drive') ? 'selected' : '' }} value="May">{{ __('translate.May') }}</option>
                                                    <option {{ 'June' == old('drive') ? 'selected' : '' }} value="June">{{ __('translate.June') }}</option>
                                                    <option {{ 'July' == old('drive') ? 'selected' : '' }} value="July">{{ __('translate.July') }}</option>
                                                    <option {{ 'August' == old('drive') ? 'selected' : '' }} value="August">{{ __('translate.August') }}</option>
                                                    <option {{ 'September' == old('drive') ? 'selected' : '' }} value="September">{{ __('translate.September') }}</option>
                                                    <option {{ 'October' == old('drive') ? 'selected' : '' }} value="October">{{ __('translate.October') }}</option>
                                                    <option {{ 'November' == old('drive') ? 'selected' : '' }} value="November">{{ __('translate.November') }}</option>
                                                    <option {{ 'December' == old('drive') ? 'selected' : '' }} value="December">{{ __('translate.December') }}</option>
                                                </select>
                                                
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="number_of_owner" class="form-label">{{ __('translate.Balcony') }}
                                                    <span>*</span> </label>
                                                    <select class="form-control" name="number_of_owner" id="number_of_owner">
                                                        @for ($i = 1; $i < 5; $i++)
                                                            <option value={{ $i }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="fuel_type" class="form-label">{{ __('translate.Floor Number') }}
                                                    <span>*</span> </label>
                                                    <select class="form-control" name="fuel_type" id="fuel_type">
                                                        @for ($i = 1; $i < 20; $i++)
                                                            <option value={{ $i }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                            </div>

                                            <div class="description-item-inner">
                                                <label for="transmission" class="form-label">{{ __('translate.Gender') }}
                                                    <span>*</span> </label>
                                                    <select class="form-control" name="transmission" id="transmission">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Family">Family</option>
                                                    </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Features  -->
                            <div class="col-lg-12">
                                <div class="car-images">
                                    <h3 class="car-images-taitel">{{ __('translate.Features') }}</h3>
                                    <div class="car-images-inner">
                                        <div class="description-item two">
                                            <div class="description-item-inner">
                                                <div class="description-feature-item">
                                                    @foreach ($features as $index => $feature)
                                                        <div class="description-feature-inner">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                                    id="flexCheckDefault{{ $index }}">
                                                                <label class="form-check-label" for="flexCheckDefault{{ $index }}">
                                                                    {{ $feature->translate->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Video  -->
                            <div class="col-lg-12">
                                <div class="car-images">
                                    <h3 class="car-images-taitel">{{ __('translate.Video Information') }}</h3>
                                    <div class="car-images-inner">
                                        <h6 class="car-images-inner-txt">{{ __('translate.Video Image') }}</h6>

                                        <div class="row">
                                            <div class="col-xl-3 col-lg-4">
                                                <div class="car-images-inner-item two">
                                                    <div class="car-images-inner-item-thumb">
                                                        <img src="{{ asset($setting->placeholder_image) }}" id="view_video_image">
                                                    </div>

                                                    <div class="choose-file-txt">
                                                        <h6>{{ __('translate.New') }} <span>{{ __('translate.Choose File') }}</span> {{ __('translate.Upload') }}</h6>
                                                        <input type="file" id="my-file-one" onchange="previewVideoImage(event)" name="video_image">
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="car-images-inner">
                                        <div class="description-item">
                                            <div class="description-item-inner">
                                                <label for="video_id" class="form-label">{{ __('translate.Youtube Video Id') }} </label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('translate.Youtube Video Id') }}" name="video_id" id="video_id" value="{{ old('video_id') }}">
                                            </div>

                                        </div>
                                        <div class="description-item two">
                                            <div class="description-item-inner">
                                                <div class="description-item-inner">
                                                    <label for="video_description" class="form-label">{{ __('translate.Description') }} </label>
                                                    <textarea class="form-control" id="video_description"
                                                        rows="5" placeholder="{{ __('translate.Description') }}" name="video_description">{{ old('video_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Locations  -->
                            <div class="col-lg-12">
                                <div class="car-images">
                                    <h3 class="car-images-taitel">{{ __('translate.Address & Google Map') }}</h3>

                                    <div class="car-images-inner">
                                        <div class="description-item">

                                            <div class="description-item-inner">
                                                <label for="address" class="form-label">{{ __('translate.Address') }} <span>*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('translate.Type your address') }}" name="address" id="address" value="{{ old('address') }}">
                                            </div>


                                        </div>
                                        <div class="description-item two">
                                            <div class="description-item-inner">
                                                <label for="google_map" class="form-label">{{ __('translate.Google Map Embed Link') }} <span>*</span></label>
                                                <textarea class="form-control" id="exampleFormControlTextarea121"
                                                    rows="10" placeholder="{{ __('translate.Past google embed code') }}" name="google_map" id="google_map">{{ old('google_map') }}</textarea>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Locations  -->
                            <div class="col-lg-12">
                                <div class="car-images">
                                    <h3 class="car-images-taitel">{{ __('translate.SEO Information') }}</h3>

                                    <div class="car-images-inner">
                                        <div class="description-item">
                                            <div class="description-item-inner">
                                                <label for="seo_title" class="form-label">{{ __('translate.SEO Title') }}</label>
                                                <input type="text" class="form-control" id="seo_title"
                                                    placeholder="{{ __('translate.SEO Title') }}" name="seo_title" value="{{ old('seo_title') }}">
                                            </div>
                                        </div>
                                        <div class="description-item two">
                                            <div class="description-item-inner">
                                                <label class="form-label" for="seo_description">{{ __('translate.SEO Description') }}</label>
                                                <textarea class="form-control" id="seo_description"
                                                    rows="4" placeholder="{{ __('translate.SEO Description') }}" name="seo_description">{{ old('seo_description') }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- button  -->
                            <div class="col-lg-12">
                            <div class="description-form-btn" >
                                <button class="thm-btn-two">{{ __('translate.Save Now') }}</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        </div>
    </section>

    <!-- dashboard-part-end -->

    @include('profile.logout')



</main>

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
                var output = document.getElementById('thumb_image');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewVideoImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_video_image');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };


    </script>
@endpush

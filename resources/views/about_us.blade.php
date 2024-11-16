@extends('layout')
@section('title')
<title>{{ $seo_setting->seo_title }}</title>
<meta name="title" content="{{ $seo_setting->seo_title }}">
<meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('body-content')

<main>
    <!-- banner-part-start  -->
    <section class="inner-banner">
        <div class="inner-banner-img" style=" background-image: url({{ asset($breadcrumb) }}) ;"></div>
        <div class="container">
            <div class="col-lg-12">
                <div class="inner-banner-df">
                    <h1 class="inner-banner-taitel">{{ __('translate.About Us') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('translate.About Us') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-part-end -->

    <!-- about-part-start -->
    <section class="about ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="{{ asset($about_us->about_image) }}" alt="img">
                    </div>
                </div>

                <div class="col-lg-7 about-pl ">
                    <div class="taitel two">
                        <div class="taitel-img">
                            <span>
                                <svg width="193" height="6" viewBox="0 0 193 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5C27.1079 1.98151 101.859 -2.24439 192 5" stroke="#405FF2"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <span>{{ $about_us->header }}</span>
                    </div>

                    <h2 class="about-taitel">{{ $about_us->title }}</h2>

                    <div class="about_description">
                        {!! clean($about_us->description) !!}
                    </div>
                    <div class="about-item-main">
                        <div class="about-item">
                            <div class="icon">
                                <img src="{{ asset($about_us->car_image) }}" alt="img">
                            </div>

                            <div class="text">
                                <h6>{{ $about_us->total_car }}</h6>

                                <p>{{ $about_us->total_car_title }}</p>
                            </div>
                        </div>
                        <div class="about-item">
                            <div class="icon">
                                <img src="{{ asset($about_us->review_image) }}" alt="img">
                            </div>

                            <div class="text">
                                <h6>{{ $about_us->total_review }}</h6>

                                <p>{{ $about_us->total_review_title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-part-end -->


    <!-- Categories-part-start -->
    <section class="categories categories-three py-120px">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-sm-8 col-md-8  ">
                    <div class="taitel two">
                        <div class="taitel-img">
                            <span>
                                <svg width="71" height="8" viewBox="0 0 71 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 6.08589C15.5 0.18137 51.5 -0.151783 70 6.42496" stroke="#405FF2"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <span>{{ ('Property') }}</span>
                    </div>
                    <h2>{{ __('translate.Explore Popular Property') }}</h2>
                </div>
            </div>


            <div class="row g-3  mt-30px ">
                @foreach ($brands->take(6) as $index => $brand)
                <div class="col-xl-2 col-xl-2 col-lg-4 col-6 col-md-6" data-aos="fade-right" data-aos-delay="50">
                    <div class="categories-logo">
                        <a href="{{ route('listings', ['brands[]' => $brand->id]) }}" class="categories-logo-thumb">
                            <img src="{{ getImageOrPlaceholder($brand->image,'180x90') }}" alt="logo">
                        </a>
                        <div class="categories-logo-txt">
                            <a href="{{ route('listings', ['brands[]' => $brand->id]) }}">
                                <p>{{ $brand->name }}</p>
                            </a>
                            <h5>{{ $brand->total_car }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Categories-part-end -->
    <!--  vedio-part-start -->

    <section class="vedio vedio-two ">
        <div class="container vedio-bg" style="background: url({{ asset($homepage->video_bg_image) }});">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 ">
                    <div class="taitel two">
                        <div class="taitel-img">
                            <span>
                                <svg width="150" height="6" viewBox="0 0 150 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5C21.2302 1.98151 79.1525 -2.24439 149 5" stroke="white"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                        <span>
                            {{ $homepage->video_short_title }}
                        </span>
                    </div>

                    <h2 class="vedio-taitel">{{ $homepage->video_title }}</h2>
                    <div class="vedio-btn">
                        <a href="{{ route('contact-us') }}" class="thm-btn-two">{{ __('translate.Contact Us') }}</a>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 ">
                    <div class="vedio-item">
                        <a class="my-video-links" data-autoplay="true" data-vbtype="video"
                            href="https://youtu.be/{{ $homepage->video_id }}">
                            <div class="vedio-item-icon">
                                <span>
                                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_48_15344)">
                                            <path
                                                d="M37.5687 14.6098L20.0823 1.7875C18.7166 0.787393 17.1005 0.18501 15.4133 0.0471256C13.7261 -0.0907584 12.0337 0.241243 10.5237 1.00633C9.01364 1.77141 7.74494 2.9397 6.85822 4.38168C5.9715 5.82367 5.5014 7.48303 5.50001 9.17584V34.8333C5.49738 36.5278 5.96503 38.1898 6.8509 39.6342C7.73678 41.0787 9.00612 42.2489 10.5176 43.0148C12.0292 43.7806 13.7236 44.1119 15.4122 43.9719C17.1009 43.8319 18.7176 43.226 20.0823 42.2217L37.5687 29.3993C38.729 28.5478 39.6724 27.4351 40.3228 26.1512C40.9731 24.8673 41.312 23.4484 41.312 22.0092C41.312 20.57 40.9731 19.151 40.3228 17.8671C39.6724 16.5832 38.729 15.4705 37.5687 14.619V14.6098Z" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  vedio-part-end -->


    

    <!--   Testimonial-part-start -->
    <section class=" testimonial two py-120px">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="sm-df">
                        <div class="t-df-sm">
                            <div class="taitel two">
                                <div class="taitel-img">
                                    <span>
                                        <svg width="154" height="6" viewBox="0 0 154 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 5C21.777 1.98151 81.2647 -2.24439 153 5" stroke="#405FF2"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>
                                <span>
                                    {{ __('translate.Our Testimonial') }}
                                </span>
                            </div>

                            <h2 class="testimonial-taitel">{{ __('translate.Customer Say About Our Services') }}</h2>
                            <p class="testimonial-p">{{ __('translate.We have 15m+ Global and Local Happy Customers') }}
                            </p>
                        </div>

                        <div class="t-df-item">
                            <div class="testimonial-slick-btn">
                                <div class="feature-slick-prev testimonial-slick-prve">
                                    <span>
                                        <svg width="23" height="16" viewBox="0 0 23 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 1L1 8M1 8L8 15M1 8L22 8" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="feature-slick-next testimonial-slick-next">
                                    <span>
                                        <svg width="23" height="16" viewBox="0 0 23 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 15L22 8M22 8L15 0.999999M22 8L1 8" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1"></div>

                <div class="col-lg-6">
                    <div class="testimonial-slick-main">
                        <div class="testimonial-slick">

                            @foreach ($testimonials as $index => $testimonial)
                            <div class="testimonial-slick-top-main">
                                <div class="testimonial-slick-top">
                                    <div class="testimonial-slick-top-thumb">
                                        <img src="{{ getImageOrPlaceholder($testimonial->image, '60x60') }}" alt="thumb">
                                    </div>

                                    <div class="testimonial-slick-top-txt">
                                        <h4>{{ $testimonial->name }}</h4>
                                        <p>{{ $testimonial->designation }}</p>
                                    </div>
                                </div>
                                <p class="testimonial-p">{{ $testimonial->comment }}</p>
                                <div class="testimonial-btm-item">
                                    <div class="testimonial-btm-item-thumb">
                                        <span>
                                            <svg width="54" height="40" viewBox="0 0 54 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M49.5406 4.06287C47.1408 1.36698 44.2282 0 40.8838 0C37.8781 0 35.33 1.07033 33.3098 3.18112C31.3024 5.27842 30.2845 7.88345 30.2845 10.924C30.2845 13.7974 31.3127 16.3578 33.3404 18.5344C35.129 20.4545 37.3822 21.6759 40.0496 22.1736C39.5831 25.7101 36.4568 28.9111 30.7387 31.7003L29.709 32.2026L33.9307 39.9964L34.8837 39.5134C46.976 33.3839 53.1072 24.7214 53.1072 13.7664C53.1072 9.98687 51.9073 6.72226 49.5406 4.06287ZM34.8388 37.062L32.7236 33.1576C39.0843 29.8246 42.3069 25.8181 42.3069 21.2372V20.2564L41.3324 20.146C38.7077 19.849 36.6191 18.8322 34.9474 17.0374C33.2877 15.2557 32.4808 13.2562 32.4808 10.924C32.4808 8.43381 33.2711 6.39791 34.8964 4.69953C36.5086 3.01495 38.4672 2.19605 40.8839 2.19605C43.6124 2.19605 45.9074 3.28432 47.9 5.5229C49.9262 7.79943 50.9111 10.4958 50.9111 13.7663C50.9111 18.7872 49.4973 23.3202 46.7091 27.2392C44.0485 30.9785 40.0582 34.2797 34.8388 37.062Z"
                                                    fill="#EE3536" />
                                                <path
                                                    d="M19.7738 4.0579C17.3473 1.36532 14.4226 0 11.0807 0C8.07213 0 5.53555 1.0723 3.54187 3.18703C1.5653 5.2835 0.563015 7.88657 0.563015 10.924C0.563015 13.7973 1.59113 16.3577 3.61863 18.5344C5.40351 20.4504 7.62964 21.6706 10.2474 22.1706C9.78658 25.7098 6.68627 28.9124 1.01401 31.7021L0 32.2006L4.1166 40L5.07906 39.5144C17.2262 33.3852 23.3853 24.7223 23.3853 13.7663C23.3852 9.98387 22.17 6.71749 19.7738 4.0579ZM5.04711 37.0583L2.98964 33.1599C9.30416 29.8257 12.5037 25.8182 12.5037 21.2371V20.2585L11.5314 20.1463C8.96052 19.8496 6.89766 18.8327 5.22542 17.0373C3.56573 15.2558 2.75906 13.2561 2.75906 10.924C2.75906 8.4306 3.53782 6.39252 5.13964 4.69362C6.72402 3.01308 8.6675 2.19605 11.0807 2.19605C13.8119 2.19605 16.122 3.28588 18.1422 5.52798C20.1925 7.80328 21.1892 10.4981 21.1892 13.7663C21.1892 18.7864 19.7692 23.3188 16.9683 27.2374C14.2963 30.9756 10.2888 34.2763 5.04711 37.0583Z"
                                                    fill="#EE3536" />
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="testimonial-btm-item-txt-item">
                                        <h6>{{ __('translate.Quality Service') }}</h6>
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="testimonial-position-img">
                        <div class="testimonial-position-img-left">
                        </div>
                        <div class="testimonial-position-img-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   Testimonial-part-end -->
</main>
@endsection

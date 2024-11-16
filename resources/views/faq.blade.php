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
                <h1 class="inner-banner-taitel">{{ __('translate.FAQ') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('translate.FAQ') }}</li>
                    </ol>
                </nav>
            </div>
            </div>
        </div>
    </section>
    <!-- banner-part-end -->


    <!--FAQ-part-start -->

    <section class=" faq">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne-{{ $index }}">
                                    <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne-{{ $index }}" aria-expanded="true" aria-controls="collapseOne-{{ $index }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapseOne-{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }} "
                                    aria-labelledby="headingOne-{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! clean($faq->answer) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--FAQ-part-end -->

    

</main>
@endsection

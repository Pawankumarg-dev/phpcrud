@extends('frontend.layouts.app')

@section('title','Services')

@section('content')

<div class="services-wrapper py-5">
    <div class="container">
        <div class="row mt-5 pt-5">

            <div class="col text-center" style="color:#111">
                <h2 class="display-4 fw-bold">Our Digital Marketing Services</h2>
                <p class="lead mt-3">
                    End-to-End Solutions to Grow Your Brand
                </p>
            </div>
        </div>
        <!-- SEO -->
        <div class="service-card orange-bg mb-5 mt-5 ">

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="service-content">
                        <h2>Search Engine Optimization</h2>

                        <p>
                            Dominate Google Rankings. From local SEO to eCommerce
                            optimization, we help your business rank higher and
                            drive quality traffic that converts.
                        </p>

                        <a href="{{ route('contact') }}" class="custom-btn">
                            Contact Us
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/Untitled-design-2.jpg') }}"
                         class="service-image img-fluid"
                         alt="">
                </div>

            </div>
        </div>

        <!-- ADS -->
        <div class="service-card green-bg mb-5">
            <div class="row align-items-center flex-lg-row-reverse">

                <div class="col-lg-6">
                    <div class="service-content">
                        <h2>Meta & Google Ads</h2>

                        <p>
                            Reach. Engage. Convert. We create scroll-stopping
                            ad creatives, razor-sharp targeting, and high-ROI
                            campaigns to turn browsers into buyers.
                        </p>

                        <a href="{{ route('contact') }}" class="custom-btn">
                            Contact Us
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/Untitled-design-4.jpg') }}"
                         class="service-image img-fluid"
                         alt="">
                </div>

            </div>
        </div>

        <!-- WEBSITE -->
        <div class="service-card dark-bg mb-5">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="service-content">
                        <h2>Website Design & Development</h2>

                        <p>
                            Your 24/7 Digital Storefront. We build beautiful,
                            responsive, and fast-loading websites that build
                            trust and drive conversions.
                        </p>

                        <a href="{{ route('contact') }}" class="custom-btn">
                            Contact Us
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/Untitled-design-8.png') }}"
                         class="service-image img-fluid"
                         alt="">
                </div>

            </div>
        </div>

        <!-- SOCIAL -->
        <div class="service-card green-bg mb-5">
            <div class="row align-items-center flex-lg-row-reverse">

                <div class="col-lg-6">
                    <div class="service-content">
                        <h2>Social Media Management</h2>

                        <p>
                            Stay Relevant, Stay Viral. We manage your social
                            media profiles with consistent posting, engaging
                            content, and growth-focused strategies.
                        </p>

                        <a href="{{ route('contact') }}" class="custom-btn">
                            Contact Us
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/Untitled-design-5.jpg') }}"
                         class="service-image img-fluid"
                         alt="">
                </div>

            </div>
        </div>

        <!-- PRODUCT SHOOT -->
        <div class="service-card dark-bg mb-5">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="service-content">
                        <h2>Product Shoot</h2>

                        <p>
                            Showcase Your Brand Like Never Before. High-quality
                            visuals sell. We offer professional product
                            photography that highlights every detail.
                        </p>

                        <a href="{{ route('contact') }}" class="custom-btn">
                            Contact Us
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/product-shoot.jpg') }}"
                         class="service-image img-fluid"
                         alt="">
                </div>

            </div>
        </div>

    </div>
</div>

<style>

.services-wrapper{
    background:#f4f4f4;
}

.service-card{
    padding:60px;
    border-radius:30px;
    overflow:hidden;
}

.orange-bg{
    background:#ff7a2f;
}

.green-bg{
    background:#14b300;
}

.dark-bg{
    background:#111;
}

.service-content h2{
    color:#fff;
    font-size:52px;
    font-weight:700;
    line-height:1.1;
    margin-bottom:25px;
}

.service-content p{
    color:#fff;
    font-size:22px;
    line-height:1.8;
    margin-bottom:35px;
    max-width:650px;
}

.custom-btn{
    display:inline-block;
    background:#fff;
    color:#ff7a2f;
    padding:14px 28px;
    border-radius:10px;
    text-decoration:none;
    font-weight:700;
    transition:0.3s;
}

.custom-btn:hover{
    background:#000;
    color:#fff;
}

.service-image{
    width:100%;
    max-width:520px;
    height:320px;
    object-fit:cover;
    border-radius:24px;
}

/* Tablet */
@media(max-width:991px){

    .service-card{
        padding:40px;
        text-align:center;
    }

    .service-content h2{
        font-size:38px;
    }

    .service-content p{
        font-size:18px;
        margin:auto;
        margin-bottom:30px;
    }

    .service-image{
        margin-top:30px;
    }
}

/* Mobile */
@media(max-width:576px){

    .service-card{
        padding:25px;
        border-radius:20px;
    }

    .service-content h2{
        font-size:30px;
    }

    .service-content p{
        font-size:16px;
        line-height:1.6;
    }

    .custom-btn{
        padding:12px 22px;
        font-size:15px;
    }

    .service-image{
        height:240px;
    }
}

</style>

@endsection

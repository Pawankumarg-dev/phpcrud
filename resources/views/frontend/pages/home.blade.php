@extends('frontend.layouts.app')

@section('title','Home')

@section('content')

<!-- HERO -->

<section class="hero-section">

    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <div class="container">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6 pt-5">

                <div class="hero-content"
                     data-aos="fade-right">

                    <span class="hero-tag">
                        GROWTH PARTNERS
                    </span>

                    <h2 class="hero-title">
                        <em>The</em> Beast <strong>Behind</strong> Your <strong>Brand’s</strong> Success
                    </h2>

                    <p class="hero-text">
                        We’re not just a digital marketing agency, we’re growth partners. From content to conversions, we turn clicks into clients.
                    </p>

                    <div class="hero-buttons">

                        <a href="/contact"
                           class="btn main-btn">
                            Contact Us
                        </a>

                        <a href="#services"
                           class="btn outline-btn">
                            Explore Services
                        </a>

                    </div>

                    <div class="hero-meta mt-4">
                        <span>Trusted by brands across India, UK, and USA</span>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="hero-visual d-flex justify-content-center"
                     data-aos="fade-left">

                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=900&q=80"
                         alt="Brand success"
                         class="img-fluid rounded-4 hero-hero-image">

                </div>

            </div>

        </div>

    </div>

</section>

<!-- SERVICES -->

<section class="services-section"
         id="services">

    <div class="container">

        <div class="text-center mb-5"
             data-aos="fade-up">

            <span class="section-tag">
                OUR SERVICES
            </span>

            <h2 class="section-title">

                Premium Digital Solutions

            </h2>

        </div>

        <div class="row">

            <div class="col-lg-4"
                 data-aos="fade-up">

                <div class="service-card">

                    <div class="service-icon">

                        <i class="bi bi-code-slash"></i>

                    </div>

                    <h3>
                        Web Development
                    </h3>

                    <p>

                        Laravel scalable web applications.

                    </p>

                </div>

            </div>

            <div class="col-lg-4"
                 data-aos="fade-up">

                <div class="service-card">

                    <div class="service-icon">

                        <i class="bi bi-phone"></i>

                    </div>

                    <h3>
                        Responsive Design
                    </h3>

                    <p>

                        Premium responsive business website.

                    </p>

                </div>

            </div>

            <div class="col-lg-4"
                 data-aos="fade-up">

                <div class="service-card">

                    <div class="service-icon">

                        <i class="bi bi-bar-chart"></i>

                    </div>

                    <h3>
                        SEO Optimization
                    </h3>

                    <p>

                        Better ranking and performance.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- COUNTER -->

<section class="counter-section">

    <div class="container">

        <div class="row text-center">

            <div class="col-lg-3 col-6">

                <div class="counter-box">

                    <h2 class="counter"
                        data-target="250">

                        0 

                    </h2>

                    <p>Projects</p>

                </div>

            </div>

            <div class="col-lg-3 col-6">

                <div class="counter-box">

                    <h2 class="counter"
                        data-target="120">

                        0

                    </h2>

                    <p>Clients</p>

                </div>

            </div>

            <div class="col-lg-3 col-6">

                <div class="counter-box">

                    <h2 class="counter"
                        data-target="50">

                        0

                    </h2>

                    <p>Experts</p>

                </div>

            </div>

            <div class="col-lg-3 col-6">

                <div class="counter-box">

                    <h2 class="counter"
                        data-target="15">

                        0

                    </h2>

                    <p>Years</p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
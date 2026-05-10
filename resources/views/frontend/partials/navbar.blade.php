<nav class="navbar navbar-expand-lg fixed-top custom-navbar">

    <div class="container">

        <a class="navbar-brand logo-text"
           href="{{ route('home') }}">

            VentureBeast

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">

            <i class="bi bi-list"></i>

        </button>

        <div class="collapse navbar-collapse"
             id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('home') }}">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('about') }}">

                        About

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('services') }}">

                        Services

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('portfolio') }}">

                        Portfolio

                    </a>

                </li>

                <li class="nav-item ms-lg-3">

                    <a class="btn main-btn"
                       href="#">

                        Get Started

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>
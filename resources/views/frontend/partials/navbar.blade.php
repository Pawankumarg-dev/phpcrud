<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand logo-text"
           href="{{ route('home') }}">

            Venture<span>Beast</span>

        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- NAVBAR -->
        <div class="collapse navbar-collapse"
             id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <!-- HOME -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <!-- ABOUT -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                       href="{{ route('about') }}">
                        About
                    </a>
                </li>

                <!-- SERVICES -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                       href="{{ route('services') }}">
                        Services
                    </a>
                </li>

                <!-- CONTACT -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                       href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>

                <!-- BUTTON -->
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a href="{{ route('contact') }}"
                       class="nav-btn">
                        Book Call
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

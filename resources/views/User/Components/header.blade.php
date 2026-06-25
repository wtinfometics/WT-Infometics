<!-- Loader / Spinner Start -->
<div id="spinner" class="loader-wrapper">
    <div class="loader-content wow zoomIn">
        <!-- Logo / Brand -->
        <div class="loader-brand">
            WT <span>Infometics</span>
        </div>
        <!-- Animated Spinner -->
        <div class="loader-ring"></div>
        <p class="loader-text">
            Loading Digital Experience...
        </p>
    </div>
</div>
<!-- Loader / Spinner End -->

<!-- Topbar Start -->
<!-- <div class="container-fluid topbar d-none d-lg-block wow fadeInDown">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-2">
            Left Info
            <div class="topbar-left d-flex gap-4">
                <div>
                    <i class="fas fa-phone-alt"></i>
                    <span>+91 9019049147</span>
                </div>
                <div>
                    <i class="fas fa-envelope"></i>
                    <span>info@wtinfometics.com</span>
                </div>
            </div>
            Right Social
            <div class="topbar-right d-flex gap-2">
                <a target="_blank" href="https://www.facebook.com/profile.php?id=61552061820126">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a target="_blank" href="https://www.instagram.com/wt_infometics/">
                    <i class="fab fa-instagram"></i>
                </a>
                <a target="_blank" href="https://www.linkedin.com/company/wtinfometics/?viewAsMember=true">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a target="_blank" href="https://www.youtube.com/@WTInfometics">
                    <i class="fab fa-youtube"></i>
                </a>
                <a target="_blank" href="https://wa.me/919019049147">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>
</div> -->
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top main-navbar wow fadeInUp">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="/">
            WT <span>Infometics</span>
        </a>
        <!-- Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="/services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blogs') ? 'active' : '' }}" href="/blogs">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->
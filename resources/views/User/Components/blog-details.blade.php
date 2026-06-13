 <!-- Blog Details Start -->
    <div class="container-fluid py-5 blog-section wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <!-- MAIN CONTENT -->
                <div class="col-lg-8 blog-details">
                    <!-- FEATURE IMAGE -->
                    <div class="blog-img mb-4 wow fadeInUp">
                        <img src="{{ asset('User/img/blog-1.jpg')}}" class="img-fluid rounded-4" alt="">
                    </div>
                    <!-- TITLE -->
                    <h1 class="blog-title wow fadeInUp">
                        How Digital Marketing Transforms Modern Business Growth in 2026
                    </h1>
                    <!-- META -->
                    <div class="blog-meta wow fadeInUp">
                        <span>📅 Jan 01, 2026</span>
                        <span>👨‍💻 By Marketing Team</span>
                        <span>📊 SEO • Ads • Branding</span>
                    </div>
                    <!-- INTRO -->
                    <p class="mt-4 wow fadeInUp">
                        In today’s competitive digital world, businesses are not just competing locally —
                        they are competing globally. A strong digital marketing strategy helps brands
                        increase visibility, generate leads, and convert customers effectively.
                    </p>
                    <p class="wow fadeInUp">
                        Digital marketing is not just about running ads — it's about understanding customer behavior,
                        optimizing funnels, and building long-term brand trust.
                    </p>
                    <!-- SECOND SECTION -->
                    <h3 class="mt-5 wow fadeInUp">🚀 Core Pillars of Digital Growth</h3>
                    <ul class="custom-list wow fadeInUp">
                        <li>Search Engine Optimization (SEO) for organic traffic</li>
                        <li>Performance Marketing for instant conversions</li>
                        <li>Social Media Branding & Engagement</li>
                        <li>Conversion Rate Optimization (CRO)</li>
                    </ul>
                    <!-- TAGS + SHARE -->
                    <div class="blog-footer wow fadeInUp mt-5">
                        <div class="tags">
                            <span>#SEO</span>
                            <span>#Marketing</span>
                            <span>#Branding</span>
                            <span>#Growth</span>
                        </div>
                        <div class="share">
                            <span>Share:</span>
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-twitter"></i>
                            <i class="bi bi-linkedin"></i>
                        </div>
                    </div>
                    <!-- AUTHOR BOX -->
                    <div class="author-box wow fadeInUp mt-5">
                        <img src="img/user.jpg" alt="">
                        <div>
                            <h5>Digital Marketing Expert Team</h5>
                            <p>
                                We are a performance-driven agency helping businesses grow through SEO,
                                ads, social media, and conversion-focused strategies.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- SIDEBAR -->
                <!-- Pagination Starts -->
                    @include('User.Components.sidebar')
                <!-- Pagination Ends -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
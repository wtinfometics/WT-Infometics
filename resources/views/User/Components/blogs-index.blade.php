    <!-- Blog Section Start -->
    <section class="blog-section py-5 position-relative overflow-hidden">
        <div class="container"> <!-- Section Header -->
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"> <span class="header-badge"> Latest Insights
                </span>
                <h2 class="display-5 fw-bold mt-4"> Digital Marketing <span class="text-gradient">Insights &
                        Resources</span> </h2>
            </div>
            @if(count($data) > 0)
            <div class="row g-4"> <!-- Featured Blog -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="featured-blog">
                        <div class="blog-image"> <img
                                src="{{ !empty($data[0]->featured_image) ? asset($data[0]->featured_image) : '' }}"
                                alt=""> <span class="category">
                                {{ $data[0]->categories->category_name }} </span> </div>
                        <div class="blog-content">
                            <div class="blog-meta"> <span> <i class="far fa-user"></i> WT Infometics </span> <span> <i
                                        class="far fa-calendar-alt"></i>
                                    {{ $data[0]->created_at->format('d F Y') }}</span> </div>
                            <h3><a href="{{ url('blogs/' . $data[0]->post_slug) }}">
                                    {{ \Illuminate\Support\Str::limit($data[0]->post_title, 75, '…') }} </a></h3>
                            <p> {{ \Illuminate\Support\Str::limit($data[0]->short_description, 200, '…') }} </p>
                            <a href="{{ url('blogs/' . $data[0]->post_slug) }}" class="read-more-btn"> Read Full Article
                                <i class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div> <!-- Blog Cards -->
                <div class="col-lg-6">
                    <div class="row g-4"> <!-- Blog 1 -->
                        @forelse (collect($data)->skip(1)->take(4) as $blog)
                            <div class="col-12 wow fadeInRight" data-wow-delay="0.3s">
                                <div class="mini-blog-card">
                                    <img src="{{ !empty($blog->featured_image) ? asset($blog->featured_image) : '' }}"
                                        alt="{{ $blog->post_title }}">
                                    <div class="mini-content">
                                        <span class="mini-category">
                                            {{ $blog->categories->category_name }}
                                        </span>
                                        <h5>
                                            <a href="{{ url('blogs/' . $blog->post_slug) }}">
                                                {{ \Illuminate\Support\Str::limit($blog->post_title, 75, '…') }}
                                            </a>
                                        </h5>
                                        <small>
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $blog->created_at->format('d M Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h2> Only One Posts Exists</h2>
                        @endforelse

                    </div>
                </div>
            </div> <!-- CTA -->
            <div class="text-center mt-5 wow zoomIn" data-wow-delay="1s"> <a href="#" class="btn-blog"> View All
                    Articles <i class="fas fa-arrow-right ms-2"></i> </a> </div>
            @else
            <h2> Posts Not Exists </h2>
            @endif
        </div>
    </section>
    <!-- Blog Section End -->

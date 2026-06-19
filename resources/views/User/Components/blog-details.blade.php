 <!-- Blog Details Start -->
    <div class="container-fluid py-5 blog-section wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <!-- MAIN CONTENT -->
                <div class="col-lg-8 blog-details">
                    <!-- FEATURE IMAGE -->
                    <div class="blog-img mb-4 wow fadeInUp">
                        <img src="{{ !empty($data->featured_image) ? asset($data->featured_image) : ''}}" class="img-fluid rounded-4" alt="">
                    </div>
                    <!-- TITLE -->
                    <h1 class="blog-title wow fadeInUp">
                       {{$data->post_title}}
                    </h1>
                    <!-- META -->
                    <div class="blog-meta wow fadeInUp">
                        <span>📅 {{$data->created_at->format('d F Y') }}</span>
                        <span>👨‍💻 By WT Infometics </span>
                        <span>📊 {{$data->categories->category_name }}</span>
                    </div> 
                    <!-- INTRO -->
                    {!! $data->description !!}
                    <!-- TAGS + SHARE -->
                    <div class="blog-footer wow fadeInUp mt-5">
                        <div class="tags">
                             <!--Display The Keywords-->
                            @php
                                $keywords = explode(',', $data->postMeta->keywords ?? '');
                            @endphp

                            @foreach(array_slice($keywords, 0, 5) as $keyword)
                                @if(trim($keyword) != '')
                                    <span>#{{ trim($keyword) }}</span>
                                @endif
                            @endforeach
                        </div>
                        @php
                            $url = url('blogs/' . $data->post_slug);
                            $title = urlencode($data->post_title);
                        @endphp

                        <div class="share">
                             <!-- Display Social Share-->
                            <span>Share:</span>

                            {{-- Facebook --}}
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>

                            {{-- Twitter / X --}}
                            <a target="_blank" href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}" target="_blank">
                                <i class="bi bi-twitter"></i>
                            </a>

                            {{-- LinkedIn --}}
                            <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}" target="_blank">
                                <i class="bi bi-linkedin"></i>
                            </a>
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
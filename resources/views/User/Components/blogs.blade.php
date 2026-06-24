   <!-- Blog Section Start -->
   <div class="container blogs-page my-5"> <!-- SECTION HEADER -->
       <div class="text-center mb-5 wow fadeInUp"> <span class="header-badge"> <i class="bi bi-journal-richtext me-2"></i>
               Knowledge Hub </span>
           <h1 class="display-4 fw-bold mt-4"> Insights, Innovation & <span class="text-gradient"> Digital Growth

       </div>
       
           <div class="row g-5"> <!-- BLOGS -->
               <div class="col-lg-8"> <!-- FEATURED ARTICLE -->
                   <div class="row g-4 mt-3">
                   @if (count($PostData) > 0)
                       @forelse($paginatedData as $post)
                           <div class="col-md-6 wow fadeInUp">
                               <article class="blog-card">
                                   <div class="blog-thumb"> <img
                                           src="{{ !empty($post->featured_image) ? asset($post->featured_image) : '' }}"
                                           class="img-fluid" alt="{{ $post->post_title }}"> <span
                                           class="blog-category">{{ $post->categories->category_name }} </span> </div>
                                   <div class="blog-body">
                                       <div class="blog-info"> <span> <i class="bi bi-person"></i> Admin</span> <span>
                                               <i class="bi bi-clock"></i> {{ $post->created_at->format('d F Y') }}
                                           </span> </div>
                                       <h4><a href="{{ url('blogs/' . $post->post_slug) }}">
                                               {{ \Illuminate\Support\Str::limit($post->post_title, 75, '…') }} </a>
                                       </h4>
                                       <p>{{ \Illuminate\Support\Str::limit($post->short_description, 200, '…') }} </p>
                                       <a href="#"> Read More <i class="bi bi-arrow-right"></i> </a>
                                   </div>
                               </article>
                           </div>
                       @empty
                           <h2>No Blogs Exists </h2>
                       @endforelse

@else
           <h2>No Blogs Exists </h2>
       @endif
                   </div> <!-- PAGINATION -->
                   <!-- Pagination Starts -->
                   {{ $paginatedData->links('User.Components.pagination') }}
                   <!-- Pagination Ends -->
               </div> <!-- SIDEBAR -->
               <!-- Side Bar Starts -->
               @include('User.Components.sidebar')
               <!-- Side Bar Ends -->
           </div>
       
   </div>
   <!-- Blog Section Ends -->
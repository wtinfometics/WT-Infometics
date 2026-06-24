 <div class="col-lg-4">
     <div class="blog-sidebar"> <!-- SEARCH -->
         <div class="sidebar-card wow fadeInUp">
             <h5>Search Articles</h5>
             <form method="post" action="/blogs/search">
                 @csrf
                 <div class="input-group mt-3">
                     <input type="text" name="search_name"
                         class="form-control @error('search_name') is-invalid @enderror" placeholder="Search article...">
                     <button type="submit" class="btn btn-primary"> <i class="bi bi-search"></i> </button>
                     @error('search_name')
                         <div class="invalid-feedback">
                             {{ $message }}
                         </div>
                     @enderror
                 </div>
             </form>
         </div> <!-- CATEGORIES -->
         <div class="sidebar-card mt-4 wow fadeInUp">
             <h5>Popular Topics</h5>
             <div class="topic-list">
                 @forelse($categoryData as $category)
                     <a href="{{ url('blogs/category/' . $category->category_id) }}">{{ $category->category_name }}</a>
                 @empty
                     <h2>No Topic Exists </h2>
                 @endforelse
             </div>
         </div> <!-- RECENT POSTS -->
         <div class="sidebar-card mt-4 wow fadeInUp">
             <h5>Trending Posts</h5>
             @forelse($PostData as $post)
                 <div class="recent-post"> <img
                         src="{{ !empty($post->featured_image) ? asset($post->featured_image) : '' }}" class="img-fluid"
                         alt="{{ $post->post_title }}">
                     <div>
                         <h6><a href="{{ url('blogs/' . $post->post_slug) }}">
                                 {{ \Illuminate\Support\Str::limit($post->post_title, 50, '…') }}</a> </h6> <small>
                             {{ $post->categories->category_name }}</small>
                     </div>
                 </div>
             @empty
                 <h2>No Blogs Exists </h2>
             @endforelse

         </div> <!-- NEWSLETTER -->
         <div class="newsletter-card mt-4 wow zoomIn"> <i class="bi bi-envelope-paper-heart"></i>
             <h4> Weekly Tech Insights </h4>
             <p> Join 10,000+ readers receiving technology and business updates. </p> <input type="email"
                 class="form-control mb-3" placeholder="Enter Email"> <button class="btn btn-light w-100">
                 Subscribe Now </button>
         </div>
     </div>
 </div>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>'; ?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Home -->
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- About -->
    <url>
        <loc>{{ url('/about') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Services -->
    <url>
        <loc>{{ url('/services') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Contact -->
    <url>
        <loc>{{ url('/contact') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Services -->
    <url>
        <loc>{{ url('/services') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Blogs -->
    <url>
        <loc>{{ url('/blogs') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Dynamic Blogs -->
    @foreach ($postData as $post)
        <url>
            <loc>{{ url('/blogs/' . $post->post_slug) }}</loc>
            <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

</urlset>
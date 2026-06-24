@extends('User.main')

@section('metadata')
    <!-- Meta Tags -->
    <title>{{ $data->postMeta->meta_title }}</title>
    <meta content="{{ $data->postMeta->keywords }}" name="keywords">
    <meta content="{{ $data->postMeta->meta_description }}" name="description">

    <!-- Open-graph And Twiter Card -->
    <meta property="og:type" content="article">

    <meta property="og:title" content="{{ $data->postMeta->meta_title ?? $data->post_title }}">

    <meta property="og:description"
        content="{{ $data->postMeta->meta_description ?? Str::limit(strip_tags($data->description), 160) }}">

    <meta property="og:url" content="{{ url('/blogs/' . $data->post_slug) }}">

    <meta property="og:site_name" content="{{ 'WT Infometics' }}">

    <meta property="og:image" content="{{ asset($data->featured_image) }}">

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta property="article:published_time" content="{{ $data->created_at->toIso8601String() }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="{{ $data->postMeta->meta_title ?? $data->post_title }}">

    <meta name="twitter:description"
        content="{{ $data->postMeta->meta_description ?? Str::limit(strip_tags($data->description), 160) }}">

    <meta name="twitter:image" content="{{ asset($data->featured_image) }}">

    <meta name="twitter:url" content="{{ url('/blogs/' . $data->post_slug) }}">

    <meta name="twitter:site" content="@WInfometics">
    <meta name="twitter:creator" content="@WInfometics">

    <!-- Scheme Markup Article -->
    <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $data->postMeta->meta_title ?? $data->post_title,
    'description' => $data->postMeta->meta_description ?? \Illuminate\Support\Str::limit(strip_tags($data->description), 160),
    'image' => asset($data->featured_image),
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => url('/blogs/' . $data->post_slug),
    ],
    'author' => [
        '@type' => 'Organization',
        'name' => 'WT Infometics',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'WT Infometics',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('images/logo.png'),
        ],
    ],
    'datePublished' => optional($data->created_at)->toIso8601String(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')
    @include('User.Components.page-header', ['pageName' => 'Blog Details']) <!-- Index Page Header -->
    @include('User.Components.blog-details') <!-- Index Blog Details-->
@endsection
<!-- Page Content Ends -->
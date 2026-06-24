@extends('User.main')

<!-- Page Meta Data Starts -->
@section('metadata')
    <title>WT Infometics offers website development, SEO, and local SEO services to help businesses improve rankings,
        visibility, and online growth</title>
    <meta
        content="web development agency India, SEO company, local SEO experts, website design services, digital marketing agency, custom website development, WT Infometics"
        name="keywords">
    <meta
        content="WT Infometics offers website development, SEO, and local SEO services to help businesses improve rankings, visibility, and online growth."
        name="description">

    <!-- Open Graph Meta Tags -->

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="WT Infometics">
    <meta property="og:title" content="WT Infometics | Website Development & SEO Services to Grow Your Business">
    <meta property="og:description"
        content="WT Infometics offers website development, SEO, and local SEO services to help businesses improve rankings, visibility, and online growth">
    <meta property="og:url" content="https://wtinfometics.com">
    <meta property="og:image" content="https://wtinfometics.com/logo.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card Meta Tags -->

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="WT Infometics | Website Development & SEO Services to Grow Your Business">
    <meta name="twitter:description"
        content="WT Infometics offers website development, SEO, and local SEO services to help businesses improve rankings, visibility, and online growth">
    <meta name="twitter:image" content="https://wtinfometics.com/logo.png">
    <meta name="twitter:site" content="@wtinfometics">
    <meta name="twitter:creator" content="@wtinfometics">

    <!-- Organization schema -->
    <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    '@id' => url('/') . '/#organization',
    'name' => 'WT Infometics',
    'url' => url('/'),
    'logo' => asset('logo.png'),
    'image' => asset('assets/img/logo.png'),
    'description' => 'WT Infometics provides website development, SEO, local SEO, and digital marketing services to help businesses improve their online presence and generate more leads.',
    'email' => 'info@wtinfometics.com',
    'telephone' => '+919019049147',
    'sameAs' => [
        'https://www.facebook.com/profile.php?id=61552061820126',
        'https://www.instagram.com/wt_infometics/',
        'https://www.youtube.com/@WTInfometics',
        'https://www.linkedin.com/company/wtinfometics/'
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>

    <!-- Local Business schema -->
    <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    '@id' => url('/') . '/#professionalservice',
    'name' => 'WT Infometics',
    'url' => url('/'),
    'image' => asset('assets/img/logo.png'),
    'description' => 'WT Infometics offers Web Development, SEO, Local SEO, Social Media Marketing, E-Commerce Management, Google Ads, Meta Ads, and Digital Marketing services.',
    'telephone' => '+919019049147',
    'email' => 'info@wtinfometics.com',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Kumta',
        'postalCode' => '581343',
        'addressCountry' => 'IN'
    ],
    'openingHoursSpecification' => [
        [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday'
            ],
            'opens' => '09:30',
            'closes' => '18:00'
        ]
    ],
    'sameAs' => [
        'https://www.facebook.com/profile.php?id=61552061820126',
        'https://www.instagram.com/wt_infometics/',
        'https://www.youtube.com/@WTInfometics',
        'https://www.linkedin.com/company/wtinfometics/'
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')
    @include('User.Components.carousal') <!-- Index carousal -->
    @include('User.Components.about') <!-- Index about -->
    @include('User.Components.skills') <!-- Index Skills -->
    @include('User.Components.portfolio') <!-- Index Portfolios -->
    @include('User.Components.work-flow') <!-- Index Work -Flow -->
    @include('User.Components.service-index') <!-- Index Service For Index Page -->

    @include('User.Components.quote') <!-- Index Quote -->
    @include('User.Components.blogs-index') <!-- Index Blogs For Index Page -->
@endsection
<!-- Page Content Ends -->

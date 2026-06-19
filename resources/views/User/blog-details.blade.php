@extends('User.main')

@section('metadata')
<!-- Meta Tags -->
    <title>{{$data->postMeta->meta_title}}</title>
    <meta content="{{$data->postMeta->keywords}}" name="keywords">
    <meta content="{{$data->postMeta->meta_description}}" name="description">

    Open-graph And Twiter Card
    <meta property="og:type" content="article">

<meta property="og:title" content="{{ $data->postMeta->meta_title ?? $data->post_title }}">

<meta property="og:description"
      content="{{ $data->postMeta->meta_description ?? Str::limit(strip_tags($data->description), 160) }}">

<meta property="og:url"
      content="{{ url('/blogs/'. $data->post_slug) }}">

<meta property="og:site_name"
      content="{{ config('app.name') }}">

<meta property="og:image"
      content="{{ asset($data->featured_image) }}">

<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<meta property="article:published_time"
      content="{{ $data->created_at->toIso8601String() }}">

<meta property="article:modified_time"
      content="{{ $data->updated_at->toIso8601String() }}">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')

 @include('User.Components.page-header',['pageName'=>'Blog Details'])       <!-- Index Page Header -->
 @include('User.Components.blog-details')                                   <!-- Index Blog Details-->

@endsection
<!-- Page Content Ends -->
@extends('User.main')

<!-- Page Meta Data Starts -->
@section('metadata')
    <title>WT Infometics offers website development, SEO, and local SEO services to help businesses improve rankings, visibility, and online growth</title>
    <meta content="web development agency India, SEO company, local SEO experts, website design services, digital marketing agency, custom website development, WT Infometics" name="keywords">
    <meta content="WT Infometics offers website development, SEO, and local SEO services to help businesses improve rankings, visibility, and online growth." name="description">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')

 @include('User.Components.carousal')           <!-- Index carousal -->
 @include('User.Components.about')              <!-- Index about -->
 @include('User.Components.skills')             <!-- Index Skills -->
 @include('User.Components.portfolio')          <!-- Index Portfolios -->
 @include('User.Components.work-flow')          <!-- Index Work -Flow -->
 @include('User.Components.service-index')      <!-- Index Service For Index Page -->
 @include('User.Components.testimonials')       <!-- Index Testimonials  -->
 @include('User.Components.quote')              <!-- Index Quote -->
 @include('User.Components.blogs-index')        <!-- Index Blogs For Index Page -->
      
@endsection
<!-- Page Content Ends -->
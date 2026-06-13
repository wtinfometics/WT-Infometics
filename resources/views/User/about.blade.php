@extends('User.main')

<!-- Page Meta Data Starts -->
@section('metadata')
    <title>Electro - Electronics Website Template</title>
    <meta content="" name="keywords">
    <meta content="" name="description">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')

 @include('User.Components.page-header',['pageName'=>'About US'])       <!-- Index Page Header -->
 @include('User.Components.about')                                      <!-- Index About -->
 @include('User.Components.work-flow')                                  <!-- Index Work Flow -->
 @include('User.Components.faq')                                        <!-- Index FAQ -->
 @include('User.Components.testimonials')                               <!-- Index Testimonials -->

@endsection
<!-- Page Content Ends -->
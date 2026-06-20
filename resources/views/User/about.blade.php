@extends('User.main')

<!-- Page Meta Data Starts -->
@section('metadata')
    <title>About WT Infometics | Web Development & SEO Experts</title>
    <meta content="about web development company, SEO specialists India, digital marketing team, website designers, local SEO professionals, WT Infometics team" name="keywords">
    <meta content="WT Infometics is focused on building modern websites and delivering SEO strategies that help businesses grow their digital presence." name="description">
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
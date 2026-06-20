@extends('User.main')

<!-- Page Meta Data Starts -->
@section('metadata')
    <title>Contact WT Infometics | Website Development & SEO Services</title>
    <meta content="contact web development company, SEO consultation India, digital marketing contact, website design inquiry, local SEO agency contact, WT Infometics support" name="keywords">
    <meta content="Contact WT Infometics for website development and SEO services. Let’s discuss how to improve your online presence and business growth" name="description">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')
  
 @include('User.Components.page-header',['pageName'=>'Contact US'])     <!-- Index Page Header -->
 @include('User.Components.contact')                                    <!-- Index Contact -->

@endsection
<!-- Page Content Ends -->
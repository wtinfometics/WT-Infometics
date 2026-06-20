@extends('User.main')

<!-- Page Meta Data Starts -->
@section('metadata')
    <title>Services | Website Development, SEO & Digital Growth Solutions - WT Infometics</title>
    <meta content="website development services, SEO optimization services, local SEO packages, responsive web design, WordPress development, digital marketing services India" name="keywords">
    <meta content="We provide website development, SEO, local SEO, and digital marketing solutions designed to improve visibility and drive business results." name="description">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')

 @include('User.Components.page-header',['pageName'=>'Services'])       <!-- Index Service For Index Page -->
 @include('User.Components.services')                                   <!-- Index Service For Index Page -->

@endsection
<!-- Page Content Ends -->
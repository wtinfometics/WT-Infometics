@extends('User.main')

@section('metadata')
    <title>Electro - Electronics Website Template</title>
    <meta content="" name="keywords">
    <meta content="" name="description">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')

 @include('User.Components.page-header',['pageName'=>'Blog Details'])       <!-- Index Page Header -->
 @include('User.Components.blog-details')                                   <!-- Index Blog Details-->

@endsection
<!-- Page Content Ends -->
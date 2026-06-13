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
  
 @include('User.Components.page-header',['pageName'=>'Contact US'])     <!-- Index Page Header -->
 @include('User.Components.contact')                                    <!-- Index Contact -->

@endsection
<!-- Page Content Ends -->
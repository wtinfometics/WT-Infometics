@extends('User.main')

<!-- Page Meta Data Starts -->
@section('metadata')
   <title>Error Occurred | WT Infometics</title>
   <meta name="robots" content="noindex, follow">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')
    @include('User.Components.page-header', ['pageName' => 'Error']) <!-- Index Service For Index Page -->
    @include('User.Components.error') <!-- Index Error For Index Page -->
@endsection
<!-- Page Content Ends -->
@extends('User.main')

@section('metadata')
    <title>Blog | SEO Tips, Web Development & Digital Growth Insights - WT Infometics </title>
    <meta content="SEO blog India, web development tips, digital marketing guide, Google ranking tips, local SEO strategies, website optimization articles" name="keywords">
    <meta content="Explore expert insights on SEO, web development, and online growth strategies to improve your website performance and rankings." name="description">
@endsection
<!-- Page Meta Data Ends -->

<!-- Page Content Starts -->
@section('pagecontent')

 @include('User.Components.page-header',['pageName'=>'Blogs'])      <!-- Index Page Header -->
 @include('User.Components.blogs')                                  <!-- Index Blogs  -->

@endsection
<!-- Page Content Ends -->
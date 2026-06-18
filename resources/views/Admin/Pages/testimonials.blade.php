 @extends('Admin.Pages.main')
 @section('content')

@include('Admin.Components.testimonials',[
 'data'=>$data,
    'success'=>$success,
    'message'=>$message,
])        include Testimonials Component

 @endsection
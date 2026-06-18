 @extends('Admin.Pages.main')
 @section('content')

@include('Admin.Components.posts',[
 'data'=>$data,
    'success'=>$success,
    'message'=>$message,
])        include Posts Component

 @endsection
 @extends('Admin.Pages.main')
 @section('content')

@include('Admin.Components.categories',
[
 'data'=>$data,
 'success'=> $success,
 'message'=> $message
])        

 @endsection
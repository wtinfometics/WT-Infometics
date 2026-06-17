 @extends('Admin.Pages.main')
 @section('content')

@include('Admin.Components.project',[
    'data'=>$data,
    'success'=>$success,
    'message'=>$message,
])        include Projects Component

 @endsection
 @extends('Admin.Pages.main')
 @section('content')

@include('Admin.Components.add-post',[
 'categoryData'=>$categoryData,
 'success'=>$success ??'',
    'message'=>$message ??'',
])        include Add Post Component

 @endsection
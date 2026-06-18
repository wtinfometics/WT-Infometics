 @extends('Admin.Pages.main')
 @section('content')

 @include('Admin.Components.add-project',[
 'categoryData'=>categoryData,
 'success'=>$success ,
    'message'=>$message ,
 ])        include Add Project Component

 @endsection
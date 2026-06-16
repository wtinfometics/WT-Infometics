 @extends('Admin.Pages.main')
 @section('content')

 @include('Admin.Components.enquires',
 ['data'=>$data,'success'=>$success,'message'=>$message])        include Enquires Component

 @endsection
 @extends('Admin.Pages.main')
 @section('content')

@include('Admin.Components.contacts',
['data'=>$data,'success'=>$success,'message'=>$message])          

 @endsection
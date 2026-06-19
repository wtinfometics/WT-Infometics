 @extends('Admin.Pages.main')
 @section('content')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-file bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">Posts</span>
                                                        <h4>{{$data['posts']}}</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i
                                                                    class="text-c-blue f-16 icofont icofont-file m-r-10"></i>
                                                               Total Posts
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-briefcase bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Projects</span>
                                                        <h4>{{$data['projects']}}</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i
                                                                    class="text-c-pink f-16 icofont icofont-briefcase m-r-10"></i>
                                                                Total Projects
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i
                                                            class="icofont icofont-email bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Enquiries  </span>
                                                        <h4>{{$data['enquiries']}}</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i
                                                                    class="text-c-green f-16 icofont icofont-email m-r-10"></i>Total Enquiry
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i
                                                            class="icofont icofont-comment bg-c-yellow card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600"> Testimonials</span>
                                                        <h4>{{$data['testimonials']}}</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i
                                                                    class="text-c-yellow f-16 icofont icofont-comment m-r-10"></i>Total Testimonials
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                          
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

@endsection
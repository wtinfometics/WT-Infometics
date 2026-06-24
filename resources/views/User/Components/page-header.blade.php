 <!-- Page Header Start -->
 <section class="page-header position-relative overflow-hidden">
     <!-- Background Overlay -->
     <div class="header-overlay"></div>
     <!-- Floating Shapes -->
     <div class="shape shape-1"></div>
     <div class="shape shape-2"></div>
     <div class="shape shape-3"></div>
     <div class="container position-relative z-2">
         <div class="row justify-content-center align-items-center min-vh-50">
             <div class="col-lg-8 text-center">
                 <!-- Glass Card -->
                 <div class="header-content wow zoomIn" data-wow-delay="0.2s">
                     <div class="page-badge wow fadeInDown" data-wow-delay="0.1s">
                         <i class="fas fa-layer-group me-2"></i>
                         {{ $pageName }}
                     </div>
                     <h1 class="display-2 fw-bold text-white mb-4">
                         {{ $pageName }}
                     </h1>
                     <div class="breadcrumb-custom wow fadeInUp" data-wow-delay="0.3s">
                         <a href="#">
                             <i class="fas fa-home me-2"></i>Home
                         </a>
                         <span>
                             <i class="fas fa-angle-right"></i>
                         </span>
                         <a href="#" class="active">
                             {{ $pageName }}
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Page Header End -->
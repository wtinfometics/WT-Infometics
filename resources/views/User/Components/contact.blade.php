 <!-- Contact Section Start -->
 <section class="contact-section py-5">
     <div class="container">
         <!-- TITLE -->
         <div class="text-center mb-5 wow fadeInUp">
             <span class="header-badge">Contact Us</span>
             <h2 class="display-5 fw-bold mt-4">
                 If You Have Any Query,
                 <span class="text-gradient">Feel Free To Contact Us</span>
             </h2>
             <p class="text-muted">
                 We are here to help you with any questions or project requirements.
             </p>
         </div>
         <!-- CONTACT INFO CARDS -->
         <div class="row g-4 mb-5">
             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                 <div class="contact-card">
                     <div class="icon-box">
                         <i class="fa fa-phone-alt"></i>
                     </div>
                     <h5>Call to ask any question</h5>
                     <h4>+91 901 904 9147</h4>
                 </div>
             </div>
             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                 <div class="contact-card">
                     <div class="icon-box">
                         <i class="fa fa-envelope-open"></i>
                     </div>
                     <h5>Email to get free quote</h5>
                     <h4>info@wtinfometics.com</h4>
                 </div>
             </div>
             <div class="col-lg-4 d-none wow fadeInUp" data-wow-delay="0.5s">
                 <div class="contact-card">
                     <div class="icon-box">
                         <i class="fa fa-map-marker-alt"></i>
                     </div>
                     <h5>Visit our office</h5>
                     <h4>123 Street, NY, USA</h4>
                 </div>
             </div>
         </div>
         <!-- FORM + MAP -->
         <div class="row g-5 align-items-stretch">
             <!-- FORM -->
             <div class="col-lg-6 wow slideInLeft">
                 <div class="form-card">
                     <h4 class="mb-4">Send Message</h4>
                     @php
                         $alertType = null;
                         $alertMessage = null;

                         if (!empty($success) && !empty($message)) {
                             $alertType = $success ? 'success' : 'danger';
                             $alertMessage = $message;
                         } elseif (session()->has('success')) {
                             $alertType = 'success';
                             $alertMessage = session('success');
                         } elseif (session()->has('error')) {
                             $alertType = 'danger';
                             $alertMessage = session('error');
                         }
                     @endphp

                     @if ($alertMessage)
                         <div class="alert alert-{{ $alertType }} auto-hide">
                             {{ $alertMessage }}
                         </div>
                     @endif
                     <form method="post" action="/contact">
                         @csrf
                         <div class="row g-3">
                             <div class="col-md-6">
                                 <input type="text"
                                     class="form-control custom-input @error('name') is-invalid @enderror"
                                     name="name" placeholder="Your Name">
                                 @error('name')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                 @enderror
                             </div>
                             <div class="col-md-6">
                                 <input type="email"
                                     class="form-control custom-input @error('email') is-invalid @enderror"
                                     name="email" placeholder="Your Email">
                                 @error('email')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                 @enderror
                             </div>
                             <div class="col-12">
                                 <input type="text"
                                     class="form-control custom-input @error('subject') is-invalid @enderror"
                                     name="subject" placeholder="Subject">
                                 @error('subject')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                 @enderror
                             </div>
                             <div class="col-12">
                                 <textarea class="form-control custom-input @error('message') is-invalid @enderror" name="message" rows="5"
                                     placeholder="Message"></textarea>
                                 @error('message')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                 @enderror
                             </div>
                             <div class="col-12">
                                 <button class="btn-send" type="submit">
                                     Send Message
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
             <!-- MAP -->
             <div class="col-lg-5 wow slideInRight">
    <img src="{{ asset('User/img/contact2.webp') }}"
         alt="Contact Us"
         class="img-fluid rounded">
</div>
         </div>
     </div>
 </section>
 <!-- Contact Section Ends -->
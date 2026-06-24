  <!-- Quote Section Start -->
  <section class="quote-section py-5 position-relative overflow-hidden">
      <div class="container">
          <div class="row align-items-center g-5"> <!-- Left Content -->
              <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s"> <span class="header-badge "> Free Consultation
                  </span>
                  <h2 class="display-4 fw-bold mt-4 mb-4"> Let's Grow Your Business <span
                          class="text-gradient">Online</span> </h2>
                  <p class="lead text-muted mb-4"> Whether you need a website, SEO, Local SEO, Google Business
                      Profile, Social Media Marketing, or complete digital growth strategy, our experts are ready to
                      help. </p>
                  <div class="row mt-5">
                      <div class="col-md-6 mb-4 wow zoomIn" data-wow-delay="0.3s">
                          <div class="feature-box"> <i class="fas fa-clock"></i>
                              <div>
                                  <h6>Quick Response</h6>
                                  <p>Reply within 24 hours</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4 wow zoomIn" data-wow-delay="0.4s">
                          <div class="feature-box"> <i class="fas fa-headset"></i>
                              <div>
                                  <h6>Expert Support</h6>
                                  <p>Mon - Sat Support</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4 wow zoomIn" data-wow-delay="0.5s">
                          <div class="feature-box"> <i class="fas fa-chart-line"></i>
                              <div>
                                  <h6>Growth Strategy</h6>
                                  <p>Custom marketing plans</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4 wow zoomIn" data-wow-delay="0.6s">
                          <div class="feature-box"> <i class="fas fa-user-tie"></i>
                              <div>
                                  <h6>Dedicated Manager</h6>
                                  <p>Personal consultation</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="call-box wow fadeInUp" data-wow-delay="0.7s">
                      <div class="call-icon"> <i class="fas fa-phone-alt"></i> </div>
                      <div> <small>Call Us Anytime</small>
                          <h4>+91 9019049147</h4>
                      </div>
                  </div>
              </div> <!-- Form -->
              <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                  <div class="quote-form-card">
                      <h3 class="mb-4 text-center"> Request A Free Quote </h3>
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

                      <form method="post" action="/enquiry">
                          @csrf
                          <div class="row">
                              <div class="col-md-6 mb-3">
                                  <input type="text" name="name"
                                      class="form-control custom-input @error('name') is-invalid @enderror"
                                      placeholder="Full Name">
                                  @error('name')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="col-md-6 mb-3">
                                  <input type="email" name="email"
                                      class="form-control custom-input @error('email') is-invalid @enderror"
                                      placeholder="Email Address">
                                  @error('email')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="col-md-6 mb-3">
                                  <input type="tel" name="phone"
                                      class="form-control custom-input @error('phone') is-invalid @enderror"
                                      placeholder="Phone Number">
                                  @error('phone')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="col-md-6 mb-3">
                                  <input type="text" name="company_name"
                                      class="form-control custom-input @error('company_name') is-invalid @enderror"
                                      placeholder="Company Name">
                                  @error('company_name')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="col-12 mb-3">
                                  <select class="form-select custom-input @error('service_name') is-invalid @enderror"
                                      name="service_name">
                                      <option value=""> Select Service </option>
                                      <option value="Website Design"> Website Design </option>
                                      <option value="Website Development"> Website Development </option>
                                      <option value="SEO Services"> SEO Services </option>
                                      <option value="Local SEO"> Local SEO </option>
                                      <option value="Google Business Profile"> Google Business Profile </option>
                                      <option value="Social Media Marketing"> Social Media Marketing </option>
                                      <option value="Google Ads "> Google Ads </option>
                                      <option value="E-Commerce Marketing"> E-Commerce Marketing </option>
                                      <option value="Content Marketing"> Content Marketing </option>
                                      <option value="Complete Digital Marketing"> Complete Digital Marketing </option>
                                  </select>
                                  @error('service_name')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="col-12 mb-3">
                                  <textarea rows="5" class="form-control custom-input @error('message') is-invalid @enderror" name="message"
                                      placeholder="Tell us about your project..."></textarea>
                                  @error('message')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="col-12">
                                  <button class="btn quote-btn w-100" type="submit"> Get Free Consultation <i
                                          class="fas fa-arrow-right ms-2"></i> </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Quote Section End -->
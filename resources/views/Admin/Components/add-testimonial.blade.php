
<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="font-weight-bold">Add Testimonial</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="{{ isset($data->testimonial_id) ? url('/admin/testimonials/' . $data->testimonial_id) : url('/admin/testimonials') }}"
                                                        enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                                            placeholder="Enter The Person Name" value="{{ old('name', $data->name ?? '') }}">
                                                                             @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Rating
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <select name="rating" class="form-control @error('rating') is-invalid @enderror">
                                                                            <option value="opt1">Select Review Rating
                                                                            </option>
                                                                            <option value="1" {{ old('rating', $data->rating ?? '') == 1 ? 'selected' : '' }}>1</option>
                                                                            <option value="2" {{ old('rating', $data->rating ?? '') == 2 ? 'selected' : '' }}>2</option>
                                                                            <option value="3" {{ old('rating', $data->rating ?? '') == 3 ? 'selected' : '' }}>3</option>
                                                                            <option value="4" {{ old('rating', $data->rating ?? '') == 4 ? 'selected' : '' }}>4</option>
                                                                            <option value="5" {{ old('rating', $data->rating ?? '') == 5 ? 'selected' : '' }}>5</option>
                                                                        </select>
                                                                         @error('rating')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Picture
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="file" name="profile_img" class="form-control @error('profile_img') is-invalid @enderror">
                                                                         @error('profile_img')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label
                                                                        class="col-sm-3 col-form-label">Message</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea rows="5" name="message" cols="5" class="form-control @error('message') is-invalid @enderror"
                                                                            placeholder="Enter The Review Message">{{ old('message', $data->message ?? '') }}</textarea>
                                                                             @error('message')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-round ">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

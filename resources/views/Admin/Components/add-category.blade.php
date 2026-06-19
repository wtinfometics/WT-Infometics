<div class="pcoded-content">
    @include('Admin.Components.error')       
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="font-weight-bold">Add Category</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="{{ isset($data->category_id) ? url('/admin/categories/' . $data->category_id) : url('/admin/categories') }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Category
                                                                        Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror"
                                                                            placeholder="Enter The Category Name" value="{{ old('category_name', $data->category_name ?? '') }}">
                                                                            @error('category_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Status
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <select name="status" class="form-control @error('status') is-invalid @enderror" placeholder="select The status">
                                                                            <option value="">Select The Status</option>
                                                                            <option value=1 
                                                                            {{ isset($data) && $data->status == true ? 'selected' : '' }}> Active</option>
                                                                            <option value=0
                                                                            {{ isset($data) && $data->status == false ? 'selected' : '' }}> IDisabled</option>
                                                                        </select>
                                                                        @error('status')
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
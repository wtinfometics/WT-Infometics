
<div class="pcoded-content">
        @include('Admin.Components.error',['success'=>$success,'message'=>$message])        
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="font-weight-bold">Add Project</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="{{ isset($data->project_id) ? url('/admin/projects/' . $data->project_id) : url('/admin/projects') }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Project
                                                                        Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="project_name" class="form-control @error('project_name') is-invalid @enderror"
                                                                            placeholder="Enter The Project Name" value="{{ old('project_name', $data->project_name ?? '') }}">
                                                                             @error('project_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Category
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                                            <option value="">Select Category</option>
                                                                                @forelse($categoryData as $category)
                                                            <option value="{{ $category->category_id }}"
                                                                {{ isset($data) && $data->category_id == $category->category_id ? 'selected' : '' }}>
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @empty
                                                            <option> No Category Exists </option>
                                                        @endforelse
                                                                            
                                                                        </select>
                                                                         @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label"> Start
                                                                        Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" name="start_date" id="startDate"
                                                                            class="form-control @error('start_date') is-invalid @enderror"
                                                                            placeholder="Enter The Project Start Date" value="{{ old('start_date', $data->start_date ?? '') }}">
                                                                             @error('start_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label"> End
                                                                        Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" name="end_date" id="{{ isset($data->end_date) ? '' : 'endDate' }}"
                                                                            class="form-control @error('end_date') is-invalid @enderror"
                                                                            placeholder="Enter The Project End Date" value="{{ old('end_date', $data->end_date ?? '') }}"
                                                                            {{ isset($data->end_date) ? '' : 'disabled' }}>
                                                                             @error('end_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label
                                                                        class="col-sm-3 col-form-label">Description</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea rows="5" name="description" cols="5" class="form-control @error('description') is-invalid @enderror"
                                                                            placeholder="Enter The Description ">{{ old('description', $data->description ?? '') }}</textarea>
                                                                             @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Contact Person Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="contact_person" class="form-control @error('contact_person') is-invalid @enderror"
                                                                            placeholder="Enter The Contact Person Name " value="{{ old('contact_person', $data->contact_person ?? '') }}">
                                                                             @error('contact_person')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Business Name </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="organization" class="form-control @error('organization') is-invalid @enderror"
                                                                            placeholder="Enter The Business / Company Name " value="{{ old('organization', $data->organization ?? '') }}">
                                                                             @error('organization')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Address  </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                                                            placeholder="Enter The Business Address " value="{{ old('address', $data->address ?? '') }}">
                                                                             @error('address')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label"> Contact
                                                                        Number</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                                                            placeholder="Enter The Contact Number" value="{{ old('phone', $data->phone ?? '') }}">
                                                                             @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                 <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label"> Contact
                                                                        Email</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                                                            placeholder="Enter The Contact Email" value="{{ old('email', $data->email ?? '') }}">
                                                                             @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Designation
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <select name="designation" class="form-control @error('designation') is-invalid @enderror">
                                                                            <option value="">Select Designation
                                                                            </option>
                                                                            <option value="Owner"
                                                                            {{ isset($data) && $data->designation == 'Owner' ? 'selected' : '' }}
                                                                            > Owner
                                                                            </option>
                                                                            <option value="Media Manager"
                                                                            {{ isset($data) && $data->designation == 'Media Manager' ? 'selected' : '' }}
                                                                            > Media Manager
                                                                            </option>
                                                                            <option value="Marketing Manager"
                                                                            {{ isset($data) && $data->designation == 'Marketing Manager' ? 'selected' : '' }}
                                                                            > Marketing Manager
                                                                            </option>
                                                                            <option value="Co Founder"
                                                                            {{ isset($data) && $data->designation == 'Co Founder' ? 'selected' : '' }}
                                                                            > Co Founder
                                                                            </option>
                                                                        </select>
                                                                         @error('designation')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Payment  Type
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <select name="payment_type" class="form-control @error('payment_type') is-invalid @enderror">
                                                                            <option value="">Select Payment Type
                                                                            </option>
                                                                            <option value="Monthly"
                                                                            {{ isset($data) && $data->payment_type == 'Monthly' ? 'selected' : '' }}
                                                                            > Monthly  
                                                                            </option>
                                                                            <option value="One Time"
                                                                            {{ isset($data) && $data->payment_type == 'One Time' ? 'selected' : '' }}
                                                                            > One Time
                                                                            </option>
                                                                        </select>
                                                                         @error('payment_type')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label"> Price</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror"
                                                                            placeholder="Enter The Price Per Project" value="{{ old('amount', $data->amount ?? '') }}">
                                                                             @error('amount')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Status</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                                                            <option value="">Select Designation
                                                                            </option>
                                                                            <option value="Initialized"
                                                                            {{ isset($data) && $data->status == 'Initialized' ? 'selected' : '' }}
                                                                            > Initialized 
                                                                            </option>
                                                                            <option value="Processing"
                                                                            {{ isset($data) && $data->status == 'Processing' ? 'selected' : '' }}
                                                                            > Processing
                                                                            </option>
                                                                             <option value="Completed"
                                                                             {{ isset($data) && $data->status == 'Completed' ? 'selected' : '' }}
                                                                             > Completed
                                                                            </option>
                                                                             <option value="Canceled"
                                                                             {{ isset($data) && $data->status == 'Canceled' ? 'selected' : '' }}
                                                                             > Canceled
                                                                            </option>
                                                                             <option value="Restarted"
                                                                             {{ isset($data) && $data->status == 'Restarted' ? 'selected' : '' }}
                                                                             > Restarted
                                                                            </option>
                                                                             <option value="Paused"
                                                                             {{ isset($data) && $data->status == 'Paused' ? 'selected' : '' }}
                                                                             > Paused
                                                                            </option>
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
                                                                <button
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
                    

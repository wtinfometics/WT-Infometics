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
                                    <h3 class="font-weight-bold">Profile </h3>
                                </div>
                                <div class="card-block">
                                    <form method="post" action="/admin/profile/update">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 form-group row">
                                                <label class="col-sm-3 col-form-label">First name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="first_name"
                                                        class="form-control @error('first_name') is-invalid @enderror"
                                                        placeholder="Enter The First Name"
                                                        value="{{ isset($data->first_name) ? $data->first_name : '' }}">
                                                    @error('first_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 form-group row">
                                                <label class="col-sm-3 col-form-label">Last name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="last_name"
                                                        class="form-control @error('last_name') is-invalid @enderror"
                                                        placeholder="Enter The Last Name"
                                                        value="{{ isset($data->last_name) ? $data->last_name : '' }}">
                                                    @error('last_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 form-group row">
                                                <label class="col-sm-3 col-form-label">Email Address</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="Enter The Email Address"
                                                        value="{{ isset($data->email) ? $data->email : '' }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 form-group row">
                                                <label class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="phone"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        placeholder="Enter The Phone Number"
                                                        value="{{ isset($data->phone) ? $data->phone : '' }}">
                                                    @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end m-3">
                                            <button type="submit" class="btn btn-primary btn-round ">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="font-weight-bold"> UpdatePassword </h3>
                                </div>
                                <div class="card-block">
                                    <form method="post" action="/admin/password/update">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Enter The Password">
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-3 col-form-label">Conform Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="confirm_password"
                                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                                        placeholder="Conform Password">
                                                    @error('confirm_password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end m-3">
                                            <button type="submit" class="btn btn-primary btn-round ">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- Basic Form Inputs card end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
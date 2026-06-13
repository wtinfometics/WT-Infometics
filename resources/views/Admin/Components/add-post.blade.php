 @extends('Admin.Pages.main')
 @section('content')

 <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <form>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="font-weight-bold">Add Posts</h3>
                                                        </div>
                                                        <div class="card-block">

                                                            <div class="row">
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Post
                                                                        Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter The Post Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Category
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <select name="select" class="form-control">
                                                                            <option value="opt1">Select Category
                                                                            </option>
                                                                            <option value="Web Designing"> Web Designing</option>
                                                                            <option value="Web Development"> Web Development
                                                                            </option>
                                                                            <option value="SEO"> SEO</option>
                                                                            <option value="Social media"> Social media</option>
                                                                            <option value="Local Business"> Local Business
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 form-group row">
                                                                    <label class="col-sm-2 col-form-label">Featured
                                                                        Image
                                                                    </label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 form-group row">
                                                                    <label class="col-sm-2 col-form-label">Short
                                                                        Description</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea rows="5" cols="5" class="form-control"
                                                                            placeholder="Enter The Review Message"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 form-group row">
                                                                    <label class="col-sm-2 col-form-label">
                                                                        Description</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea rows="5" id="description" cols="5"
                                                                            class="form-control"
                                                                            placeholder="Enter The Review Message"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 form-group row">
                                                                    <label class="col-sm-2 col-form-label">Status
                                                                    </label>
                                                                    <div class="col-sm-10">
                                                                        <select name="select" class="form-control">
                                                                            <option value="opt1">Select Review Rating
                                                                            </option>
                                                                            <option value="Active"> Active</option>
                                                                            <option value="Disabled"> Disabled</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="font-weight-bold">Meta Data </h3>
                                                        </div>
                                                        <div class="card-block">
                                                            <div class="row">
                                                                <div class="col-lg-12 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Meta
                                                                        Title</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter The Meta Title">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Meta
                                                                        Description</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea rows="5" id="description" cols="5"
                                                                            class="form-control"
                                                                            placeholder="Enter The Meta Description"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Meta
                                                                        Keywords</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea rows="5" id="description" cols="5"
                                                                            class="form-control"
                                                                            placeholder="Enter The Meta Keywords"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end m-3">
                                                                <button
                                                                    class="btn btn-primary btn-round ">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Basic Form Inputs card end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 @endsection
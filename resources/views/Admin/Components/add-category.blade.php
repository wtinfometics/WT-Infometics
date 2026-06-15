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
                                                        <h3 class="font-weight-bold">Add Category</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="/category">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Category
                                                                        Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="category_name" class="form-control"
                                                                            placeholder="Enter The Project Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 form-group row">
                                                                    <label class="col-sm-3 col-form-label">Status
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <select name="status" class="form-control">
                                                                            <option value="opt1">Select Status
                                                                            </option>
                                                                            <option value=1> Active
                                                                            </option>
                                                                            <option value=1> IDisabled
                                                                                Development
                                                                            </option>
                                                                            <option value="SEO"> SEO</option>
                                                                            <option value="Social media"> Social media
                                                                            </option>
                                                                            <option value="Local Business"> Local
                                                                                Business
                                                                            </option>
                                                                        </select>
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
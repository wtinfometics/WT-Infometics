 <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="card py-5">
                                            <div class="card-header d-flex justify-content-between mx-4">
                                                <h3 class="font-weight-bold">Posts </h3>
                                               <a href="/addpost" class="btn btn-primary text-decoration-none">
                                                    <i class="ti-plus"></i> Create
                                                </a>
                                            </div>
                                            <div class="card-block table-border-style mx-4">
                                                <div class="table-responsive table-striped ">
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Post Name</th>
                                                                <th>Category </th>
                                                                <th>Upload Date</th>
                                                                <th>View </th>
                                                                <th>Status </th>
                                                                <th>Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Post name 1</td>
                                                                <td>SEO</td>
                                                                <td>22-11-2026</td>
                                                                <td>15</td>
                                                                <td>
                                                                    <div class="badge-main">
                                                                        <label
                                                                            class="badge badge-success badge-md badge-rounded">Active</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-warning"><i
                                                                            class="ti-pencil-alt"></i>Edit
                                                                    </button>
                                                                    <button class="btn btn-danger"><i
                                                                            class="ti-trash"></i>Delete
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Post name 2</td>
                                                                <td>Web Development</td>
                                                                <td>22-11-2026</td>
                                                                <td>15</td>
                                                                <td>
                                                                    <div class="badge-main">
                                                                        <label
                                                                            class="badge badge-success badge-md badge-rounded">Active</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-warning"><i
                                                                            class="ti-pencil-alt"></i>Edit
                                                                    </button>
                                                                    <button class="btn btn-danger"><i
                                                                            class="ti-trash"></i>Delete
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Post name 3</td>
                                                                <td>Local Business</td>
                                                                <td>22-11-2026</td>
                                                                <td>15</td>
                                                                <td>
                                                                    <div class="badge-main">
                                                                        <label
                                                                            class="badge badge-danger badge-md badge-rounded">Disable</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-warning"><i
                                                                            class="ti-pencil-alt"></i>Edit
                                                                    </button>
                                                                    <button class="btn btn-danger"><i
                                                                            class="ti-trash"></i>Delete
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                    @include('Admin.Components.pagination')        include Pagination
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
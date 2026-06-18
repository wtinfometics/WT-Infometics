
<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">

                                        <div class="card py-5">
                                            <div class="card-header d-flex justify-content-between mx-4">
                                                <h3 class="font-weight-bold">Testimonials </h3>
                                                <a href="/admin/testimonials/create" class="btn btn-primary text-decoration-none">
                                                    <i class="ti-plus"></i> Create
                                                </a>
                                            </div>
                                            <div class="card-block table-border-style mx-4">
                                                <div class="table-responsive table-striped ">
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Person Name</th>
                                                                <th>Rating </th>
                                                                <th>Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($data as $testimonial)
                                                            <tr>
                                                                <th>{{ $loop->iteration }}<</th>
                                                                <td>{{ $testimonial->name }}</td>
                                                                <td>{{ $testimonial->rating }}</td>
                                                                <td>
                                                                     <a href="{{ url('/admin/testimonials/' . $testimonial->testimonial_id . '/edit') }}"
                                                                        class="btn btn-warning text-dark">
                                                                        Edit
                                                                    </a>
                                                                    <form action="{{ url('/admin/testimonials/' . $testimonial->testimonial_id) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class=" btn btn-danger text-light">delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center">{{$message}}</td>
                                            </tr>
                                        @endforelse
                                       
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <ul class="pagination custom-pagination justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">
                                                            <i class="ti-angle-left"></i>
                                                        </a>
                                                    </li>

                                                    <li class="page-item">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>

                                                    <li class="page-item active">
                                                        <span class="page-link">2</span>
                                                    </li>

                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>

                                                    <li class="page-item">
                                                        <a class="page-link" href="#">
                                                            <i class="ti-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

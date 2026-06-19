 <div class="pcoded-content">
    @include('Admin.Components.error')        
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                       
                                        <div class="card py-5">
                                            <div class="card-header d-flex justify-content-between mx-4">
                                                <h3 class="font-weight-bold">Enquiries </h3>
                                             
                                            </div>
                                            <div class="card-block table-border-style mx-4">
                                                <div class="table-responsive table-striped ">
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Company Name </th>
                                                                <th>Service</th>
                                                                <th>Date </th>
                                                                <th>Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($paginatedData as $enquiry)
                                                            <tr>
                                                                <th >{{ $loop->iteration }}</th>
                                                                <td>{{ $enquiry->name }}</td>
                                                                <td> {{ $enquiry->company_name }} </td>
                                                                <td> {{ $enquiry->service_name }} </td>
                                                                <td>{{ $enquiry->created_at }}</td>
                                                                <td>
                                                                      <a type="button" href="{{ url('/admin/enquiries/' . $enquiry->enquiry_id . '/view') }}" class="btn btn-primary"><i
                                                                            class="ti-pencil-alt"></i>view
                                                                    </a>
                                                                    <form action="{{ url('/admin/enquiries/' . $enquiry->enquiry_id) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger"><i
                                                                                class="ti-trash"></i>Delete
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                                                                    @empty
                                            <tr>
                                                <td colspan="6" class="text-center">{{$message}}</td>
                                            </tr>
                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>

                                                 {{ $paginatedData->links('Admin.Components.pagination') }}

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

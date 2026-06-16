
 <div class="pcoded-content">
    @include('Admin.Components.error',['success'=>$success,'message'=>$message])        
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        
                                        <div class="card py-5">
                                            <div class="card-header d-flex justify-content-between mx-4">
                                                <h3 class="font-weight-bold">Contacts </h3>
                                            </div>
                                            <div class="card-block table-border-style mx-4">
                                                <div class="table-responsive table-striped ">
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Subject </th>
                                                                <th>E-mail </th>
                                                                <th>Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($data as $contact)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $contact->subject }} </td>
                                                <td> {{ $contact->email }} </td>
                                                                <td>
                                                                    <a type="button" href="{{ url('/admin/contacts/' . $contact->contact_id . '/view') }}" class="btn btn-primary"><i
                                                                            class="ti-pencil-alt"></i>view
                                                                    </a>
                                                                    <form action="{{ url('/admin/contacts/' . $contact->contact_id) }}"
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

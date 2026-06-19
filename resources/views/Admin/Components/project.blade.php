 <div class="pcoded-content">
            @include('Admin.Components.error')           
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        <div class="card py-5">
                                            <div class="card-header d-flex justify-content-between mx-4">
                                                <h3 class="font-weight-bold">Projects </h3>
                                                <a href="/admin/projects/create" class="btn btn-primary text-decoration-none">
                                                    <i class="ti-plus"></i> Create
                                                </a>
                                            </div>
                                            <div class="card-block table-border-style mx-4">
                                                <div class="table-responsive table-striped ">
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Project Name</th>
                                                                <th>Category </th>
                                                                <th>Completion Date</th>
                                                                <th>Status </th>
                                                                <th>Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($paginatedData as $project)
                                                            <tr>
                                                                <th >{{ $loop->iteration }}<</th>
                                                                <td>{{ $project->project_name }}</td>
                                                                <td>{{ $project->categories->category_name }}</td>
                                                                <td>{{ $project->end_date }}</td>
                                                                <td>
                                                                    <div class="badge-main">
                                                                        @php
    $badgeClasses = [
        'Initialized' => 'badge-primary',
        'Processing'  => 'badge-warning',
        'Completed'   => 'badge-success',
        'Canceled'    => 'badge-danger',
        'Restarted'   => 'badge-info',
        'Paused'      => 'badge-secondary',
    ];
@endphp

<label class="badge {{ $badgeClasses[$project->status] ?? 'badge-light' }} badge-md badge-rounded">
    {{ $project->status }}
</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                     <a href="{{ url('/admin/projects/' . $project->project_id . '/edit') }}"
                                                                        class="btn btn-warning text-dark">
                                                                        Edit
                                                                    </a>
                                                                    <form action="{{ url('/admin/projects/' . $project->project_id) }}"
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
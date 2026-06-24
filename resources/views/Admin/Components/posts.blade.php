 <div class="pcoded-content">
     @include('Admin.Components.error')
     <div class="pcoded-inner-content">
         <div class="main-body">
             <div class="page-wrapper">
                 <div class="page-body">
                     <div class="card py-5">
                         <div class="card-header d-flex justify-content-between mx-4">
                             <h3 class="font-weight-bold">Posts </h3>
                             <a href="/admin/posts/create" class="btn btn-primary text-decoration-none">
                                 <i class="ti-plus"></i> Create
                             </a>
                         </div>
                         <div class="card-block table-border-style mx-4">
                             <div class="table-responsive table-striped ">
                                 <table class="table ">
                                     <thead>
                                         <tr>
                                             <th>Sl No</th>
                                             <th>Post Name</th>
                                             <th>Category </th>
                                             <th>Upload Date</th>
                                             <th>View </th>
                                             <th>Status </th>
                                             <th>Action </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @forelse($paginatedData as $post)
                                             <tr>
                                                 <th>{{ $loop->iteration }}</th>
                                                 <td>{{ $post->post_title }}</td>
                                                 <td>{{ $post->categories->category_name }}</td>
                                                 <td>{{ $post->created_at }}</td>
                                                 <td>{{ $post->postView->view ?? 0 }}</td>
                                                 <td>
                                                     <div class="badge-main">
                                                         <label
                                                             class="badge {{ $post->status == 'published' ? 'badge-success' : 'badge-danger' }} badge-md badge-rounded">
                                                             {{ $post->status }}
                                                         </label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <a href="{{ url('/admin/posts/' . $post->post_id . '/edit') }}"
                                                         class="btn btn-warning text-dark">
                                                         Edit
                                                     </a>
                                                     <form action="{{ url('/admin/posts/' . $post->post_id) }}"
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
                                                 <td colspan="7" class="text-center">{{ $message }}</td>
                                             </tr>
                                         @endforelse

                                     </tbody>
                                 </table>
                             </div>
                             {{ $paginatedData->links('Admin.Components.pagination') }} include Pagination
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
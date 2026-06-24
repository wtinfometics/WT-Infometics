<div class="pcoded-content">
    @include('Admin.Components.error')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card py-5">
                        <div class="card-header d-flex justify-content-between mx-4">
                            <h3 class="font-weight-bold">Contact Details </h3>
                        </div>
                        <div class="card-block table-border-style mx-4">
                            <div class="table-responsive table-striped ">
                                <table class="table table-bordered border-primary">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td> {{ $data->name }} </td>
                                        </tr>
                                        <tr>
                                            <th>E-Mail Address </th>
                                            <td> {{ $data->email }} </td>
                                        </tr>
                                        <tr>
                                            <th>Subject </th>
                                            <td> {{ $data->subject }} </td>
                                        </tr>
                                        <tr>
                                            <th>Message </th>
                                            <td> {{ $data->message }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
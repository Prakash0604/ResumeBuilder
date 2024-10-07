@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">User List</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover display" id="itemsTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                $('#itemsTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.users') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: null,
                            name: 'name',
                            render: function(data, type, row) {
                                let middleName = row.middle_name ? row.middle_name : '';
                                // Combine first_name, middle_name, and last_name
                                return `${row.first_name} ${middleName} ${row.last_name}`;
                            }
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data:"address",
                            name:"address",
                        },
                        {
                            data:"contact",
                            name:"contact"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
            });
        </script>
    </div>
@endsection

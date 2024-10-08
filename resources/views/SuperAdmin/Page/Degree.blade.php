@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">Degree</h1>
        <button type="button" class="btn btn-primary float-end mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#modalId">
            Add Degree
        </button>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="fetch-degree">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Degree Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="addDegrees">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Add Degree
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <button type="button" class="btn btn-primary float-end mt-2 mb-2"
                                        id="addMoreDegree">Add More</button>
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="renderDegree">
                                        @csrf
                                        <tr class="">
                                            <td scope="row"> <input type="text" name="degree_names[]"
                                                    class="form-control" id=""> </td>
                                            <td> <input type="text" name="descriptions[]" class="form-control"
                                                    id=""></td>
                                            <td><button type="button" class="btn btn-danger">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal -->

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="updateDegrees">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Degree
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="renderDegree">
                                        @csrf
                                        <tr class="">
                                            <td scope="row"> <input type="text" name="degree_name"
                                                    class="form-control" id="degree_name"> </td>
                                            <td> <input type="text" name="description" class="form-control"
                                                    id="description"></td>
                                            <td>
                                                <select class="form-select" name="status" id="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary btnUpdate" id="btnUpdate">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Edit Modal --}}

    {{-- Delete Modal --}}
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addDegrees">
                    <div class="modal-header bg-secondary text-white">
                        <h6 class="modal-title" id="modalTitleId">
                            Delete Degree
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h5 class="text-danger">Are you sure you want to delete ?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger btnDelete" id="btnDelete">Confirm Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete Modal --}}
    <script>
        $(document).ready(function() {

            // Fetch Data
            $("#fetch-degree").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.degree') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex"
                    },
                    {
                        data: "degree_name",
                        name: "degree_name"
                    },
                    {
                        data: "description",
                        name: "description"
                    }, {
                        data: "status",
                        name: "status",
                        render: function($row) {
                            if ($row == 1) {
                                return '<span class="badge badge-success">Active</span>';
                            } else {
                                return '<span class="badge badge-danger">Inactive</span>'
                            }
                        }
                    }, {
                        data: "action",
                        name: "action",
                        searchable: false,
                        orderable: false
                    }
                ]
            })
            // Fetch Data

            $("#addMoreDegree").on("click", function() {
                let data = `<tr class="">
                    <td scope="row"> <input type="text" name="degree_names[]" class="form-control" id=""> </td>
                    <td> <input type="text" name="descriptions[]" class="form-control" id=""></td>
                    <td><button type="button" class="btn btn-danger removeBtn">Remove</button></td>
                    </tr>`;
                $(".renderDegree").append(data);
            });

            $(document).on("click", ".removeBtn", function() {
                $(this).closest("tr").remove();
            });

            // Add Degree
            $("#addDegrees").submit(function(event) {
                event.preventDefault();
                $("#btnSave").text("Saving...");
                $("#btnSave").prop("disabled", true);
                var formdata = new FormData(this);
                $.ajax({
                    method: "post",
                    url: "/admin/degree/store",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response);
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Degree Created Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    }
                })
            });

            $(document).on("click",'.editDegree',function(){
                let id=$(this).attr("data-id");
                console.log(id);
                $.ajax({
                    method:"get",
                    url:"/admin/degree/get/"+id,
                    success:function(response){
                        console.log(response);
                        if(response.success==true){
                            $("#degree_name").val(response.message.degree_name);
                            $("#description").val(response.message.description);
                            $("#status").val(response.message.status);
                        }
                    }
                });
                  // Update
                  $("#updateDegrees").submit(function(event) {
                    event.preventDefault();
                    $(".btnUpdate").text("Updating....");
                    $(".btnUpdate").prop("disabled", true);
                    let formdata = new FormData(this);
                    $.ajax({
                        method: "post",
                        url: "/admin/degree/edit/" + id,
                        data: formdata,
                        processData:false,
                        contentType:false,
                        success:function(response){
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Degree Updated Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Something went wrong",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $(".btnUpdate").text("Update");
                                $(".btnUpdate").prop("disabled", false);
                            }
                        }

                    })

                })


            });


            $(document).on("click", '.deleteDegree', function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $(document).on("click", '.btnDelete', function(event) {
                    event.preventDefault();
                    $(".btnDelete").text("Deleting....");
                    $(".btnDelete").prop("disabled", true);
                    $.ajax({
                        url: "/admin/degree/delete/" + id,
                        method: "get",
                        success: function(response) {
                            console.log(response);
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Degree deleted Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Something went wrong",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $(".btnDelete").text("Confirm Delete");
                                $(".btnDelete").prop("disabled", false);
                            }
                        }
                    })
                })
            });


        })
    </script>
@endsection

@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">Job Level</h1>
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#modalId">
                Add Job Level
            </button>

            <table class="table table-bordered table-hover" id="display-job-level">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Descrirption</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="addJobLevels">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Add Job Level
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <button type="button" class="btn btn-primary mt-2 mb-2" id="addMoreJobLevel">Add
                                    More</button>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchInputData">
                                        <tr class="">
                                            <td scope="row">
                                                @csrf
                                                <input type="text" name="job_level_names[]" id=""
                                                    class="form-control" placeholder="" aria-describedby="helpId" />
                                            </td>
                                            <td>
                                                <input type="text" name="description[]" id=""
                                                    class="form-control" placeholder="" aria-describedby="helpId" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger">Remove</button>
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
                        <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Industries --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="editJobLevels">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Job Level
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
                                    <tbody id="fetchInputData">
                                        <tr class="">
                                            <td scope="row">
                                                @csrf
                                                <input type="text" name="job_level_name" id="job_level_name"
                                                    class="form-control" placeholder="" aria-describedby="helpId" />
                                            </td>
                                            <td>
                                                <input type="text" name="description" id="description"
                                                    class="form-control" placeholder="" aria-describedby="helpId" />
                                            </td>
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
                        <button type="submit" class="btn btn-success btnUpdate" id="btnUpdate">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Edit Industries --}}

    {{-- Delete Industries --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addIndustries">
                    <div class="modal-header bg-secondary text-white">
                        <h5 class="modal-title" id="modalTitleId">
                            Delete Job Level
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h6 class="text-danger">Are you sure you want to delete ?</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-danger btnDelete" id="btnDelete">Confirm Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete Industries --}}

    <script>
        $(document).ready(function() {

            // Industry Input fied add
            $("#addMoreJobLevel").on("click", function() {
                $("#fetchInputData").append(`
                    <tr class="">
                     <td scope="row">
                        <input type="text" name="job_level_names[]"  id=""  class="form-control" placeholder="" />
                        </td>
                        <td>
                            <input  type="text"  name="description[]"  id=""  class="form-control"  placeholder="" />
                         </td>
                            <td>
                                <button type="button" class="btn btn-danger btnRemove">Remove</button>
                            </td>
                    </tr>
                `);
            })

            $(document).on("click", ".btnRemove", function() {
                $(this).closest("tr").remove();
            })
            // Industry Input fied add

            $("#addJobLevels").submit(function(event) {
                event.preventDefault();
                $("#btnSave").text("Saving...");
                $("#btnSave").prop("disabled", true);
                var formdata = new FormData(this);
                console.log(formdata);
                $.ajax({
                    method: "POST",
                    url: "/admin/job-level/store",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Job Level has been created",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: "error",
                            title: "Someting went wrong",
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#btnSave").prop("disabled", false);
                        $("#btnSave").text("Save");
                    }
                })
            });

            $("#display-job-level").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.job_level') }}",
                columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex"
                }, {
                    data: "job_level_name",
                    name: "job_level_name"
                }, {
                    data: "description",
                    name: "description"
                }, {
                    data: "status",
                    name: "status",
                    render: function(data) {
                        if (data == 1) {
                            return `<span class="badge badge-success">Active</span>`;
                        } else {
                            return `<span class="badge badge-danger">Inactive</span>`
                        }
                    }
                }, {
                    data: "action",
                    name: "action"
                }, ]
            });

            $(document).on("click", '.deleteJobLevel', function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $(document).on("click", '.btnDelete', function(event) {
                    event.preventDefault();
                    $(".btnDelete").text("Deleting....");
                    $(".btnDelete").prop("disabled", true);
                    $.ajax({
                        url: "/admin/job-level/delete/" + id,
                        method: "get",
                        success: function(response) {
                            console.log(response);
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Job Level deleted Successfully",
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

            $(document).on("click", '.editJobLevel', function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $.ajax({
                    method: "get",
                    url: "/admin/job-level/get/" + id,
                    success: function(response) {
                        console.log(response);
                        $("#job_level_name").val(response.message.job_level_name);
                        $("#description").val(response.message.description);
                        $("#status").val(response.message.status);
                    }
                })

                // Update
                $("#editJobLevels").submit(function(event) {
                    event.preventDefault();
                    $(".btnUpdate").text("Updating....");
                    $(".btnUpdate").prop("disabled", true);
                    let formdata = new FormData(this);
                    $.ajax({
                        method: "post",
                        url: "/admin/job-level/edit/" + id,
                        data: formdata,
                        processData:false,
                        contentType:false,
                        success:function(response){
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Job Level Updated Successfully",
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



        })
    </script>
    {{-- Add Modal --}}
@endsection

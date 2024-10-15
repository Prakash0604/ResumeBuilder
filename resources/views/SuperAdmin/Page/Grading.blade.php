@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ $title }}</h1>
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mb-2 float-right" data-bs-toggle="modal" data-bs-target="#modalId">Add
                Grading</button>
            <table class="table table-bordered table-hover" id="fetch-grading">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Grading Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Add modal --}}
    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="addGradings">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Add Grading
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <a class="btn btn-primary float-right mt-2 mb-2 text-white" id="addMore">Add More</a>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchGradingRow">
                                        @csrf
                                        <tr class="">
                                            <td scope="row"><input type="text" name="grading_names[]"
                                                    class="form-control" id=""></td>
                                            <td><input type="text" name="descriptions[]" class="form-control"
                                                    id=""></td>
                                            <td><button type="button" class="btn btn-outline-danger">Remove</button></td>
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
                        <button type="submit" class="btn btn-success" id="btnSave">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Add Modal --}}

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="editGradingsData">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Grading
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
                                    <tbody>
                                        @csrf
                                        <tr class="">
                                            <td scope="row"><input type="text" name="grading_name"
                                                    class="form-control" id="grading_names"></td>
                                            <td><input type="text" name="description" class="form-control"
                                                    id="descriptions"></td>
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
                        <button type="submit" class="btn btn-success" id="btnUpdate">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Edit Modal --}}

    {{-- Delete Modal --}}
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="deleteGradings">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Delete Grading
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h4 class="text-danger">Are you sure you want to delete ?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger" id="btnDelete">Confirm Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Delete Modal --}}

    <script>
        $(document).ready(function() {
            // Datatable
            let table = $("#fetch-grading").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.grading') }}",
                columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex"
                }, {
                    data: "grading_name",
                    name: "grading_name"
                }, {
                    data: "description",
                    name: "description",
                }, {
                    data: "status",
                    name: "status",
                    render: function(data) {
                        if (data == 1) {
                            return `<span class="badge badge-success">Active</span>`;
                        } else {
                            return `<span class="badge badge-danger">Inactive</span>`;
                        }
                    }
                }, {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                }]
            });

            $("#addMore").on("click", function() {
                let data = ` <tr class="">
                                        <td scope="row"><input type="text" name="grading_names[]" class="form-control" id=""></td>
                                        <td><input type="text" name="descriptions[]" class="form-control" id=""></td>
                                        <td><button type="button" class="btn btn-outline-danger removeGradingRow">Remove</button></td>
                                    </tr>`;
                $("#fetchGradingRow").append(data);
            });

            $(document).on("click", ".removeGradingRow", function() {
                $(this).closest("tr").remove();
            });

            $("#addGradings").submit(function(event) {
                event.preventDefault();
                $("#btnSave").prop("disabled", true);
                $("#btnSave").text("Saving...");
                let formdata = new FormData(this);
                $.ajax({
                    method: "POST",
                    url: "/admin/grading/store",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "success",
                                text: "Grading Created Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                $("#modalId").modal("hide");
                                $("#addGradings").trigger("reset");
                                table.draw();
                            }, 1500);
                            $("#btnSave").prop("disabled", false);
                            $("#btnSave").text("Save");
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong",
                            text: xhr.responseJSON.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#btnSave").prop("disabled", false);
                        $("#btnSave").text("Save");
                    }
                })
            });

            // Edit
            $(document).on("click", ".editGrading", function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $.ajax({
                    method: "get",
                    url: "/admin/grading/get/" + id,
                    success: function(response) {
                        if (response.success == true) {
                            $("#grading_names").val(response.message.grading_name);
                            $("#descriptions").val(response.message.description);
                            $("#status").val(response.message.status);
                        }
                    }
                });
                // Update
                $("#editGradingsData").submit(function(event) {
                    event.preventDefault();
                    $("#btnUpdate").text("Updating...");
                    $("#btnUpdate").prop("disabled", true);
                    let formdata = new FormData(this);
                    $.ajax({
                        method: "post",
                        url: "/admin/grading/edit/" + id,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Grading Updated Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                // setTimeout(()=>{
                                $("#editModal").modal("hide");
                                table.draw();
                                // },1500);
                                $("#btnUpdate").text("Update");
                                $("#btnUpdate").prop("disabled", false);
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong",
                                text: xhr.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#btnUpdate").text("Update");
                            $("#btnUpdate").prop("disabled", false);
                        }
                    });
                })
            });

            $(document).on("click", ".deleteGrading", function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $("#deleteGradings").submit(function(event) {
                    event.preventDefault();
                    $("#btnDelete").text("Deleting...");
                    $("#btnDelete").prop("disabled", true);
                    $.ajax({
                        method: "get",
                        url: "/admin/grading/delete/" + id,
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Grading Deleted Successfully",
                                    showConfirmButton: false,
                                    timer: 1500.
                                });
                                $("#deleteModal").modal("hide");
                                table.draw();
                                $("#btnDelete").text("Confirm Delete");
                                $("#btnDelete").prop("disabled", false);
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong ?",
                                text: xhr.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#btnDelete").text("Confirm Delete");
                            $("#btnDelete").prop("disabled", false);
                        }
                    })

                })
            })
        })
    </script>
@endsection

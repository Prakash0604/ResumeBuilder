@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ $title }}</h1>
        <button type="button" class="btn btn-outline-primary mt-2 mb-2 float-right" data-bs-toggle="modal"
            data-bs-target="#modalId">Create Fields</button>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="get-Field-data">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Field Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    {{-- Add Field  --}}

    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="addFields">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Add Field of Study
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <button type="button" class="btn btn-outline-primary float-right mt-2 mb-2"
                                        id="addMore">Add More</button>
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchRow">
                                        <tr class="">
                                            @csrf
                                            <td scope="row"><input type="text" name="field_names[]" id=""
                                                    class="form-control"></td>
                                            <td><input type="text" name="descriptions[]" id=""
                                                    class="form-control"></td>
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
                        <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Add Field  --}}

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="updateFields">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Field of Study
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchRow">
                                        <tr class="">
                                            @csrf
                                            <td scope="row"><input type="text" name="field_name" id="field_name"
                                                    class="form-control"></td>
                                            <td><input type="text" name="description" id="description"
                                                    class="form-control"></td>
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
                        <button type="submit" class="btn btn-primary updatButton" id="updatButton">Update</button>
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
                <form id="deleteField">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Delete Field of Study
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
                        <button type="button" class="btn btn-danger deleteButton" id="deleteButton">Confirm
                            Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <script>
        $(document).ready(function() {
            var table = $("#get-Field-data").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.field') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex"
                    },
                    {
                        data: "field_name",
                        name: "field_name"
                    },
                    {
                        data: "description",
                        name: "description"
                    },
                    {
                        data: "status",
                        name: "status",
                        render: function(data) {
                            if (data == 1) {
                                return `<span class="badge badge-success">Active</span>`;
                            } else {
                                return `<span class="badge badge-danger">Inactive</span>`;
                            }
                        }
                    },
                    {
                        data: "action",
                        name: "action"
                    }
                ]
            });

            $("#addMore").on("click", function() {
                let data = ` <tr class="">
                            <td><input type="text" name="field_names[]" id="" class="form-control"></td>
                            <td><input type="text" name="descriptions[]" id="" class="form-control"></td>
                            <td><button type="button" class="btn btn-outline-danger  removeRow">Remove</button></td>
                            </tr>`;
                $("#fetchRow").append(data);
            });

            $(document).on("click", ".removeRow", function() {
                $(this).closest('tr').remove();
            });

            $("#addFields").submit(function(event) {
                event.preventDefault();
                $("#saveButton").text("Saving...");
                $("#saveButton").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    method: "POST",
                    url: "/admin/field/store",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Field Created Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                $("#modalId").modal("hide");
                                $("#addFields").trigger("reset");
                                table.draw();
                            }, 1500);
                            $("#saveButton").text("Save");
                            $("#saveButton").prop("disabled", false);
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong",
                            text: data.responseJSON.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $("#saveButton").text("Save");
                        $("#saveButton").prop("disabled", false);

                    }
                })
            });

            $(document).on("click", ".editField", function() {
                let id = $(this).attr("data-id");
                $.ajax({
                    method: "get",
                    url: "/admin/field/get/" + id,
                    success: function(response) {
                        console.log(response);
                        $("#field_name").val(response.message.field_name);
                        $("#description").val(response.message.description);
                        $("#status").val(response.message.status);
                    }
                });

                $("#updateFields").submit(function(event) {
                    event.preventDefault();
                    $(".updatButton").text("Updating...");
                    $(".updatButton").prop("disabled", true);
                    let formdata = new FormData(this);
                    $.ajax({
                        method: "post",
                        url: "/admin/field/edit/" + id,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Field Updated Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(() => {
                                    $("#editModal").modal("hide");
                                    $("#updateFields").trigger("reset");
                                    table.draw();
                                }, 1500);
                                $(".updatButton").text("Update");
                                $(".updatButton").prop("disabled", false);
                            }
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong",
                                text: error.responseJSON.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $(".updatButton").text("Update");
                            $(".updatButton").prop("disabled", false);

                        }
                    });
                })
            })
            $(document).on("click", ".deleteField", function() {
                let id = $(this).attr("Data-id");
                $(document).on("click", ".deleteButton", function(event) {
                    event.preventDefault();
                    $(".deleteButton").text("Deleting...");
                    $(".deleteButton").prop("disabled", true);
                    $.ajax({
                        method: "get",
                        url: "/admin/field/delete/" + id,
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Field Delete Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(() => {
                                    $("#deleteModal").modal("hide");
                                    table.draw();
                                }, 1500);
                                $(".deleteButton").text("Update");
                                $(".deleteButton").prop("disabled", false);
                            }
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong",
                                text: error.responseJSON.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $(".deleteButton").text("Update");
                            $(".deleteButton").prop("disabled", false);

                        }
                    })
                })
            })
        })
    </script>
@endsection

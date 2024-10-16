@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ $title }}</h1>
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mb-2 float-right" data-bs-toggle="modal" data-bs-target="#modalId">Add
                Year</button>
            <table class="table table-bordered table-hover" id="fetch-Year">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Year Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    {{-- Add Modal --}}

    <!-- Modal -->
    <div class="modal" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="addYears">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Add Year
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <button class="btn btn-info mb-2 float-right" id="addMore" type="button">Add
                                    More</button>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchYearRow">
                                        @csrf
                                        <tr class="">
                                            <td><input type="text" name="year_names[]" class="form-control"
                                                    id=""></td>
                                            <td><input type="text" name="descriptions[]" class="form-control"
                                                    id=""></td>
                                            <td><button class="btn btn-danger removeYearRow" type="button">Remove</button>
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
                        <button type="submit" class="btn btn-success" id="btnSave">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Add Modal --}}

    {{-- Edit Modal --}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="updateYears">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Year
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
                                    <tbody id="fetchYearRow">
                                        @csrf
                                        <tr class="">
                                            <td><input type="text" name="year_name" class="form-control" id="year_name">
                                            </td>
                                            <td><input type="text" name="description" class="form-control"
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
            <form id="deleteYears">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Delete Year
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
            let table = $("#fetch-Year").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.year') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                    }, {
                        data: "year_name",
                        name: "year_name",
                    },
                    {
                        data: "description",
                        name: "description",
                    }, {
                        data: "status",
                        name: "status",
                        render: function(data) {
                            if (data == 1) {
                                return `<span class="badge badge-success">Action</span>`;
                            } else {
                                return `<span class="badge badge-danger">Inactive</span>`;
                            }
                        }
                    }, {
                        data: "action",
                        name: "action"
                    }
                ]
            });

            $("#addMore").on("click", function() {
                let data = ` <tr class="">
                            <td><input type="text" name="year_names[]" class="form-control" id=""></td>
                            <td><input type="text" name="descriptions[]" class="form-control" id=""></td>
                            <td><button class="btn btn-danger removeYearRow" type="button">Remove</button></td>
                            </tr>`;
                $("#fetchYearRow").append(data);
            });

            $(document).on("click", ".removeYearRow", function() {
                $(this).closest("tr").remove();
            });

            // Add Module
            $("#addYears").submit(function(event) {
                event.preventDefault();
                $("#btnSave").text("Saving...");
                $("#btnSave").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    method: "post",
                    url: "/admin/year/store",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Year Created Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#addYears").trigger("reset");
                            $("#modalId").modal("hide");
                            table.draw();
                            $("#btnSave").text("Save");
                            $("#btnSave").prop("disabled", false);
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong ?",
                            text: xhr.responseJSON.message,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        $("#btnSave").text("Save");
                        $("#btnSave").prop("disabled", false);
                    }
                })
            });

            // Edit And Update
            $(document).on("click", ".editButton", function() {
                let id = $(this).attr("data-id");
                $.ajax({
                    method:"get",
                    url:"/admin/year/get/"+id,
                    success:function(response){
                        $("#year_name").val(response.message.year_name);
                        $("#description").val(response.message.description);
                        $("#status").val(response.message.status);
                    }
                });

                $("#updateYears").submit(function(event){
                    event.preventDefault();
                    $("#btnUpdate").text("Updating...");
                    $("#btnUpdate").prop("disabled",true);
                    let formdata=new FormData(this);
                    $.ajax({
                        method:"post",
                        url:"/admin/year/edit/"+id,
                        data:formdata,
                        processData:false,
                        contentType:false,
                        success:function(response){
                            Swal.fire({
                                icon:"success",
                                title:"Success",
                                text:"Year Updated Successfully",
                                showConfirmButton:false,
                                timer:1500
                            });
                            $("#btnUpdate").text("Update");
                            $("#btnUpdate").prop("disabled",false);
                            $("#updateYears").trigger("reset");
                            $("#editModal").modal("hide");
                            table.draw();

                        },
                        error:function(xhr){
                            Swal.fire({
                                icon:"warning",
                                title:"Something went wrong ?",
                                text:xhr.responseJSON.message,
                                showConfirmButton:false,
                                timer:1500
                            });
                            $("#btnUpdate").text("Update");
                            $("#btnUpdate").prop("disabled",false);
                        }
                    })
                });
            });

            // Delete
            $(document).on("click",".deleteButton",function(){
                let id=$(this).attr("data-id");
                console.log(id);
                $("#deleteYears").submit(function(event){
                    event.preventDefault();
                    $("#btnDelete").text("Deleting..");
                    $("#btnDelete").prop("disabled",true);
                    $.ajax({
                        method:"get",
                        url:"/admin/year/delete/"+id,
                        success:function(response){
                            Swal.fire({
                                icon:"success",
                                title:"Success",
                                text:"Year Deleted Successfully",
                                showConfirmButton:false,
                                timer:1500
                            });
                            $("#btnDelete").prop("disabled",false);
                            $("#btnDelete").text("Confirm Delete");
                            $("#deleteModal").modal("hide");
                            table.draw();
                        },
                        error:function(xhr){
                            Swal.fire({
                                icon:"warning",
                                title:"Something went Wrong ?",
                                text:xhr.responseJSON.message,
                                showConfirmButton:false,
                                timer:1500
                            });
                            $("#btnDelete").prop("disabled",false);
                            $("#btnDelete").text("Confirm Delete");
                        }
                    });
                })
            })
        })
    </script>
@endsection

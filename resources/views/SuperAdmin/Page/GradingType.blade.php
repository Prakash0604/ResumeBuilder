@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ $title }}</h1>
        <div class="table-responsive">
            <button class="btn btn-outline-primary mt-2 mb-2 float-right" data-bs-toggle="modal" data-bs-target="#modalId">Add
                Grading Type</button>
            <table class="table table-bordered table-hover" id="fetch-grading-type">
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
        {{-- Add Modal --}}
        <div class="modal" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form id="addGradingType">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Grading Type
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <button type="button" class="btn btn-outline-primary float-right mt-2 mb-3 "
                                            id="addMore">Add More</button>
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="fetchRow">
                                            @csrf
                                            <tr>
                                                <td><input type="text" name="grading_types[]" id=""
                                                        class="form-control" placeholder="" /> </td>
                                                <td><input type="text" name="descriptions[]" id=""
                                                        class="form-control" placeholder="" /></td>
                                                <td> <button type="button" class="btn btn-outline-danger">Remove</button>
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
                    </form>
                </div>
            </div>

        </div>
        {{-- Add Modal --}}

        {{-- Edit Modal --}}
        <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form id="updateGradingType">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                              Edit Grading Type
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
                                            @csrf
                                            <tr>
                                                <td><input type="text" name="grading_type" id="grading_type" class="form-control" placeholder="" /> </td>
                                                <td><input type="text" name="description" id="description" class="form-control" placeholder="" /></td>
                                                <td>
                                                        <select
                                                            class="form-select"
                                                            name="status"
                                                            id="status"
                                                        >
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
                            <button type="submit" class="btn btn-success" id="btnEdit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        {{-- Edit Modal --}}

        {{-- Delete Modal --}}
        <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="addGradingType">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                              Delete Grading Type
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
                    </form>
                </div>
            </div>

        </div>
        {{-- Delete Modal --}}
    </div>

    <script>
        $(document).ready(function() {
            $("#fetch-grading-type").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.grading-type') }}",
                columns: [
                    {
                        data:"DT_RowIndex", name:"DT_RowIndex"
                    },{
                        data: "grading_type",
                        name: "grading_type",
                    },
                    {
                        data: "description",
                        name: "description",
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
                    }, {
                        data: "action",
                        name: "action",
                        searchable: false,
                        orderable: false
                    },
                ]
            });

            $("#addMore").on("click", function() {
                let option = `<tr>
                                <td><input type="text" name="grading_types[]" id="" class="form-control" placeholder="" /> </td>
                                <td><input type="text" name="descriptions[]" id="" class="form-control" placeholder="" /></td>
                                <td><button  type="button" class="btn btn-outline-danger removeRow">Remove</button></td>
                            </tr>`;

                $("#fetchRow").append(option);
            });

            $(document).on("click", ".removeRow", function() {
                $(this).closest('tr').remove();
            });

            $("#addGradingType").submit(function(event) {
                event.preventDefault();
                $("#btnSave").text("Saving...");
                $("#btnSave").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    url: "/admin/grading-type/store",
                    method: "post",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Grading Type Saved Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: "error",
                            title: "Something went wrong",
                            text: data.responseJSON.message,
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        $("#btnSave").text("Save");
                        $("#btnSave").prop("disabled", false);
                    }
                })
            });

            // Edit Modal

            $(document).on("click",".editGradingType",function(){
                let id=$(this).attr("data-id");
                $.ajax({
                    method:"Get",
                    url:"/admin/grading-type/get/"+id,
                    success:function(response){
                        console.log(response);
                       $("#grading_type").val(response.message.grading_type);
                       $("#description").val(response.message.description);
                       $("#status").val(response.message.status);
                    }
                });

                // Update it
                $("#updateGradingType").submit(function(event){
                    event.preventDefault();
                    $("#btnEdit").prop("disabled",true);
                    $("#btnEdit").text("Updating...");
                    let formdata=new FormData(this);
                    $.ajax({
                        method:"post",
                        url:"/admin/grading-type/edit/"+id,
                        data:formdata,
                        processData:false,
                        contentType:false,
                        success:function(response){
                            console.log(response);
                            if(response.success==true){
                                Swal.fire({
                                    icon:"success",
                                    title:"Success",
                                    text:"Grading Type Updated Successfully",
                                    showConfirmButton:false,
                                    timer:1500
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            }
                        }
                    })
                })
            });

            // Delete Modal

            $(document).on("click",".deleteGradingType",function(){
                let id=$(this).attr("data-id");
                $("#btnDelete").on("click",function(){
                    $("#btnDelete").text("Deleting...");
                    $("#btnDelete").prop("disabled",true);
                    $.ajax({
                        method:"Get",
                        url:"/admin/grading-type/delete/"+id,
                        success:function(response){
                            if(response.success==true){
                                Swal.fire({
                                    icon:"success",
                                    title:"Grading Type Deleted Successfully",
                                    showConfirmButton:false,
                                    timer:1500,
                                });
                                setTimeout(()=>{
                                    location.reload();
                                },1500)
                            }
                        }
                    })
                })
            })

        });
    </script>
@endsection

@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ $title }}</h1>
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mb-2 float-right" data-bs-toggle="modal" data-bs-target="#modalId">
                Add Skills
            </button>
            <table class="table table-bordered table-hover" id="fetch-skills">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Skill Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Add Model --}}
    <!-- Modal -->
    <div class="modal" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="addSkills">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Add Skills
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <a class="btn btn-primary text-white float-right mt-2 mb-2" id="addMore">Add More</a>
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchSkillRow">
                                        @csrf
                                        <tr>
                                            <td><input type="text" name="skill_names[]" class="form-control"
                                                    id=""></td>
                                            <td><input type="text" name="descriptions[]" class="form-control"
                                                    id=""></td>
                                            <td> <button type="button" class="btn btn-outline-danger">Remove</button></td>
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

    {{-- Add Model --}}

    {{-- Edit Modal --}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="updateSkills">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Skills
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
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchSkillRow">
                                        @csrf
                                        <tr>
                                            <td><input type="text" name="skill_name" class="form-control"
                                                    id="skill_names"></td>
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
                <form id="deleteSkills">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Delete Skills
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
    <script>
        $(document).ready(function() {
            $("#fetch-skills").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.skill') }}",
                columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex"
                }, {
                    data: "skill_name",
                    name: "skill_name"
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
                            return `<span class="badge badge-danger">Inactive</span>`;
                        }
                    }
                }, {
                    data: "action",
                    name: "action"
                }]
            });

            $("#addMore").on("click", function() {
                let data = ` <tr>
                             <td><input type="text" name="skill_names[]" class="form-control" id=""></td>
                             <td><input type="text" name="descriptions[]" class="form-control" id=""></td>
                             <td> <button type="button" class="btn btn-outline-danger removeRow">Remove</button></td>
                            </tr>`;

                $("#fetchSkillRow").append(data);
            });

            $(document).on("click", ".removeRow", function() {
                $(this).closest("tr").remove();
            });

            $("#addSkills").submit(function(event) {
                event.preventDefault();
                $("#btnSave").text("Saving...");
                $("#btnSave").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    method: "post",
                    url: "/admin/skill/store",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Skill Created Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong",
                            text: xhr.responseJSON.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#btnSave").text("Save");
                        $("#btnSave").prop("disabled", false);
                    }
                })
            });

            // Edit Modal

            $(document).on("click", ".editSkill", function() {
                let id = $(this).attr("data-id");
                $.ajax({
                    method: "get",
                    url: "/admin/skill/get/" + id,
                    success: function(response) {
                        console.log(response);
                        $("#skill_names").val(response.message.skill_name);
                        $("#descriptions").val(response.message.description);
                        $("#status").val(response.message.status);
                    }
                });

                $("#updateSkills").submit(function(event) {
                    event.preventDefault();
                    $("#btnUpdate").text("Updating...");
                    $("#updateSkills").prop("disabled", true);
                    let formdata = new FormData(this);
                    $.ajax({
                        method: "post",
                        url: "/admin/skill/edit/" + id,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            if (response.success == true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Skill Updated Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1500)
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr);
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong",
                                text: xhr.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#btnUpdate").text("Update");
                            $("#updateSkills").prop("disabled", false);
                        }
                    })
                });
            });

            $(document).on("click",".deleteSkill",function(){
                let id=$(this).attr("data-id");
                $("#deleteSkills").submit(function(event){
                    event.preventDefault();
                    $("#btnDelete").text("Deleting...");
                    $("#btnDelete").prop("disabled",true);
                    $.ajax({
                        method:"get",
                        url:"/admin/skill/delete/"+id,
                        success:function(response){
                            console.log(response);
                            if(response.success==true){
                                Swal.fire({
                                    icon:"success",
                                    title:"Success",
                                    text:"Skill Deleted Successfully",
                                    showConfirmButton:false,
                                    timer:1500
                                });
                                setTimeout(()=>{
                                    location.reload();
                                },1500)
                            }
                        },
                        error:function(xhr){
                            console.log(xhr);
                            Swal.fire({
                                    icon:"warning",
                                    title:"Something went wrong",
                                    text:xhr,
                                    showConfirmButton:false,
                                    timer:1500
                                });
                        }
                    })
                })
            })
        })
    </script>
@endsection

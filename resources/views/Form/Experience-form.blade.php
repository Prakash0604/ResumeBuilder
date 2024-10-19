@extends('index')
@section('content')
    <div class="container mt-4 mb-2">
        @if (session()->has('success'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <strong>{{ session()->get('success') }}</strong>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <strong>{{ session()->get('error') }}</strong>
            </div>
        @endif
        <div class="container mb-2 mt-2">
            <button class="btn btn-primary mt-2 mb-2" id="toggleForm">Toggle Form</button>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="fetch-experience">
                    <thead>
                        <tr>
                            <th scope="col">S.N </th>
                            <th scope="col">Position </th>
                            <th scope="col">Organization </th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="container educations_toggle">
            <form action="{{ route('user.experience.store') }}" method="POST">
                <div class="card-group">
                    <div class="card">
                        <h1 class="text-center mt-3">{{ $title }}</h1>
                        <div class="card-body">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
                                    @csrf
                                    <label for="" class="form-label">Position</label>
                                    <input type="text" name="position" id=""
                                        class="form-control @error('position') is-invalid  @enderror"
                                        placeholder="Enter your position" aria-describedby="helpId"
                                        value="{{ old('position') }}" />
                                    @error('position')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Organization Name</label>
                                    <input type="text" name="organization_name" id=""
                                        class="form-control @error('organization_name') is-invalid  @enderror"
                                        placeholder="Enter the organization name" aria-describedby="helpId"
                                        value="{{ old('organization_name') }}" />
                                    @error('organization_name')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Industry</label>
                                    <select class="form-select" name="industry_id" id="">
                                        <option value="">Select one</option>
                                        @forelse ($data['industries'] as $id=>$industry)
                                            <option value="{{ $id }}">{{ $industry }}</option>
                                        @empty
                                            <option value="">Data Not Found</option>
                                        @endforelse
                                    </select>
                                    @error('industry_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Job Level</label>
                                    <select class="form-select" name="job_level_id" id="">
                                        <option value="">Select one</option>
                                        @forelse ($data['jobLevels'] as $id=>$jobLevel)
                                            <option value="{{ $id }}">{{ $jobLevel }}</option>
                                        @empty
                                            <option value="">Data Not Found</option>
                                        @endforelse
                                    </select>
                                    @error('job_level_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Roles & Responsibility</label>
                                <textarea class="form-control" name="roles_responsibility" @error('roles_responsibility') is-invalid @enderror"
                                    id="roles_response" rows="3">{{ old('roles_responsibility') }}</textarea>
                                @error('roles_responsibility')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class=" col-md-6">
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="starting_date" id="" class="form-control"
                                        placeholder="" value="{{ old('starting_date') }}" aria-describedby="helpId" />
                                    @error('starting_date')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class=" col-md-6 hideEndingDate">
                                    <label for="" class="form-label">End Date</label>
                                    <input type="date" name="ending_date" id=""
                                        value="{{ old('ending_date') }}" class="form-control" placeholder=""
                                        aria-describedby="helpId" />
                                </div>

                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-md-2 mt-4">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input statusCheckBox" type="checkbox"
                                            value="currently working" id="" name="status" />
                                        <label class="form-check-label" for=""> I am Currently working
                                            here</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-success col-lg">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <form id="editExperiences">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Experience
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
                                    @csrf
                                    <label for="" class="form-label">Position</label>
                                    <input type="text" name="position" id="position"
                                        class="form-control @error('position') is-invalid  @enderror"
                                        placeholder="Enter your position" aria-describedby="helpId"
                                        value="{{ old('position') }}" />
                                    @error('position')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Organization Name</label>
                                    <input type="text" name="organization_name" id="organization_name"
                                        class="form-control @error('organization_name') is-invalid  @enderror"
                                        placeholder="Enter the organization name" aria-describedby="helpId"
                                        value="{{ old('organization_name') }}" />
                                    @error('organization_name')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Industry</label>
                                    <select class="form-select" name="industry_id" id="industry_id">
                                        <option value="">Select one</option>
                                        @forelse ($data['industries'] as $id=>$industry)
                                            <option value="{{ $id }}">{{ $industry }}</option>
                                        @empty
                                            <option value="">Data Not Found</option>
                                        @endforelse
                                    </select>
                                    @error('industry_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Job Level</label>
                                    <select class="form-select" name="job_level_id" id="job_level_id">
                                        <option value="">Select one</option>
                                        @forelse ($data['jobLevels'] as $id=>$jobLevel)
                                            <option value="{{ $id }}">{{ $jobLevel }}</option>
                                        @empty
                                            <option value="">Data Not Found</option>
                                        @endforelse
                                    </select>
                                    @error('job_level_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Roles & Responsibility</label>
                                <textarea class="form-control" name="roles_responsibility" @error('roles_responsibility') is-invalid @enderror"
                                    id="roles_responsibility" rows="3">{{ old('roles_responsibility') }}</textarea>
                                @error('roles_responsibility')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class=" col-md-6">
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="starting_date" id="starting_date" class="form-control"
                                        placeholder="" value="{{ old('starting_date') }}" aria-describedby="helpId" />
                                    @error('starting_date')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class=" col-md-6 hideEndingDate">
                                    <label for="" class="form-label">End Date</label>
                                    <input type="date" name="ending_date" id="ending_date"
                                        value="{{ old('ending_date') }}" class="form-control" placeholder=""
                                        aria-describedby="helpId" />
                                </div>

                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-md-2 mt-4">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input statusCheckBox" type="checkbox"
                                            value="currently working" id="status" name="status" />
                                        <label class="form-check-label" for=""> I am Currently working
                                            here</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnUpdate" class="btn btn-primary col-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}

    {{-- Detail Modal --}}
    <div class="modal fade" id="viewDetailModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        View Experience Detail
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <div class="row">
                            <tr>
                                <th>Position</th>
                                <td><input type="text" id="position" class="form-control position" readonly ></td>

                                <th>Organization Name</th>
                                <td><input type="text" id="organization_name" class="form-control organization_name" readonly></td>
                            </tr>
                            <tr>
                                <th>Industry</th>
                                <td><input type="text" id="industry_id" class="form-control industry_id" readonly></td>

                                <th>Job Level</th>
                                <td><input type="text" id="job_level_id" class="form-control job_level_id" readonly></td>
                            </tr>
                            <tr>
                                <th>Starting Date:</th>
                                <td><input type="date" id="starting_date" class="form-control starting_date" readonly></td>
                                <th>Ending Date:</th>
                                <td><input type="date" id="ending_date" class="form-control ending_date" readonly></td>
                            </tr>
                        </div>
                    </table>
                    <table class="table table-boredered">
                        <div class="col-md">
                            <strong>Roles & Responsibility</strong>
                            <textarea type="" id="roles_responsibility" class="form-control col-lg roles_responsibility" readonly></textarea>
                        </div>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Created By :</th>
                            <td><span class="text-sm" id="created_by"></span></td>
                            <th>Created At :</th>
                            <td><span class="text-sm" id="created_at"></span></td>
                        </tr>
                        <tr>
                            <th>Updated By :</th>
                            <td><span class="text-sm" id="updated_by"></span></td>
                            <th>Updated At :</th>
                            <td><span class="text-sm" id="updated_at"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Detail Modal --}}
    <script>
        CKEDITOR.replace('roles_response');
        $(document).ready(function() {

            $("#toggleForm").on("click", function() {
                $(".educations_toggle").toggle();
            });


            let table = $("#fetch-experience").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.experience') }}",
                columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex"
                }, {
                    data: "position",
                    name: "position"
                }, {
                    data: "organization_name",
                    name: "organization_name"
                }, {
                    data: "action",
                    name: "action"
                }, ]
            });


            $(".statusCheckBox").on("change", function() {
                ischecked();
            })

            function ischecked() {
                if ($(".statusCheckBox").is(":checked")) {
                    $(".hideEndingDate").hide();
                } else {
                    $(".hideEndingDate").show();

                }
            };

            $(document).on("click", ".editButton", function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $.ajax({
                    method: "get",
                    url: "/user/experience/get/" + id,
                    success: function(response) {
                        console.log(response);
                        $("#position").val(response.message.position);
                        $("#organization_name").val(response.message.organization_name);
                        $("#job_level_id").val(response.message.job_level_id);
                        $("#industry_id").val(response.message.industry_id);
                        $("#roles_responsibility").val(response.message.roles_responsibility);
                        $("#starting_date").val(response.message.starting_date);
                        $("#ending_date").val(response.message.ending_date);
                        if (response.message.status != null) {
                            $("#status").val(response.message.ending_date);
                        }
                    }
                });

                $("#editExperiences").submit(function(event) {
                    event.preventDefault();
                    $("#btnUpdate").text("Updating...");
                    $("#btnUpdate").prop("disabled", true);
                    let formdata = new FormData(this);
                    $.ajax({
                        method: "POST",
                        url: "/user/experience/update/" + id,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Experience Updated Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            $("#btnUpdate").text("Update");
                            $("#btnUpdate").prop("disabled", false);
                            $("#editModal").modal("hide");
                            table.draw();
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong",
                                text: xhr.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            $("#btnUpdate").text("Update");
                            $("#btnUpdate").prop("disabled", false);
                        }
                    })
                });
            });

            $(document).on("click",".viewDetailButton",function(){
                let id=$(this).attr("data-id");
                $.ajax({
                    method:"get",
                    url:"/user/experience/detail/"+id,
                    success:function(response){
                        console.log(response);
                        $(".position").val(response.message[0].position);
                        $(".organization_name").val(response.message[0].organization_name);
                        $(".job_level_id").val(response.message[0].job_level.job_level_name);
                        $(".industry_id").val(response.message[0].industry.industry_name);
                        $(".roles_responsibility").val(response.message[0].roles_responsibility);
                        $(".starting_date").val(response.message[0].starting_date);
                        $(".ending_date").val(response.message[0].ending_date);
                        if (response.message.status != null) {
                            $("#status").val(response.message[0].ending_date);
                        }
                        $("#created_by").text(response.message[0].created_by.first_name + " " + response.message[0].created_by.middle_name +" "+ response.message[0].created_by.last_name);
                        $("#created_at").text(response.message[0].created_at);
                        $("#updated_at").text(response.message[0].updated_at);
                        $("#updated_by").text(response.message[0].created_by.first_name + " " + response.message[0].created_by.middle_name +" "+ response.message[0].created_by.last_name);

                    }
                })
            })
        });
    </script>
@endsection

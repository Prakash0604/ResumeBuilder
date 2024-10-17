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
        <div class="container educations_toggle">
            <form action="{{ route('user.education.store') }}" method="POST" id="educationStore">
                <div class="card-group">
                    <div class="card">
                        <h1 class="text-center mt-3">{{ $title }}</h1>
                        <div class="card-body">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Degree</label>
                                    @csrf
                                    <select class="form-select" name="degree_id" id="">
                                        <option value="">Select one</option>
                                        @forelse ($data['degrees'] as $degree=>$id)
                                            <option value="{{ $id }}">{{ $degree }}</option>
                                        @empty
                                            <option value="">No Data Found</option>
                                        @endforelse
                                    </select>
                                    <div class="span">
                                        @error('degree_id')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Field of Study</label>
                                    <select class="form-select" name="field_id" id="">
                                        <option value="">Select one</option>
                                        @forelse ($data['field_of_studies'] as $field=>$id)
                                            <option value="{{ $id }}">{{ $field }}</option>
                                        @empty
                                            <option value="">No Data Found</option>
                                        @endforelse
                                    </select>
                                    @error('field_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Institute</label>
                                    <input type="text" name="institute" id=""
                                        class="form-control @error('institute') is-invalid  @enderror"
                                        placeholder="Enter the institute" aria-describedby="helpId" />
                                    @error('institute')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">University</label>
                                    <input type="text" name="university" id=""
                                        class="form-control @error('university') is-invalid  @enderror"
                                        placeholder="Enter the university" aria-describedby="helpId" />
                                    @error('university')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3 mb-3">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Grading Type</label>
                                    <select class="form-select" name="grading_type_id" id="">
                                        <option value="">Select one</option>
                                        @forelse ($data['grading_types'] as $grade=>$id)
                                            <option value="{{ $id }}">{{ $grade }}</option>
                                        @empty
                                            <option value="">No Data Found</option>
                                        @endforelse
                                    </select>
                                    @error('grading_type_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label">Joined Year</label>
                                    <select class="form-select" name="joined_year_id" id="">
                                        <option value="">Select one</option>
                                        @forelse ($data['years'] as $year=>$id)
                                            <option value="{{ $id }}">{{ $year }}</option>
                                        @empty
                                            <option value="">No Data Found</option>
                                        @endforelse
                                    </select>
                                    @error('joined_year_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 passedYear">
                                    <label for="" class="form-label">Passed Year</label>
                                    <select class="form-select" name="passed_year_id" id="">
                                        <option value="">Select one</option>
                                        @forelse ($data['years'] as $year=>$id)
                                            <option value="{{ $id }}">{{ $year }}</option>
                                        @empty
                                            <option value="">No Data Found</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input current_studying" type="checkbox" value="studying"
                                            name="current_studying" id="" />
                                        <label class="form-check-label" for=""> I am Currently Studying here
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-outline-success col-lg">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container mb-2 mt-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="get-Education">
                    <thead>
                        <tr>
                            <th scope="col">S.N </th>
                            <th scope="col">Degree </th>
                            <th scope="col">Education</th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="educationUpdate">
                    <div class="modal-header  bg-secondary text-white">
                        <h5 class="modal-title text-center" id="modalTitleId">
                            Edit Education
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="card-body">
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Degree</label>
                                        @csrf
                                        <select class="form-select" name="degree_id" id="degree_id">
                                            <option value="">Select one</option>
                                            @forelse ($data['degrees'] as $degree=>$id)
                                                <option value="{{ $id }}">{{ $degree }}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                        <div class="span">
                                            @error('degree_id')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Field of Study</label>
                                        <select class="form-select" name="field_id" id="field_id">
                                            <option value="">Select one</option>
                                            @forelse ($data['field_of_studies'] as $field=>$id)
                                                <option value="{{ $id }}">{{ $field }}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                        @error('field_id')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Institute</label>
                                        <input type="text" name="institute" id="institute"
                                            class="form-control @error('institute') is-invalid  @enderror"
                                            placeholder="Enter the institute" aria-describedby="helpId" />
                                        @error('institute')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">University</label>
                                        <input type="text" name="university" id="university"
                                            class="form-control @error('university') is-invalid  @enderror"
                                            placeholder="Enter the university" aria-describedby="helpId" />
                                        @error('university')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3 mb-4">
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Grading Type</label>
                                        <select class="form-select" name="grading_type_id" id="grading_type_id">
                                            <option value="">Select one</option>
                                            @forelse ($data['grading_types'] as $grade=>$id)
                                                <option value="{{ $id }}">{{ $grade }}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                        @error('grading_type_id')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Joined Year</label>
                                        <select class="form-select" name="joined_year_id" id="joined_year_id">
                                            <option value="">Select one</option>
                                            @forelse ($data['years'] as $year=>$id)
                                                <option value="{{ $id }}">{{ $year }}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                        @error('joined_year_id')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 passedYear">
                                        <label for="" class="form-label">Passed Year</label>
                                        <select class="form-select" name="passed_year_id" id="passed_year_id">
                                            <option value="">Select one</option>
                                            @forelse ($data['years'] as $year=>$id)
                                                <option value="{{ $id }}">{{ $year }}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input current_studying" type="checkbox" value="studying"
                                            name="current_studying" id="current_studying" />
                                        <label class="form-check-label" for=""> I am Currently Studying here
                                        </label>
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                        <button class="btn btn-outline-success col-lg">Add</button>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success col-lg" id="btnUpdate">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}

    {{-- View Detail Modal --}}
    <div class="modal" id="viewDetailModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-secondary text-white">
                    <h5 class="modal-title text-center" id="modalTitleId">
                        View Education
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Degree :</th>
                                    <td><input type="text" id="fetchDegree" class="form-control" disabled></td>

                                    <th>Field of Study :</th>
                                    <td><input type="text" id="fetchField" class="form-control" disabled></td>
                                </tr>
                                <tr>
                                    <th>Institution :</th>
                                    <td><input type="text" id="fetchInstitute" class="form-control" disabled></td>

                                    <th>University :</th>
                                    <td><input type="text" id="fetchUniversity" class="form-control" disabled></td>
                                </tr>
                                <tr>
                                    <th>Grading Type :</th>
                                    <td><input type="text" id="fetchGrading" class="form-control" disabled></td>

                                    <th>Currently Enrolled :</th>
                                    <td><input type="text" id="fetchEnroll" class="form-control" disabled></td>
                                </tr>
                                <tr>
                                    <th>Joined Year :</th>
                                    <td><input type="text" id="fetchJoinYear" class="form-control" disabled></td>

                                    <th>Passed Year :</th>
                                    <td><input type="text" id="fetchPassYear" class="form-control" disabled></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    Created By : <span id="created_by"></span>
                                </div>
                                <div class="col">
                                Created At : <span id="created_at"></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- View Detail Modal --}}

    {{-- Delete Modal --}}

    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteEducations">
                    <div class="modal-header  bg-secondary text-white">
                        <h5 class="modal-title text-center" id="modalTitleId">
                            Delete Education
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-danger">Are You sure you want to remove ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger col-lg" id="btnDelete">Remove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete Modal --}}
    <script>
        $(document).ready(function() {
            let table = $("#get-Education").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.education') }}",

                columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                }, {
                    data: "degree",
                    name: "degree"
                }, {
                    data: "field_of_study",
                    name: "field_of_study"
                }, {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                }]
            });

            // Initially check the checkbox status
            togglePassedYear();

            // Listen for checkbox changes
            $(".current_studying").on("change", function() {
                togglePassedYear();
            });

            // Function to toggle the "Passed Year" field
            function togglePassedYear() {
                if ($('.current_studying').is(':checked')) {
                    $(".passedYear").hide();
                } else {
                    $(".passedYear").show();
                }
            }

            // Edit & Update Data
            $(document).on("click", ".editButton", function() {
                let id = $(this).attr("data-id");
                $.ajax({
                    method: "get",
                    url: "/user/education/get/" + id,
                    success: function(response) {
                        console.log(response);
                        $("#degree_id").val(response.message.degree_id);
                        $("#field_id").val(response.message.field_id);
                        $("#institute").val(response.message.institute);
                        $("#university").val(response.message.university);
                        $("#grading_type_id").val(response.message.grading_type_id);
                        $("#joined_year_id").val(response.message.joined_year_id);
                        if (response.message.current_studying != null) {
                            $("#current_studying").is(":checked");
                        }
                    }
                });

                $("#educationUpdate").submit(function(event) {
                    event.preventDefault();
                    $("#btnUpdate").prop("disabled", true);
                    $("#btnUpdate").text("Updating...");
                    let formdata = new FormData(this);
                    $.ajax({
                        method: "post",
                        url: "/user/education/update/" + id,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Education Updated Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            $("#btnUpdate").prop("disabled", false);
                            $("#btnUpdate").text("Update");
                            $("#editModal").modal("hide");
                            table.draw();
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong ?",
                                text: xhr.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            $("#btnUpdate").prop("disabled", false);
                            $("#btnUpdate").text("Update");
                        }
                    });
                });
            });


            // Fetch Detail Data
            $(document).on("click", ".viewDetailButton", function() {
                let id = $(this).attr("data-id");
                $.ajax({
                    method: "get",
                    url: "/user/education/get/" + id,
                    success: function(response) {
                        // console.log(response);
                        $("#fetchDegree").val(response.message.degree.degree_name);
                        $("#fetchField").val(response.message.field.field_name);
                        $("#fetchInstitute").val(response.message.institute);
                        $("#fetchUniversity").val(response.message.university);
                        $("#fetchGrading").val(response.message.grading_type.grading_type);
                        $("#fetchEnroll").val(response.message.current_studying);
                        $("#fetchJoinYear").val(response.message.join_year.year_name);
                        if (response.message.pass_year != null) {
                            $("#fetchPassYear").val(response.message.pass_year.year_name);
                        }

                        $("#created_by").text(response.message.created_by.first_name +" "+response.message.created_by.middle_name+" "+response.message.created_by.last_name);
                        $("#created_at").text(response.message.created_at);

                    }
                })
            })
        });
    </script>
@endsection

@extends('index')
@section('content')
    <div class="container mt-4 mb-2">
        <div class="container mb-2 mt-2">
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
                                        placeholder="Enter your position" aria-describedby="helpId" />
                                    @error('position')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Organization Name</label>
                                    <input type="text" name="organization_name" id=""
                                        class="form-control @error('organization_name') is-invalid  @enderror"
                                        placeholder="Enter the organization name" aria-describedby="helpId" />
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
                                <textarea class="form-control" name="roles_responsibility @error('roles_responsibility') is-invalid @enderror" id="roles_response" rows="3"></textarea>
                                @error('roles_responsibility')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class=" col-md-6">
                                    <label for="" class="form-label">Start Date</label>
                                    <input
                                        type="date"
                                        name="starting_date"
                                        id=""
                                        class="form-control"
                                        placeholder=""
                                        aria-describedby="helpId"
                                    />
                                    @error('starting_date')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class=" col-md-6 hideEndingDate">
                                    <label for="" class="form-label">End Date</label>
                                    <input
                                        type="date"
                                        name="ending_date"
                                        id=""
                                        class="form-control"
                                        placeholder=""
                                        aria-describedby="helpId"
                                    />
                                </div>

                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-md-2 mt-4">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input statusCheckBox" type="checkbox" value="currently working" id="" name="status" />
                                        <label class="form-check-label" for=""> I am Currently working here</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success btn-lg">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let table=$("#fetch-experience").DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{ route('user.experience') }}",
                columns:[
                    {
                        data:"DT_RowIndex",name:"DT_RowIndex"
                    },{
                        data:"DT_RowIndex",name:"DT_RowIndex"
                    },{
                        data:"DT_RowIndex",name:"DT_RowIndex"
                    },{
                        data:"DT_RowIndex",name:"DT_RowIndex"
                    },
                ]
            });


            $(".statusCheckBox").on("change",function(){
                ischecked();
            })

            function ischecked(){
                if($(".statusCheckBox").is(":checked")){
                    $(".hideEndingDate").hide();
                }else{
                    $(".hideEndingDate").show();

                }
            }
        })

        CKEDITOR.replace('roles_response');
    </script>
@endsection

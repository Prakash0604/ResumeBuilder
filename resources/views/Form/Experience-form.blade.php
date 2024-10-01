@extends('index')
@section('content')
    <div class="container mt-4 mb-2">
        <div class="container mb-2 mt-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Position </th>
                            <th scope="col">Organization </th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">R1C1</td>
                            <td>R1C2</td>
                            <td>R1C3</td>
                        </tr>
                        <tr class="">
                            <td scope="row">Item</td>
                            <td>Item</td>
                            <td>Item</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <a class="btn btn-primary mt-3 mb-3" id="addEducations">Add Experience</a>
        <div class="container educations_toggle">
            <form action="" method="POST">
                <div class="card-group">
                    <div class="card">
                        <h1 class="text-center mt-3">Education Information</h1>
                        <div class="card-body">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
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
                                    <input type="text" name="organization" id=""
                                        class="form-control @error('organization') is-invalid  @enderror"
                                        placeholder="Enter the organization" aria-describedby="helpId" />
                                    @error('organization')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3 mb-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Industry</label>
                                    <select class="form-select" name="gender" id="">
                                        <option selected>Select one</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Job Level</label>
                                    <select class="form-select" name="gender" id="">
                                        <option selected>Select one</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Roles & Responsibility</label>
                                <textarea class="form-control" name="roles_response" id="roles_response" rows="3"></textarea>
                            </div>

                            <div class="row mt-3">
                                <div class=" col-md-6">
                                    <label for="" class="form-label">Start Date</label>
                                    <input
                                        type="date"
                                        name="start_date"
                                        id=""
                                        class="form-control"
                                        placeholder=""
                                        aria-describedby="helpId"
                                    />
                                    @error('start_date')
                                    <small id="helpId" class="text-danger">Help text</small>
                                    @enderror
                                </div>
                                <div class=" col-md-6">
                                    <label for="" class="form-label">End Date</label>
                                    <input
                                        type="date"
                                        name="end_date"
                                        id=""
                                        class="form-control"
                                        placeholder=""
                                        aria-describedby="helpId"
                                    />
                                    @error('end_date')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-md-2 mt-4">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" value="" id="" />
                                        <label class="form-check-label" for=""> I am Currently working here
                                        </label>
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
            $(".educations_toggle").hide();
            $("#addEducations").on("click", function() {
                $(".educations_toggle").toggle(1000);
            })
        })

        CKEDITOR.replace('roles_response');
    </script>
@endsection

@extends('index')
@section('content')
<div class="container mt-4 mb-2">
    <div class="container mb-2 mt-2">
        <div
            class="table-responsive"
        >
            <table
                class="table table-bordered table-hover"
            >
                <thead>
                    <tr>
                        <th scope="col">Degree </th>
                        <th scope="col">Education </th>
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
    <a class="btn btn-primary mt-3 mb-3" id="addEducations">Add Education</a>
    <div class="container educations_toggle">
    <form action="" method="POST">
    <div class="card-group">
            <div class="card">
                <h1 class="text-center mt-3">Education Information</h1>
                <div class="card-body">
                    <div class="row mt-3 mb-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Degree</label>
                            <select class="form-select" name="gender" id="">
                                <option selected>Select one</option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                                <option value="">Jakarta</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Field of Study</label>
                            <select class="form-select" name="gender" id="">
                                <option selected>Select one</option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                                <option value="">Jakarta</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Institute</label>
                            <input type="email" name="email" id=""
                                class="form-control @error('email') is-invalid  @enderror"
                                placeholder="Enter your email" aria-describedby="helpId" />
                            @error('email')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">University</label>
                            <input type="text" name="address" id=""
                                class="form-control @error('address') is-invalid  @enderror"
                                placeholder="Enter your address" aria-describedby="helpId" />
                            @error('address')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-md-4">
                            <label for="" class="form-label">Grading Type</label>
                            <select class="form-select" name="gender" id="">
                                <option selected>Select one</option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                                <option value="">Jakarta</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Joined Year</label>
                            <select class="form-select" name="gender" id="">
                                <option selected>Select one</option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                                <option value="">Jakarta</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Passed Year</label>
                            <select class="form-select" name="gender" id="">
                                <option selected>Select one</option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                                <option value="">Jakarta</option>
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> I am Currently Studying here </label>
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
    $(document).ready(function(){
        $(".educations_toggle").hide();
        $("#addEducations").on("click",function(){
            $(".educations_toggle").toggle(1000);
        })
    })
</script>
@endsection

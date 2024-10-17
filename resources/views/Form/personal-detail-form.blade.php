@extends('index')
@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

                <strong>{{ session()->get('success') }}</strong>
            </div>

        @endif
        <form action="{{ route('personal_detail.update') }}" method="POST" enctype="multipart/form-data">
            <div class="card-group">
                <div class="card">
                    <h1 class="text-center mt-3">{{ $title }}</h1>
                    <div class="card-body">
                        <div class="row mt-3 mb-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" name="first_name" id=""
                                    class="form-control @error('first_name') is-invalid  @enderror"
                                    placeholder="Enter your first name" aria-describedby="helpId"  value="{{ $user->first_name }}" />
                                @error('first_name')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" id="" class="form-control "
                                    placeholder="Enter your middle name" aria-describedby="helpId" value="{{ $user->middle_name }}" />
                                @error('middle_name')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id=""
                                    class="form-control @error('last_name') is-invalid  @enderror"
                                    placeholder="Enter your last name" aria-describedby="helpId" value="{{ $user->last_name }}"/>
                                @error('last_name')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" id=""
                                    class="form-control @error('email') is-invalid  @enderror"
                                    placeholder="Enter your email" aria-describedby="helpId" value="{{ $user->email }}" />
                                @error('email')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" id=""
                                    class="form-control @error('address') is-invalid  @enderror"
                                    placeholder="Enter your address" aria-describedby="helpId" value="{{ $user->address }}"/>
                                @error('address')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-md-3">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="number" name="contact" id=""
                                    class="form-control @error('contact') is-invalid  @enderror"
                                    placeholder="98********" aria-describedby="helpId" value="{{ $user->contact }}"/>
                                @error('contact')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id=""
                                    class="form-control @error('dob') is-invalid  @enderror" placeholder=""
                                    aria-describedby="helpId" value="{{ $user->dob }}"/>
                                @error('dob')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Gender</label>
                                <select class="form-select" name="gender" id="">
                                    <option value="">Select one</option>
                                    <option value="Male" {{ $user->gender == 'Male' ? "selected":"" }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? "selected":"" }}>Female</option>
                                    <option value="Others" {{ $user->gender == 'Other' ? "selected":"" }}>Others</option>
                                </select>
                                @error('gender')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Images</label>
                                <input
                                    type="file"
                                    name="image"
                                    id=""
                                    class="form-control"
                                    placeholder=""
                                    aria-describedby="helpId"
                                />
                                @error('image')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                                <img src="{{ asset('storage/' . $user->profile) }}" alt="test" width="100px" height="100px">
                            </div>

                        </div>
                        <div class="mb-3 mt-3">
                            <label for="" class="form-label">Summary</label>
                            <textarea class="form-control" name="summary" id="" rows="3">{{ $user->summary }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success float-right btn-lg">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
          CKEDITOR.replace('summary');
    </script>
@endsection

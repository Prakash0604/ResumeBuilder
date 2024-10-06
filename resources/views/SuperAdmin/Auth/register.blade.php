<!doctype html>
<html lang="en">
    <head>
        <title>Admin | Register</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body class="bg-secondary">
        <div class="container mt-4 col-6 ">
            <h1 class="text-center mt-4 mb-4">Register Here</h1>
        <div class="card p-2">
            @if (session()->has('message'))
                <div
                    class="alert alert-success text-center alert-dismissible fade show"
                    role="alert"
                >
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                    ></button>

                    <strong>
                        {{ session()->get('message') }}
                    </strong>
                </div>
            @endif
            <div class="card-body ">
                <form method="post">
                    <div class="row">
                        @csrf
                        <div class="col-md-4">
                            <label for="" class="form-label">First Name</label>
                            <input
                                type="text"
                                name="first_name"
                                id=""
                                class="form-control @error('first_name') is-invalid @enderror"
                                placeholder="First Name"
                            />
                            @error('first_name')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Middle Name</label>
                            <input
                                type="text"
                                name="middle_name"
                                id=""
                                class="form-control"
                                placeholder="Middle Name"
                            />
                        </div>
                         <div class="col-md-4">
                            <label for="" class="form-label" >Last Name</label>
                            <input
                                type="text"
                                name="last_name"
                                id=""
                                class="form-control @error('last_name') is-invalid @enderror"
                                placeholder="Last Name"
                            />
                            @error('last_name')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                id=""
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email"
                            />
                            @error('email')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                id=""
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                            />
                            @error('password')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="" class="form-label">Gender</label>
                            <select
                                class="form-select"
                                name="gender"
                                id=""
                            >
                                <option selected value="">Select one</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('gender')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Address</label>
                            <input
                                type="text"
                                name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter your address"
                                aria-describedby="helpId"
                            />
                            @error('address')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Date of Birth</label>
                            <input
                                type="date"
                                name="dob"
                                class="form-control @error('dob') is-invalid @enderror"
                                placeholder="Enter your address"
                                aria-describedby="helpId"
                            />
                            @error('dob')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <button class="btn btn-primary mr-2">Register</button>
                        Alreay Register ?
                        <a href="" >Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

<!doctype html>
<html lang="en">

<head>
    <title>Portofolio | {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    {{-- DataTable --}}


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- MultiSelect CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"
        rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="scrollable">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5">
                @if (Auth::user() && $user->profile)
                    <img src="{{ asset('storage/' . $user->profile) }}" alt="" height="150" width="150" class="rounded-circle">
                @endif
                </a>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="#">Personal Detail</a>
                    </li>
                    <li>
                        <a href="#">Education</a>
                    </li>
                    <li>
                        <a href="#">Experience</a>
                    </li>
                    <li>
                        <a href="#">Additional Fields</a>
                    </li>
                    <li>
                        <a href="#">Generate Portfolio</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- jQuery (required for Select2 and MultiSelect) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <!-- MultiSelect JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js">
        </script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



        <!-- Page Content  -->
        <div id="content" class="mt-4">
            @yield('content')
        </div>
    </div>

    {{-- <script src="{{ asset('asset/js/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/js/popper.js') }}"></script> --}}
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('asset/js/main.js') }}"></script> --}}
</body>

</html>
